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

    public function getRatingStats($productId) {
        $stmt = $this->db->prepare(
            "SELECT 
                COUNT(*) AS total_reviews,
                AVG(rating) AS average_rating,
                SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END) AS five_star,
                SUM(CASE WHEN rating = 4 THEN 1 ELSE 0 END) AS four_star,
                SUM(CASE WHEN rating = 3 THEN 1 ELSE 0 END) AS three_star,
                SUM(CASE WHEN rating = 2 THEN 1 ELSE 0 END) AS two_star,
                SUM(CASE WHEN rating = 1 THEN 1 ELSE 0 END) AS one_star
            FROM {$this->table}
            WHERE product_id = :productId"
        );
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>