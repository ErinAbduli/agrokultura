<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}

require_once __DIR__ . "../../../../backend/config/Database.php";
require_once __DIR__ . "../../../../backend/models/Order.php";

$database = new Database();
$db = $database->getConnection();
$order = new Order($db);
$orderId = $_GET['order_id'] ?? null;

if(!$orderId) {
    die("Invalid order ID.");
    exit();
}

$orderStatus = $order->checkOrderStatus($orderId);
$orderDetails = $order->getOrderById($orderId);

if(!$orderDetails) {
    die("Order not found.");
    exit();
}

if($orderDetails['user_id'] != $_SESSION['user_id']) {
    die("Access denied.");
    exit();
}

if(!$orderId) {
    die("Invalid order ID.");
    exit();
}

if($orderStatus !== 'paid') {
    die("Order not paid. Access denied.");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success - Agrokultura</title>
    <link rel="stylesheet" href="../../../frontend/assets/css/success.css">
</head>
<body>
    <div class="success">
        <h1>Payment Successful!</h1>
        <p>Thank you for your purchase. Your order ID is: <?= htmlspecialchars($orderId) ?></p>
        <a href="/agrokultura/index.php" class="btn-home">Return to Home</a>
    </div>
</body>
</html>