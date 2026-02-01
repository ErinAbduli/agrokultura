<?php
class Contact {
    private $conn;
    private $table_name = "contacts";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllContacts() {
        $query = "SELECT * FROM {$this->table_name}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>