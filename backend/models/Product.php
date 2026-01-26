<?php
class Product {
    private $db;
    private $table = "products";

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table}"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function getByCategory($categoryId) {
        $sql = "
            SELECT p.*, s.id   AS subcategory_id, s.emri AS subcategory_name
            FROM products p
            INNER JOIN subcategories s ON p.subcategory_id = s.id
            WHERE s.category_id = :category_id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySubcategory($subcategoryId) {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table} WHERE subcategory_id = :subcategory_id"
        );
        $stmt->bindParam(':subcategory_id', $subcategoryId, PDO::PARAM_INT);
        $stmt->execute();   

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllFromSameCategory($subcategoryId, $excludeProductId) {
        $sql = "
            SELECT p.*, s.id   AS subcategory_id, s.emri AS subcategory_name
            FROM products p
            INNER JOIN subcategories s ON p.subcategory_id = s.id
            WHERE s.id = :subcategory_id AND p.id != :exclude_product_id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':subcategory_id', $subcategoryId, PDO::PARAM_INT);
        $stmt->bindParam(':exclude_product_id', $excludeProductId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>