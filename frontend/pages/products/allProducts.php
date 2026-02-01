<?php
require_once __DIR__ . "../../../../backend/config/Database.php";
require_once __DIR__ . "../../../../backend/models/Product.php";
require_once __DIR__ . "../../../../backend/models/Category.php";
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$category = new Category($db);
$categoryId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$order = isset($_GET['order']) ? $_GET['order'] : 'default';
$products = $product->getAll($order);
$categories = $category->getAllCategories();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Agrokultura</title>
    <link rel="stylesheet" href="../../assets/css/productCategory.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
    <?php include '../../includes/header.php' ?>
    <div class="main">
        <div class="search">
            <div class="search-container">
                <i class="bi bi-search"></i>
                <form action="" id="searchForm">
                    <input type="text" class="search-bar" id="search-bar" placeholder="Kërko për produkte...">
                </form>
            </div>
            <div id="errorMsg"></div>
        </div>
        <div class="container">
            <div class="products">
                <div class="subcategories">
                    <?php foreach($categories as $category): ?>
                    <a href="./productCategory.php?id=<?= $category['id'] ?>"><?= $category['emri'] ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="order-by-section">
                    <p class="gjith-produktet">Të gjithë produktet</p>
                    <div class="custom-select" id="order-products">
                        <div class="selected">
                            <span class="selected-text">Rendit sipas</span>
                            <i class="bi bi-chevron-down"></i>
                        </div>

                        <ul class="options">
                            <li data-value="price-asc">Çmimi: Nga i ulëti në të lartë</li>
                            <li data-value="price-desc">Çmimi: Nga i larti në të ulët</li>
                            <li data-value="name-asc">Emri: A deri në Z</li>
                            <li data-value="name-desc">Emri: Z deri në A</li>
                        </ul>

                        <input type="hidden" name="order" value="default">
                    </div>
                    <div>
                        <button class="filter-btn"><i class="bi bi-funnel"></i> Filtro</button>
                    </div>
                </div>
                <div class="products-container">
                    <?php if (empty($products)): ?>
                        <p style="font-weight: bold;">Nuk ka produkte në këtë kategori.</p>
                    <?php endif; ?>
                    <?php foreach($products as $prod): ?>
                    <div class="product-card">
                        <img src="../../../backend/public/uploads/<?= $prod['image'] ?>" alt="Product Image" width="50px">
                        <div class="product-card-description">
                            <h3 id="prodName"><?= $prod['name'] ?></h3>
                            <p class="price"><?= $prod['price'] ?> &euro;</p>
                            <button onclick="window.location.href='./product.php?id=<?= $prod['id'] ?>'" class="add-to-cart-btn">Shiko
                                Detajet</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>

    <script src="../../assets/js/hamburgerMenuToggler.js"></script>
    <script src="../../assets/js/customOrderByDropdown.js"></script>
    <script src="../../assets/js/productSearchValidation.js"></script>
    <script>
        document.getElementById('search-bar').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                const productName = card.querySelector('#prodName').textContent.toLowerCase();
                if (productName.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>