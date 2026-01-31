<?php
session_start();
require_once __DIR__ . "../../../backend/config/Database.php";
require_once __DIR__ . "../../../backend/models/Order.php";
require_once __DIR__ . "../../../backend/models/Address.php";

$database = new Database();
$db = $database->getConnection();
$orderModel = new Order($db);
$address = new Address($db);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
    $totalAmount = isset($_POST['total_amount']) ? floatval($_POST['total_amount']) : 0.0;
    $cartItems = isset($_POST['cartItems']) ? json_decode($_POST['cartItems'], true) : [];

    $shippingAddress = $address->getAddressByUserId($userId);

    $orderId = $orderModel->createOrder($userId, $totalAmount, $shippingAddress);

    if($orderId) {
        $itemsAdded = $orderModel->addOrderItems($orderId, $cartItems);

        if($itemsAdded) {
            header("Location: /agrokultura/frontend/pages/payment/checkout.php?order_id=" . $orderId);
            exit();
        } else {
            echo "Error adding order items.";
        }
    } else {
        echo "Error creating order.";
        exit();
    }
} else {
    header("Location: /agrokultura/frontend/pages/cart/cart.php");
    exit();
}

?>