<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';
require_once __DIR__ . '/../../../backend/models/Product.php';

$db = new Database();
$connection = $db->getConnection();
$productModel = new Product($connection);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: adminProducts.php?error=product_not_found");
    exit;
}

$productId = $_GET['id'];

try {
    $product = $productModel->getById($productId);
    
    if (!$product) {
        header("Location: adminProducts.php?error=product_not_found");
        exit;
    }

    $result = $productModel->delete($productId);

    if ($result['success']) {
        header("Location: adminProducts.php?success=product_deleted");
        exit;
    } else {
        header("Location: adminProducts.php?error=delete_failed");
        exit;
    }
} catch (Exception $e) {
    header("Location: adminProducts.php?error=delete_failed");
    exit;
}
?>

