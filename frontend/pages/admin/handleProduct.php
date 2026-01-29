<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: adminProducts.php?error=access_denied");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';
require_once __DIR__ . '/../../../backend/models/Product.php';

$db = new Database();
$connection = $db->getConnection();
$productModel = new Product($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['subcategory_id']) && isset($_POST['image'])) {
        $name = trim($_POST['name']);
        $price = floatval($_POST['price']);
        $stock = intval($_POST['stock']);
        $subcategoryId = intval($_POST['subcategory_id']);
        $imagePath = trim($_POST['image']);

        if (empty($name) || $price <= 0 || $stock < 0 || $subcategoryId <= 0 || empty($imagePath)) {
            header("Location: adminProducts.php?error=invalid_fields");
            exit;
        }

        $result = $productModel->create($name, $price, $imagePath, $subcategoryId, $stock);
        
        if ($result && isset($result['success']) && $result['success']) {
            header("Location: adminProducts.php?success=product_added");
            exit;
        } else {
            header("Location: adminProducts.php?error=product_not_added");
            exit;
        }
    } else {
        header("Location: adminProducts.php?error=missing_fields");
        exit;
    }
} else {
    header("Location: adminProducts.php?error=invalid_method");
    exit;
}
?>
