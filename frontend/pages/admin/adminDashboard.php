<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';
require_once __DIR__ . '/../../../backend/models/User.php';
require_once __DIR__ . '/../../../backend/models/Order.php';
require_once __DIR__ . '/../../../backend/models/Product.php';

$db = new Database();
$connection = $db->getConnection();

if (!isset($_SESSION['full_name']) || empty($_SESSION['full_name'])) {
    $userModel = new User($connection);
    $userQuery = "SELECT full_name FROM users WHERE id = :user_id";
    $userStmt = $connection->prepare($userQuery);
    $userStmt->bindParam(':user_id', $_SESSION['user_id']);
    $userStmt->execute();
    $userData = $userStmt->fetch(PDO::FETCH_ASSOC);
    if ($userData) {
        $_SESSION['full_name'] = $userData['full_name'];
    }
}

$fullName = isset($_SESSION['full_name']) && !empty($_SESSION['full_name']) ? $_SESSION['full_name'] : 'Admin';
$userName = explode(' ', $fullName)[0];

$totalSalesQuery = "SELECT COALESCE(SUM(total), 0) as total_sales FROM orders WHERE status != 'cancelled'";
$totalSalesStmt = $connection->prepare($totalSalesQuery);
$totalSalesStmt->execute();
$totalSales = $totalSalesStmt->fetch(PDO::FETCH_ASSOC)['total_sales'];

$totalOrdersQuery = "SELECT COUNT(*) as total_orders FROM orders";
$totalOrdersStmt = $connection->prepare($totalOrdersQuery);
$totalOrdersStmt->execute();
$totalOrders = $totalOrdersStmt->fetch(PDO::FETCH_ASSOC)['total_orders'];

$totalClientsQuery = "SELECT COUNT(*) as total_clients FROM users WHERE role != 1";
$totalClientsStmt = $connection->prepare($totalClientsQuery);
$totalClientsStmt->execute();
$totalClients = $totalClientsStmt->fetch(PDO::FETCH_ASSOC)['total_clients'];

$shippingOrdersQuery = "SELECT COUNT(*) as shipping_orders FROM orders WHERE status IN ('shipped')";
$shippingOrdersStmt = $connection->prepare($shippingOrdersQuery);
$shippingOrdersStmt->execute();
$shippingOrders = $shippingOrdersStmt->fetch(PDO::FETCH_ASSOC)['shipping_orders'];

$recentOrdersQuery = "SELECT o.id, o.total, o.status, o.created_at, u.full_name 
                       FROM orders o 
                       LEFT JOIN users u ON o.user_id = u.id 
                       ORDER BY o.created_at DESC 
                       LIMIT 5";
$recentOrdersStmt = $connection->prepare($recentOrdersQuery);
$recentOrdersStmt->execute();
$recentOrders = $recentOrdersStmt->fetchAll(PDO::FETCH_ASSOC);

$bestSellingQuery = "SELECT oi.product_name, SUM(oi.quantity) as total_sold 
                     FROM order_items oi 
                     INNER JOIN orders o ON oi.order_id = o.id 
                     WHERE o.status != 'cancelled' 
                     GROUP BY oi.product_name 
                     ORDER BY total_sold DESC 
                     LIMIT 5";
$bestSellingStmt = $connection->prepare($bestSellingQuery);
$bestSellingStmt->execute();
$bestSelling = $bestSellingStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Agrokultura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/adminDashboard.css" />
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
    <div class="sidebar">
        <a href="../../../index.php">
            <img src="../../assets/images/logo-white.png" width="140px" alt="">
        </a>
        <ul>
            <a href="">
                <li class="active"><i class="bi bi-clipboard-check"></i> &nbsp;Dashboard</li>
            </a>
            <a href="./adminProducts.php">
                <li><i class="bi bi-box2"></i> &nbsp;Produktet</li>
            </a>
            <a href="./adminOrders.php">
                <li><i class="bi bi-truck"></i> &nbsp;Porositë</li>
            </a>
            <a href="./adminClients.php">
                <li><i class="bi bi-person"></i> &nbsp;Klientët</li>
            </a>
            <a href="./adminContacts.php">
                <li><i class="bi bi-chat-left-text"></i> &nbsp;Mesazhet e Kontaktit</li>
            </a>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <div>
                <h1>Dashboard</h1>
                <p>Përshëndetje, <?= htmlspecialchars($userName) ?></p>
            </div>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Shitjet Totale</h3>
                <p>€<?= number_format($totalSales, 2) ?></p>
            </div>
            <div class="card">
                <h3>Nr. i Porosive</h3>
                <p><?= $totalOrders ?></p>
            </div>
            <div class="card">
                <h3>Nr. i klientëve</h3>
                <p><?= $totalClients ?></p>
            </div>
            <div class="card">
                <h3>Porositë në Dërgesë</h3>
                <p><?= $shippingOrders ?></p>
            </div>
        </div>

        <div class="tables">
            <div class="table-box">
                <h2>Porositë e Fundit</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Klienti</th>
                        <th>Shuma</th>
                        <th>Statusi</th>
                        <th>Data</th>
                    </tr>
                    <?php if (!empty($recentOrders)): ?>
                        <?php foreach ($recentOrders as $order): ?>
                            <tr>
                                <td>#<?= htmlspecialchars($order['id']) ?></td>
                                <td><?= htmlspecialchars($order['full_name'] ?? 'N/A') ?></td>
                                <td>€<?= number_format($order['total'], 2) ?></td>
                                <td><?= htmlspecialchars($order['status']) ?></td>
                                <td><?= date('d/m/Y', strtotime($order['created_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 20px;">
                                Nuk ka porosi të regjistruara.
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>

            <div class="table-box">
                <h2>Produktet më të Shitura</h2>
                <table>
                    <tr>
                        <th>Produkti</th>
                        <th>Shitjet</th>
                    </tr>
                    <?php if (!empty($bestSelling)): ?>
                        <?php foreach ($bestSelling as $product): ?>
                            <tr>
                                <td><?= htmlspecialchars($product['product_name']) ?></td>
                                <td><?= htmlspecialchars($product['total_sold']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" style="text-align: center; padding: 20px;">
                                Nuk ka të dhëna për produktet më të shitura.
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>