<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once '../../../backend/config/database.php';
require_once '../../../backend/models/Contact.php';

$fullName = isset($_SESSION['full_name']) && !empty($_SESSION['full_name']) ? $_SESSION['full_name'] : 'Admin';
$userName = explode(' ', $fullName)[0];

$database = new Database();
$db = $database->getConnection();
$contactModel = new Contact($db);
$contacts = $contactModel->getAllContacts();
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
                <li><i class="bi bi-person"></i> &nbsp;Klientët</li>
            </a>
            <a href="./adminContacts.php">
                <li class="active"><i class="bi bi-chat-left-text"></i> &nbsp;Mesazhet e Kontaktit</li>
            </a>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <div>
                <h1>Mesazhet e Kontaktit</h1>
                <p>Përshëndetje, <?= htmlspecialchars($userName) ?></p>
            </div>
        </div>
        <div class="search-bar">
            <div class="bar">
                <input type="text" id="search" class="search" name="search" placeholder="Kërko Klientë...">
                <button><i class="bi bi-search" style="color: white;"></i></button>
            </div>
        </div>
        <div class="product-table">
            <table class="product-table-box">
                <thead>
                    <tr>
                        <th>ID Mesazhit</th>
                        <th>Emri i Dërguesit</th>
                        <th>Email i Dërguesit</th>
                        <th>Numri i Telefonit</th>
                        <th>lloji</th>
                        <th>Mesazhi</th>
                        <th>Kthe Mesazhin</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    <?php if (!empty($contacts)): ?>
                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td>#<?= $contact['id'] ?></td>
                                <td><?= $contact['full_name'] ?></td>
                                <td><?= $contact['email'] ?></td>
                                <td><?= $contact['phone'] ?? 'N/A' ?></td>
                                <td><?= $contact['options'] ?></td>
                                <td><?= $contact['mesazhi'] ?></td>
                                <td><a href="mailto:<?= htmlspecialchars($contact['email']) ?>?subject=Pergjigjje%20mbi%20mesazhin%20tuaj"><i class="bi bi-envelope"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 20px;">
                                Nuk ka mesazhe kontakti të regjistruara.
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