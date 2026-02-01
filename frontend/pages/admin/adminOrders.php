<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';
require_once __DIR__ . '/../../../backend/models/User.php';
require_once __DIR__ . '/../../../backend/models/Order.php';

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

$ordersQuery = "SELECT o.id, o.total, o.status, o.created_at, u.full_name 
                FROM orders o 
                LEFT JOIN users u ON o.user_id = u.id 
                ORDER BY o.created_at DESC";
$ordersStmt = $connection->prepare($ordersQuery);
$ordersStmt->execute();
$orders = $ordersStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porositë - Agrokultura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/adminPages.css" />
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
    <div class="sidebar">
        <a href="../../../index.php">
            <img src="../../assets/images/logo-white.png" width="140px" alt="">
        </a>
        <ul>
            <a href="./adminDashboard.php">
                <li><i class="bi bi-clipboard-check"></i> &nbsp;Dashboard</li>
            </a>
            <a href="./adminProducts.php">
                <li><i class="bi bi-box2"></i> &nbsp;Produktet</li>
            </a>
            <a href="">
                <li class="active"><i class="bi bi-truck"></i> &nbsp;Porositë</li>
            </a>
            <a href="./adminClients.php">
                <li><i class="bi bi-person"></i> &nbsp;Klientët</li>
            </a>
            <a href="">
                <li><i class="bi bi-graph-up"></i> &nbsp;Analitikat</li>
            </a>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <div>
                <h1>Porositë</h1>
                <p>Përshëndetje, <?= htmlspecialchars($userName) ?></p>
            </div>
        </div>
        <div class="search-bar">
            <div class="bar">
                <input type="text" id="search" class="search" name="search" placeholder="Kërko Porosi...">
                <button><i class="bi bi-search" style="color: white;"></i></button>
            </div>
        </div>
        <div class="product-table">
            <table class="product-table-box">
                <thead>
                    <tr>
                        <th>ID Porosisë</th>
                        <th>Porositur Nga</th>
                        <th>Statusi</th>
                        <th>Data</th>
                        <th>Totali</th>
                        <th>Ndrysho</th>
                    </tr>
                </thead>
                <tbody id="ordersTableBody">
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td>#<?= htmlspecialchars($order['id']) ?></td>
                                <td><?= htmlspecialchars($order['full_name'] ?? 'N/A') ?></td>
                                <td><?= htmlspecialchars($order['status']) ?></td>
                                <td><?= date('d/m/Y', strtotime($order['created_at'])) ?></td>
                                <td>€<?= number_format($order['total'], 2) ?></td>
                                <td class="action-btns">
                                    <button class="btn-1" onclick="editOrder(<?= $order['id'] ?>)">
                                        <i class="bi bi-pencil-square" style="color: white;"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 20px;">
                                Nuk ka porosi të regjistruara.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#ordersTableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function editOrder(id) {
            alert('Funksioni i editimit do të implementohet së shpejti!');
        }
    </script>
</body>

</html>