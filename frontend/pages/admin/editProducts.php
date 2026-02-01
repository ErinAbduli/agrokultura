<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';
require_once __DIR__ . '/../../../backend/models/Product.php';
require_once __DIR__ . '/../../../backend/models/Category.php';

$db = new Database();
$connection = $db->getConnection();
$category = new Category($connection);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    $productModel = new Product($connection);
    $product = $productModel->getById($productId);

    if ($product) {
        $name = $product['name'];
        $description = $product['description'];
        $price = $product['price'];
        $stock = $product['stock'];
        $subcategoryId = $product['subcategory_id'];
        $image = $product['image'];
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

$subcategories = $category->getAllSubcategoriesNoId();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products - Agrokultura</title>
    <link rel="stylesheet" href="../../assets/css/editProducts.css" />
<body>
    <div class="editForm">
        <h2>Edit Product</h2>
        <form id="editForm" method="POST" action="../../../backend/controllers/editProduct.php">
            <input type="hidden" id="editProductId" name="product_id" value="<?= $productId ?>" />
            <label for="editName">Name:</label>
            <input type="text" id="editName" name="name" value="<?= $name ?>" required />

            <label for="editDescription">Description:</label>
            <textarea id="editDescription" name="description" required><?= $description ?></textarea>

            <label for="editPrice">Price (€):</label>
            <input type="number" step="0.01" id="editPrice" name="price" value="<?= $price ?>" required />

            <label for="editStock">Stock:</label>
            <input type="number" id="editStock" name="stock" value="<?= $stock ?>" required />

            <label for="editSubcategory">Subcategory ID:</label>
            <select name="subcategory" id="editSubcategory">
                <?php foreach ($subcategories as $subcategory): ?>
                    <option value="<?= $subcategory['id'] ?>" <?= $subcategoryId == $subcategory['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($subcategory['emri']) ?> (ID: <?= $subcategory['id'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="editImage">Image:</label>
            <input type="text" id="editImage" name="image" value="<?= $image ?>" />

            <div class="form-buttons">
                <button type="submit" class="btn-submit">Save Changes</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='../admin/adminProducts.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>