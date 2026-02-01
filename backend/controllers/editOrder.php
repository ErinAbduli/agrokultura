<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../backend/config/Database.php';
require_once __DIR__ . '/../../backend/models/Order.php';

$db = new Database();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    $query = "UPDATE orders SET status = :status WHERE id = :order_id";
    $orderStmt = $connection->prepare($query);
    $orderStmt->bindParam(':order_id', $orderId);
    $orderStmt->bindParam(':status', $_POST['status']); 
    
    if($orderStmt->execute()) {
        header("Location: /agrokultura/frontend/pages/admin/adminOrders.php");
        exit;
    } else {
        echo "Error executing query.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>