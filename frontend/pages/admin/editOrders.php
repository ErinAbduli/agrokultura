<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';
require_once __DIR__ . '/../../../backend/models/Order.php';

$db = new Database();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    $orderQuery = "SELECT o.id, o.total, o.status, o.created_at, u.full_name 
                   FROM orders o 
                   LEFT JOIN users u ON o.user_id = u.id 
                   WHERE o.id = :order_id";
    $orderStmt = $connection->prepare($orderQuery);
    $orderStmt->bindParam(':order_id', $orderId);
    $orderStmt->execute();
    $orderData = $orderStmt->fetch(PDO::FETCH_ASSOC);

    if ($orderData) {
        $productId = $orderData['id'];
        $name = $orderData['full_name'];
        $total = $orderData['total'];
        $status = $orderData['status'];
        $createdAt = $orderData['created_at'];
    } else {
        echo "Order not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Orders - Agrokultura</title>
    <link rel="stylesheet" href="../../assets/css/editProducts.css" />
<body>
    <div class="editForm">
        <h2>Edit Order</h2>
        <form id="editForm" method="POST" action="../../../backend//controllers/editOrder.php">
            <input type="hidden" id="editOrderId" name="order_id" value="<?= $productId ?>" />
            <label for="editName">Porositur Nga:</label>
            <input disabled type="text" id="editName" name="name" value="<?= $name ?>" required />

            <label for="orderDate">Data e Porosisë:</label>
            <input disabled type="text" id="orderDate" name="order_date" value="<?= date('d/m/Y', strtotime($createdAt)) ?>" required />

            <label for="total">Totali (€):</label>
            <input disabled type="number" step="0.01" id="total" name="total" value="<?= $total ?>" required />

            <label for="editStatus">Statusi:</label>
            <select name="status" id="status">
                <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="paid" <?= $status === 'paid' ? 'selected' : '' ?>>Paid</option>
                <option value="processing" <?= $status === 'processing' ? 'selected' : '' ?>>In Process</option>
                <option value="shipped" <?= $status === 'shipped' ? 'selected' : '' ?>>Shipped</option>
                <option value="delivered" <?= $status === 'delivered' ? 'selected' : '' ?>>Delivered</option>
                <option value="cancelled" <?= $status === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>

            <div class="form-buttons">
                <button type="submit" class="btn-submit">Save Changes</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='../admin/adminOrders.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>