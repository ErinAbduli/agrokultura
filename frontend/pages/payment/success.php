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

$orderDetails = $order->getOrderById($orderId);

if(!$orderDetails) {
    die("Order not found.");
    exit();
}

if($orderDetails['user_id'] != $_SESSION['user_id']) {
    die("Access denied.");
    exit();
}
//qekjo u shtue
$orderStatus = $order->checkOrderStatus($orderId);

if($orderStatus !== 'paid') {
    header("Location: /agrokultura/frontend/pages/payment/checkout.php?order_id=" . $orderId . "&error=payment_required");
    exit();
}
//deri qetu
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagesa e suksesshme - Agrokultura</title>
    <link rel="stylesheet" href="../../../frontend/assets/css/success.css">
</head>
<body>
    <div class="success">
        <h1>Pagesa u krye me sukses!</h1>
        <p>Faleminderit për blerjen tuaj. ID e porosisë suaj është: <?= htmlspecialchars($orderId) ?></p>
        <a href="/agrokultura/index.php" class="btn-home">Kthehu në faqen kryesore</a>
    </div>
</body>
</html>