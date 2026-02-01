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
        header("Location: /agrokultura/frontend/pages/forms/login.php");
        exit();
    }
    //qetu kom shtu pak regex edhe do trima 
    if(isset($_POST['card-number']) && isset($_POST['expiry-date']) && isset($_POST['cvv']) && isset($_POST['order_id'])) {
        $cardNumber = preg_replace('/[^0-9]/', '', $_POST['card-number']);
        $expiryDate = trim($_POST['expiry-date']);
        $cvv = trim($_POST['cvv']);
        //thoje gabimi osht te numri qe o string qato e kom bo me intval 
        if($cardNumber === '4242424242424242' && $expiryDate === '12/34' && $cvv === '123') {
            $orderId = intval($_POST['order_id']);
            
            $orderDetails = $orderModel->getOrderById($orderId);
            if(!$orderDetails || $orderDetails['user_id'] != $_SESSION['user_id']) {
                header("Location: /agrokultura/frontend/pages/payment/checkout.php?order_id=" . $orderId . "&error=invalid_order");
                exit();
            }
            
            $updateResult = $orderModel->updateOrderStatus($orderId, 'paid');
            //edhe qeto pom doket e kom shtu hahah
            if($updateResult) {
                if(method_exists($cartModel, 'clearCartByUserId')) {
                    $cartModel->clearCartByUserId($_SESSION['user_id']);
                }
                
                header("Location: /agrokultura/frontend/pages/payment/success.php?order_id=" . $orderId);
                exit();
            } else {
                header("Location: /agrokultura/frontend/pages/payment/checkout.php?order_id=" . $orderId . "&error=payment_failed");
                exit();
            }
        } else {
            header("Location: /agrokultura/frontend/pages/payment/checkout.php?order_id=" . intval($_POST['order_id']) . "&error=invalid_card");
            exit();
        }
    } else {
        header("Location: /agrokultura/frontend/pages/cart/cart.php?error=missing_fields");
        exit();
    }
} else {
    header("Location: /agrokultura/frontend/pages/cart/cart.php");
    exit();
}
?>