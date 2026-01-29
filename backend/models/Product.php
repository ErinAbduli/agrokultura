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
            INNER JOIN subcategories s 
            ON p.subcategory_id = s.id
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

    public function create($name, $price, $image, $subcategoryId, $stock) {
        try {
            $query = "INSERT INTO {$this->table} (name, price, image, subcategory_id, stock) 
                     VALUES (:name, :price, :image, :subcategory_id, :stock)";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':subcategory_id', $subcategoryId, PDO::PARAM_INT);
            $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return ['success' => true, 'id' => $this->db->lastInsertId()];
            } else {
                return ['success' => false, 'error' => 'Failed to create product'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return ['success' => true];
            } else {
                return ['success' => false, 'error' => 'Failed to delete product'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
?>