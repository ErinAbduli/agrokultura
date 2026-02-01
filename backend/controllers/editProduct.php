<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../config/Database.php';
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);

    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;
    $subcategoryId = isset($_POST['subcategory']) ? intval($_POST['subcategory']) : 0;
    $image = isset($_POST['image']) ? trim($_POST['image']) : '';

    $query = "UPDATE products 
              SET name = :name, description = :description, price = :price, stock = :stock, subcategory_id = :subcategory_id, image = :image 
              WHERE id = :id";
            
    $stmt = $db->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':subcategory_id', $subcategoryId);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $productId);

    if ($stmt->execute()) {
        header("Location: /agrokultura/frontend/pages/admin/adminProducts.php");
        exit;
    } else {
        echo "Error updating product.";
        exit;
    }
} else {
    header("Location: /agrokultura/frontend/pages/admin/adminProducts.php");
    exit;
}
?>