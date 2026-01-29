<?php
class Review {
    private $db;
    private $table = "reviews";

    public function __construct($db) {
        $this->db = $db;
    }

    public function getReviewsByProductId($productId) {
        $stmt = $this->db->prepare(
            "SELECT r.*, u.id AS user_id, u.full_name, u.email
            FROM {$this->table} r
            INNER JOIN users u ON r.user_id = u.id
            WHERE r.product_id = :productId
            ORDER BY r.created_at DESC LIMIT 10"
        );
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>