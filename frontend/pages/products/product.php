<?php
require_once __DIR__ . "../../../../backend/config/Database.php";
require_once __DIR__ . "../../../../backend/models/Product.php";
require_once __DIR__ . "../../../../backend/models/Category.php";
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$productDetails = $product->getById($productId);
if($productDetails) {
    $similarProducts = $product->getAllFromSameCategory($productDetails['subcategory_id'], $productId);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Agrokultura</title>
    <link rel="stylesheet" href="../../assets/css/product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
    <?php include '../../includes/header.php' ?>
    <div class="main">
        <?php if (!$productDetails): ?>
                <h2>Produkti nuk Ekziston.</h2>
            <?php else: ?>
        <div class="product-container">
            <img src="../../../backend/public/uploads/<?= $productDetails['image'] ?>" alt="">
            <div class="product-desc">
                <!-- <p class="brand">Bosch</p> -->
                <h3 class="title"><?= $productDetails['name'] ?></h3>
                <div class="rating">
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <span class="rating-text">4.5 · 128 reviews</span>
                </div>
                <h4 class="price">€<?= $productDetails['price'] ?></h4>

                <div class="section">
                    <label>Sasia</label>
                    <div class="qty-control">
                        <button class="qty-btn" id="decrease">-</button>
                        <input type="number" id="qty" value="1" min="1" max="100">
                        <button class="qty-btn" id="increase">+</button>
                    </div>
                </div>

                <div class="section transport">
                    <p class="label">Transport</p>
                    <p class="value"><i class="bi bi-truck" style="color: #22a561;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Koha e
                        arritjes: <span>3–5 ditë
                            pune</span></p>
                </div>

                <div class="section payment">
                    <p class="label">Pagesa të sigurta</p>
                    <ul>
                        <li><i class="bi bi-cash" style="color: #22a561;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Paguaj në dorë
                        </li>
                        <li><i class="bi bi-credit-card" style="color: #22a561;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Paguaj me
                            kartë</li>
                        <li><i class="bi bi-bank" style="color: #22a561;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Transfer bankar
                        </li>
                    </ul>
                </div>

                <div class="actions">
                    <button class="buy-now">Blej Tani</button>
                    <button class="add-to-cart">Shto në Shportë</button>
                </div>
            </div>

        </div>
        <div class="reviews-card">
            <div class="reviews-header">
                <h3>Vlerësimet e Klientëve</h3>
                <button class="leave-review" id="leave-review">Lëre një vlerësim</button>
            </div>

            <div class="review">
                <div class="review-header">
                    <strong>Arben K.</strong>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                </div>
                <p class="review-date">12 Qershor 2025</p>
                <p class="review-text">
                    Produkt shumë cilësor. Arriti shpejt dhe funksionon perfekt.
                    Do ta blej përsëri.
                </p>
            </div>

            <div class="review">
                <div class="review-header">
                    <strong>Elona M.</strong>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>
                <p class="review-date">3 Qershor 2025</p>
                <p class="review-text">
                    Shumë e fuqishme për çmimin. Paketimi ishte super.
                </p>
            </div>

            <button class="load-more">Shfaq më shumë</button>
        </div>
        <div class="similar-products">
            <h3>Produktet e Ngjashme</h3>
            <div class="products-container">
                <?php foreach ($similarProducts as $prod): ?>
                <div class="product-card">
                    <img src="../../../backend/public/uploads/<?= $prod['image'] ?>" alt="Product Image" width="50px">
                    <div class="product-card-description">
                        <h3><?= htmlspecialchars($prod['name']) ?></h3>
                        <!-- <p class="producer"><?= htmlspecialchars($prod['producer']) ?></p> -->
                        <p class="price"><?= htmlspecialchars($prod['price']) ?> &euro;</p>
                        <button class="add-to-cart-btn" onclick="window.location.href = './product.php?id=<?= $prod['id'] ?>'">Shiko Detajet</button>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- <div class="product-card">
                    <img src="../../assets/images/bosch-saw.png" alt="Product Image" width="50px">
                    <div class="product-card-description">
                        <h3>Power Drill</h3>
                        <p class="producer">IngCo</p>
                        <p class="price">100 &euro;</p>
                        <button class="add-to-cart-btn">Shiko Detajet</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="https://png.pngtree.com/png-vector/20250320/ourmid/pngtree-yellow-cordless-power-drill-isolated-on-transparent-background-png-image_15775261.png"
                        alt="Product Image" width="50px">
                    <div class="product-card-description">
                        <h3>Power Drill</h3>
                        <p class="producer">IngCo</p>
                        <p class="price">100 &euro;</p>
                        <button class="add-to-cart-btn">Shiko Detajet</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="../../assets/images/snow-shovel.png" alt="Product Image" width="50px">
                    <div class="product-card-description">
                        <h3>Power Drill</h3>
                        <p class="producer">IngCo</p>
                        <p class="price">100 &euro;</p>
                        <button class="add-to-cart-btn">Shiko Detajet</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="../../assets/images/bosch-saw.png" alt="Product Image" width="50px">
                    <div class="product-card-description">
                        <h3>Power Drill</h3>
                        <p class="producer">IngCo</p>
                        <p class="price">100 &euro;</p>
                        <button class="add-to-cart-btn">Shiko Detajet</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="https://png.pngtree.com/png-vector/20250320/ourmid/pngtree-yellow-cordless-power-drill-isolated-on-transparent-background-png-image_15775261.png"
                        alt="Product Image" width="50px">
                    <div class="product-card-description">
                        <h3>Power Drill</h3>
                        <p class="producer">IngCo</p>
                        <p class="price">100 &euro;</p>
                        <button class="add-to-cart-btn">Shiko Detajet</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>
    <?php endif; ?>

    <div class="modal" id="reviewModal">
        <div class="modal-content">
            <span class="close" id="closeReview">&times;</span>

            <h2>Lëre një vlerësim</h2>

            <form id="reviewForm" novalidate>
                <div class="rating">
                    <input type="radio" name="rating" id="star5" value="5" />
                    <label for="star5"><i class="bi bi-star-fill"></i></label>

                    <input type="radio" name="rating" id="star4" value="4" />
                    <label for="star4"><i class="bi bi-star-fill"></i></label>

                    <input type="radio" name="rating" id="star3" value="3" />
                    <label for="star3"><i class="bi bi-star-fill"></i></label>

                    <input type="radio" name="rating" id="star2" value="2" />
                    <label for="star2"><i class="bi bi-star-fill"></i></label>

                    <input type="radio" name="rating" id="star1" value="1" required />
                    <label for="star1"><i class="bi bi-star-fill"></i></label>
                </div>

                <textarea name="review" placeholder="Shkruaj vlerësimin tënd..." id="textarea-review"
                    required></textarea>

                <button type="submit">Shto vlerësimin</button>
            </form>
        </div>
    </div>

    <script src="../../assets/js/controlQty.js"></script>
    <script src="../../assets/js/hamburgerMenuToggler.js"></script>
    <script src="../../assets/js/modal.js"></script>
    <script src="../../assets/js/modalValidate.js"></script>
</body>

</html>