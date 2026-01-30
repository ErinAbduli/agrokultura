<?php
class Cart {
    private $db;
    private $table = "cart";

    public function __construct($db) {
        $this->db = $db;
    }

    public function addToCart($userId, $productId, $quantity) {
        try {
            $stmt = $this->db->prepare(
                "INSERT INTO {$this->table} (user_id, product_id, quantity) 
                VALUES (:user_id, :product_id, :quantity)
                ON DUPLICATE KEY UPDATE quantity = quantity + :quantity"
            );
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCartItemsByUserId($userId) {
        $stmt = $this->db->prepare(
            "SELECT c.*, p.name AS product_name, p.price AS product_price, p.image AS product_image
            FROM {$this->table} c
            INNER JOIN products p ON c.product_id = p.id
            WHERE c.user_id = :userId"
        );
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $this->db->prepare(
            "SELECT SUM(p.price * c.quantity) AS total_amount
            FROM {$this->table} c
            INNER JOIN products p ON c.product_id = p.id
            WHERE c.user_id = :userId"
        );

        $stmt2->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt2->execute();
        $totalResult = $stmt2->fetch(PDO::FETCH_ASSOC);
        
        return json_encode([
            'items' => $cartItems,
            'total_amount' => $totalResult['total_amount'] ?? 0
        ]);
    }

    public function deleteCartItem($userId, $productId) {
        $stmt = $this->db->prepare(
            "DELETE FROM {$this->table} 
            WHERE user_id = :userId AND product_id = :productId"
        );
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>