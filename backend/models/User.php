<?php 
class User{
    private $conn;
    private $table_name = "users";
    private $address_table = "adresses";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($fullname, $email, $password, $phone, $address, $city, $zipcode) {
        try{
            $query = "INSERT INTO {$this->table_name} (full_name, email, password, phone) VALUES (:fullname, :email, :password, :phone)";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':phone', $phone);

            $address_query = "INSERT INTO {$this->address_table} (user_id, address, qyteti, kodi_postar) VALUES (:user_id, :address, :city, :zipcode)";

            $this->conn->beginTransaction();
            if($stmt->execute()){
                $user_id = $this->conn->lastInsertId();
                $address_stmt = $this->conn->prepare($address_query);
                $address_stmt->bindParam(':user_id', $user_id);
                $address_stmt->bindParam(':address', $address);
                $address_stmt->bindParam(':city', $city);
                $address_stmt->bindParam(':zipcode', $zipcode);
                
                if($address_stmt->execute()){
                    $this->conn->commit();
                    return true;
                } else {
                    $this->conn->rollBack();
                    return false;
                }
            } else {
                $this->conn->rollBack();
                return false;
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            $this->conn->rollBack();
            return false;
        }
    }

    public function login($email, $password) {
        $query = "SELECT id, full_name, email, phone, password, role FROM {$this->table_name} WHERE email = :email";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['user_id']   = $row['id'];
                $_SESSION['email']     = $row['email'];
                $_SESSION['full_name'] = $row['full_name'];
                $_SESSION['phone']     = $row['phone'];
                $_SESSION['role']      = $row['role'];

                $address_stmt = $this->conn->prepare("
                    SELECT address, qyteti, kodi_postar 
                    FROM adresses 
                    WHERE user_id = :id 
                    LIMIT 1
                ");
                $address_stmt->bindParam(':id', $row['id'], PDO::PARAM_INT);
                $address_stmt->execute();
                $addr = $address_stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION['address']     = $addr['address'] ?? '';
                $_SESSION['qyteti']      = $addr['qyteti'] ?? '';
                $_SESSION['kodi_postar'] = $addr['kodi_postar'] ?? '';

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>