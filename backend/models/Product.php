<?php
class Product {
    private $db;
    private $table = "products";

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll($order) {
        $sql = "SELECT * FROM {$this->table}";

        if ($order === 'price-asc') {
            $sql .= " ORDER BY price ASC";
        } elseif ($order === 'price-desc') {
            $sql .= " ORDER BY price DESC";
        } elseif ($order === 'name-asc') {
            $sql .= " ORDER BY name ASC";
        } elseif ($order === 'name-desc') {
            $sql .= " ORDER BY name DESC";
        } else {
            $sql .= " ORDER BY id DESC";
        }

        $stmt = $this->db->prepare($sql);
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

    
    public function getByCategory($categoryId, $order) {
        $sql = "
            SELECT p.*, s.id   AS subcategory_id, s.emri AS subcategory_name
            FROM products p
            INNER JOIN subcategories s ON p.subcategory_id = s.id
            WHERE s.category_id = :category_id
        ";

        if ($order === 'price-asc') {
            $sql .= " ORDER BY p.price ASC";
        } elseif ($order === 'price-desc') {
            $sql .= " ORDER BY p.price DESC";
        } elseif ($order === 'name-asc') {
            $sql .= " ORDER BY p.name ASC";
        } elseif ($order === 'name-desc') {
            $sql .= " ORDER BY p.name DESC";
        } else {
        $sql .= " ORDER BY p.id DESC";
        }


        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySubcategory($subcategoryId, $order) {
        $sql = "SELECT * FROM {$this->table} WHERE subcategory_id = :subcategory_id";

        if ($order === 'price-asc') {
                $sql .= " ORDER BY price ASC";
            } elseif ($order === 'price-desc') {
                $sql .= " ORDER BY price DESC";
            } elseif ($order === 'name-asc') {
                $sql .= " ORDER BY name ASC";
            } elseif ($order === 'name-desc') {
                $sql .= " ORDER BY name DESC";
            } else {
                $sql .= " ORDER BY id DESC";
            }

        $stmt = $this->db->prepare($sql);

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