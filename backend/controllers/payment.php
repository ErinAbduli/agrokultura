<?php
session_start();
require_once __DIR__ . "../../../backend/config/Database.php";
require_once __DIR__ . "../../../backend/models/Order.php";
require_once __DIR__ . "../../../backend/models/Cart.php";

$database = new Database();
$db = $database->getConnection();
$orderModel = new Order($db);
$cartModel = new Cart($db);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_SESSION['user_id'])) {
        header("Location: /login.php");
        exit();
    }

    if(isset($_POST['card-number']) && isset($_POST['expiry-date']) && isset($_POST['cvv']) && isset($_POST['order_id'])) {
        if($_POST['card-number'] == 4242424242424242 && $_POST['expiry-date'] == '12/34' && $_POST['cvv'] == '123') {
            $orderId = intval($_POST['order_id']);
            
            $orderModel->updateOrderStatus($orderId, 'paid');

            $cartModel->clearCartByUserId($_SESSION['user_id']);

            header("Location: /agrokultura/frontend/pages/payment/success.php?order_id=" . $orderId);
            exit();
        } else {
            echo "Payment failed. Invalid card details.";
            exit();
        }
    }
}
?>