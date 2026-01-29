<?php
class Category {
    private $db;
    private $table = "categories";

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSubcategories($categoryId) {
        $stmt = $this->db->prepare(
            "SELECT * FROM subcategories WHERE category_id = :category_id"
        );
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();   

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        public function getAllSubcategoriesNoId() {
        $stmt = $this->db->prepare(
        "SELECT * FROM subcategories"
    );
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function getAllCategories() {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table}"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>