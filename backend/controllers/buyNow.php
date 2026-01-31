<?php
session_start();
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Address.php';

$database = new Database();
$db = $database->getConnection();
$order = new Order($db);
$product = new Product($db);
$address = new Address($db);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['qty']) ? intval($_POST['qty']) : 1;
    $userId = 1;

    if($_SESSION && isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    } else {
        header("Location: /agrokultura/frontend/pages/forms/login.php");
        exit();
    }

    $productDetails = $product->getById($productId);
    $totalPrice = $productDetails ? $productDetails['price'] * $quantity : 0;

    $addressId = $address->getAddressByUserId($userId);


    if($productId > 0 && $quantity > 0) {
        $order->createOrder($userId, $totalPrice, $addressId);

        $orderId = $db->lastInsertId();

        $order->addOrderItems($orderId, [
            [
                'product_id' => $productId,
                'product_name' => $productDetails['name'],
                'quantity' => $quantity,
                'product_price' => $productDetails['price']
            ]
        ]);
    }

    header("Location: /agrokultura/frontend/pages/payment/checkout.php?order_id=" . $orderId);
    exit();
}
?>