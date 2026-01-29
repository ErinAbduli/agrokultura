<?php
session_start();
require_once __DIR__ . "../../../../backend/config/Database.php";
require_once __DIR__ . "../../../../backend/models/Product.php";
require_once __DIR__ . "../../../../backend/models/Category.php";
require_once __DIR__ . "../../../../backend/models/Review.php";
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$review = new Review($db);
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$productDetails = $product->getById($productId);
if($productDetails) {
    $similarProducts = $product->getAllFromSameCategory($productDetails['subcategory_id'], $productId);
}

$reviews = $review->getReviewsByProductId($productId);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $message = isset($_POST['review']) ? trim($_POST['review']) : '';
    $userId = 1;

    if($_SESSION && isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    } else {
        header("Location: /agrokultura/frontend/pages/forms/login.php");
        exit();
    }

    if($rating < 1 || $rating > 5 || empty($message)) {
        header("Location: product.php?id=" . $productId);
        exit();
    }


    $stmt = $db->prepare("INSERT INTO reviews (product_id, user_id, rating, message, created_at) VALUES (:product_id, :user_id, :rating, :message, NOW())");

    $stmt->bindParam(':product_id', $productId);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    header("Location: product.php?id=" . $productId);
    exit();
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

            <?php if (empty($reviews)): ?>
                <p>Nuk ka vlerësime për këtë produkt ende.</p>
            <?php else: ?>
                <?php foreach ($reviews as $rev): ?>
            <div class="review">
                <div class="review-header">
                    <strong><?= $rev['full_name'] ? $rev['full_name'] : "Anonymous" ?></strong>
                    <div class="stars">
                        <?php for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rev['rating']) {
                                echo '<i class="bi bi-star-fill"></i>';
                            } else {
                                echo '<i class="bi bi-star"></i>';
                            }
                        } ?>
                    </div>
                </div>
                <p class="review-date"><?= date("d F Y", strtotime($rev['created_at'])) ?></p>
                <p class="review-text">
                    <?= $rev['message'] ?>
                </p>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>

        </div>
        <div class="similar-products">
            <h3>Produktet e Ngjashme</h3>
            <div class="products-container">
                <?php foreach ($similarProducts as $prod): ?>
                <div class="product-card">
                    <img src="../../../backend/public/uploads/<?= $prod['image'] ?>" alt="Product Image" width="50px">
                    <div class="product-card-description">
                        <h3><?= htmlspecialchars($prod['name']) ?></h3>
                        <p class="price"><?= htmlspecialchars($prod['price']) ?> &euro;</p>
                        <button class="add-to-cart-btn" onclick="window.location.href = './product.php?id=<?= $prod['id'] ?>'">Shiko Detajet</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>
    <?php endif; ?>

    <div class="modal" id="reviewModal">
        <div class="modal-content">
            <span class="close" id="closeReview">&times;</span>

            <h2>Lëre një vlerësim</h2>

            <form id="reviewForm" action="product.php?id=<?= $productId ?>" method="POST" novalidate>
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
</body>

</html>