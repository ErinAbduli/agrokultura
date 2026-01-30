<?php
session_start();
require_once __DIR__ . "../../../backend/config/Database.php";
require_once __DIR__ . "../../../backend/models/Cart.php";

$database = new Database();
$db = $database->getConnection();
$cart = new Cart($db);

$userId = 1;

if($_SESSION && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    $cart->deleteCartItem($userId, $productId);

    header("Location: /agrokultura/frontend/pages/cart/cart.php");
    exit();
} else {
    header("Location: /agrokultura/frontend/pages/cart/cart.php");
    exit();
}
?>