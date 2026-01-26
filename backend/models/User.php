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
        $query = "SELECT id, full_name, email, password, role FROM {$this->table_name} WHERE email = :email";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($row);
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
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