<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';
require_once __DIR__ . '/../../../backend/models/Category.php';
require_once __DIR__ . '/../../../backend/models/Product.php';
require_once __DIR__ . '/../../../backend/models/User.php';

$db = new Database();
$connection = $db->getConnection();
$categoryModel = new Category($connection);
$productModel = new Product($connection);

$subcategories = $categoryModel->getAllSubcategoriesNoId();
$products = $productModel->getAll('default');

if (!isset($_SESSION['full_name']) || empty($_SESSION['full_name'])) {
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
}
$fullName = isset($_SESSION['full_name']) && !empty($_SESSION['full_name']) ? $_SESSION['full_name'] : 'Admin';
$userName = explode(' ', $fullName)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktet - Agrokultura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/adminPages.css" />
    <link rel="stylesheet" href="../../assets/css/adminProducts.css" />
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
            <a href="">
                <li class="active"><i class="bi bi-box2"></i> &nbsp;Produktet</li>
            </a>
            <a href="./adminOrders.php">
                <li><i class="bi bi-truck"></i> &nbsp;Porositë</li>
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
                <h1>Produktet</h1>
                <p>Përshëndetje, <?= htmlspecialchars($userName) ?></p>
            </div>
        </div>
        <div class="search-bar">
            <div class="bar">
                <input type="text" id="search" class="search" name="search" placeholder="Kerko Produkte...">
                <button><i class="bi bi-search" style="color: white;"></i></button>
            </div>
            <div class="add-product">
                <button onclick="openModal()" style="background-color: #22a561; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: 600;">
                    Shto <i class="bi bi-plus-lg"></i>
                </button>
            </div>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="message success">
                <?php
                if ($_GET['success'] === 'product_added') {
                    echo 'Produkti u shtua me sukses!';
                }
                ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="message error">
                <?php
                if ($_GET['error'] === 'invalid_fields') {
                    echo 'Të gjitha fushat duhet të plotësohen dhe të jenë të vlefshme!';
                } elseif ($_GET['error'] === 'missing_fields') {
                    echo 'Të gjitha fushat janë të detyrueshme!';
                } elseif ($_GET['error'] === 'product_not_added') {
                    echo 'Gabim: Produkti nuk u shtua!';
                } elseif ($_GET['error'] === 'invalid_method') {
                    echo 'Metoda e kërkesës nuk është e vlefshme!';
                } elseif ($_GET['error'] === 'access_denied') {
                    echo 'Nuk keni akses!';
                } elseif ($_GET['error'] === 'product_not_found') {
                    echo 'Produkti nuk u gjet!';
                } elseif ($_GET['error'] === 'delete_failed') {
                    echo 'Gabim: Produkti nuk u fshi!';
                } else {
                    echo 'Ndodhi një gabim!';
                }
                ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="message success">
                <?php
                if ($_GET['success'] === 'product_deleted') {
                    echo 'Produkti u fshi me sukses!';
                }
                ?>
            </div>
        <?php endif; ?>

        <div class="product-table">
            <table class="product-table-box">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produkti</th>
                        <th>Cmimi</th>
                        <th>Sasia</th>
                        <th>Subkategoria</th>
                        <th>Ndrysho</th>
                    </tr>
                </thead>
                <tbody id="productsTableBody">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>#<?= htmlspecialchars($product['id']) ?></td>
                                <td><?= htmlspecialchars($product['name']) ?></td>
                                <td>€<?= number_format($product['price'], 2) ?></td>
                                <td><?= htmlspecialchars($product['stock']) ?></td>
                                <td><?= htmlspecialchars($product['subcategory_id'] ?? 'N/A') ?></td>
                                <td class="action-btns">
                                    <button class="btn-1" onclick="editProduct(<?= $product['id'] ?>)">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn-2" onclick="deleteProduct(<?= $product['id'] ?>, '<?= htmlspecialchars(addslashes($product['name'])) ?>')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 20px;">
                                Nuk ka produkte të regjistruara.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div id="productModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Shto Produkt të Ri</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <form id="productForm" method="POST" action="handleProduct.php">
                <div class="form-group">
                    <label for="productName">Emri i Produktit *</label>
                    <input type="text" id="productName" name="name" required>
                </div>

                <div class="form-group">
                    <label for="productPrice">Çmimi (€) *</label>
                    <input type="number" id="productPrice" name="price" step="0.01" min="0" required>
                </div>

                <div class="form-group">
                    <label for="productStock">Sasia *</label>
                    <input type="number" id="productStock" name="stock" min="0" required>
                </div>

                <div class="form-group">
                    <label for="productSubcategory">Subkategoria *</label>
                    <select id="productSubcategory" name="subcategory_id" required>
                        <option value="">Zgjidh Subkategorinë</option>
                        <?php foreach ($subcategories as $subcategory): ?>
                            <option value="<?= htmlspecialchars($subcategory['id']) ?>">
                                <?= htmlspecialchars($subcategory['emri']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="productImage">Foto e Produktit (Path) *</label>
                    <input type="text" id="productImage" name="image" placeholder="P.sh: products/foto.jpg" required>
                    <small style="color: #666; font-size: 12px;">Shkruaj path-in e fotos (p.sh: products/foto.jpg)</small>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Anulo</button>
                    <button type="submit" class="btn-submit">Ruaj Produktin</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('productModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('productModal').style.display = 'none';
            document.getElementById('productForm').reset();
        }

        document.getElementById('search').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#productsTableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function editProduct(id) {
            alert('Funksioni i editimit do të implementohet së shpejti!');
        }

        function deleteProduct(productId, productName) {
            if (confirm('A jeni të sigurt që dëshironi të fshini produktin "' + productName + '"?\n\nKjo veprim nuk mund të zhbëhet!')) {
                window.location.href = 'deleteProduct.php?id=' + productId;
            }
        }

        window.onclick = function(event) {
            const modal = document.getElementById('productModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>

</html>
