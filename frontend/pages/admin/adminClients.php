<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';
require_once __DIR__ . '/../../../backend/models/User.php';

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

$usersQuery = "SELECT u.id, u.full_name, u.email, u.phone, u.role,
                COUNT(o.id) as total_orders
                FROM users u
                LEFT JOIN orders o ON u.id = o.user_id
                GROUP BY u.id
                ORDER BY o.created_at DESC";
$usersStmt = $connection->prepare($usersQuery);
$usersStmt->execute();
$users = $usersStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientet - Agrokultura</title>
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
            <a href="./adminOrders.php">
                <li><i class="bi bi-truck"></i> &nbsp;Porositë</li>
            </a>
            <a href="./adminClients.php">
                <li class="active"><i class="bi bi-person"></i> &nbsp;Klientët</li>
            </a>
            <a href="./adminContacts.php">
                <li><i class="bi bi-chat-left-text"></i> &nbsp;Mesazhet e Kontaktit</li>
            </a>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <div>
                <h1>Klientët</h1>
                <p>Përshëndetje, <?= htmlspecialchars($userName) ?></p>
            </div>
        </div>
        <div class="search-bar">
            <div class="bar">
                <input type="text" id="search" class="search" name="search" placeholder="Kërko Klientë...">
                <button><i class="bi bi-search" style="color: white;"></i></button>
            </div>
        </div>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="message success" style="background-color: #22a561; color: white; padding: 15px; border-radius: 5px; margin: 20px 0;">
                <?php
                if ($_GET['success'] === 'user_deleted') {
                    echo 'Përdoruesi u fshi me sukses!';
                }
                ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="message error" style="background-color: #dc3545; color: white; padding: 15px; border-radius: 5px; margin: 20px 0;">
                <?php
                if ($_GET['error'] === 'delete_failed') {
                    echo 'Gabim: Përdoruesi nuk u fshi!';
                } elseif ($_GET['error'] === 'user_not_found') {
                    echo 'Përdoruesi nuk u gjet!';
                } elseif ($_GET['error'] === 'cannot_delete_admin') {
                    echo 'Nuk mund të fshini administratorin!';
                } elseif ($_GET['error'] === 'cannot_edit_admin') {
                    echo 'Nuk mund të ndryshoni të dhënat e një administratori tjetër!';
                }   
                ?>
            </div>
        <?php endif; ?>
        <div class="product-table">
            <table class="product-table-box">
                <thead>
                    <tr>
                        <th>ID Klientit</th>
                        <th>Emri</th>
                        <th>Email</th>
                        <th>Numri</th>
                        <th>Roli</th>
                        <th>Total Porosi</th>
                        <th>Ndrysho</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>#<?= htmlspecialchars($user['id']) ?></td>
                                <td><?= htmlspecialchars($user['full_name']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= htmlspecialchars($user['phone'] ?? 'N/A') ?></td>
                                <td><?= ($user['role'] == 1) ? 'Administrator' : 'Klient' ?></td>
                                <td><?= htmlspecialchars($user['total_orders']) ?></td>
                                <td class="action-btns">
                                    <form action="./editClients.php" method="POST" >
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>" />
                                        <input type="hidden" name="role" value="<?= $user['role'] ?>" />
                                        <button class="btn-1">
                                            <i class="bi bi-pencil-square" style="color:white;"></i>
                                        </button>
                                    </form>
                                    <button class="btn-2" onclick="deleteUser(<?= $user['id'] ?>, '<?= htmlspecialchars(addslashes($user['full_name'])) ?>')">
                                        <i class="bi bi-trash-fill" style="color:white;"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 20px;">
                                Nuk ka klientë të regjistruar.
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
            const rows = document.querySelectorAll('#usersTableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function editUser(id) {
            alert('Funksioni i editimit do të implementohet së shpejti!');
        }

        function deleteUser(userId, userName) {
            if (confirm('A jeni të sigurt që dëshironi të fshini përdoruesin "' + userName + '"?\n\nKjo veprim nuk mund të zhbëhet!')) {
                window.location.href = 'deleteUser.php?id=' + userId;
            }
        }
    </script>
</body>

</html>