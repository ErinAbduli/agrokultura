<?php
class Address {
    private $conn;
    private $table_name = "adresses";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAddressByUserId($userId) {
        $query = "SELECT * FROM {$this->table_name} WHERE user_id = :user_id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? (int)$row['id'] : null;
    }
}
?>