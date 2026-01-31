<?php
class Order {
    private $conn;
    private $table_name = "orders";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createOrder($userId, $totalAmount, $shippingAddress) {
        $query = "INSERT INTO {$this->table_name} (user_id, total, address_id, status, created_at) 
                  VALUES (:user_id, :total, :address_id, 'pending', NOW())";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':total', $totalAmount);
        $stmt->bindParam(':address_id', $shippingAddress);

        if($stmt->execute()) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }

    public function addOrderItems($orderId, $cartItems) {
        $query = "INSERT INTO order_items (order_id, product_id, product_name, quantity, price) 
                  VALUES (:order_id, :product_id, :product_name, :quantity, :price)";

        $stmt = $this->conn->prepare($query);

        foreach($cartItems as $item) {
            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':product_id', $item['product_id']);
            $stmt->bindParam(':product_name', $item['product_name']);
            $stmt->bindParam(':quantity', $item['quantity']);
            $stmt->bindParam(':price', $item['product_price']);

            if(!$stmt->execute()) {
                return false;
            }
        }
        return true;
    }

    public function getOrderById($orderId) {
        $query = "SELECT * FROM {$this->table_name} WHERE id = :order_id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrderItems($orderId) {
        $query = "SELECT oi.*, products.image AS product_image FROM order_items oi INNER JOIN products ON oi.product_id = products.id WHERE order_id = :order_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateOrderStatus($orderId, $status) {
        $query = "UPDATE {$this->table_name} SET status = :status WHERE id = :order_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':order_id', $orderId);

        return $stmt->execute();
    }

    public function checkOrderStatus($orderId) {
        $query = "SELECT status FROM {$this->table_name} WHERE id = :order_id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['status'] : null;
    }
}
?>