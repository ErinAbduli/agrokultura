<?php 
session_start();
require_once __DIR__ . "../../../../backend/config/Database.php";
require_once __DIR__ . "../../../../backend/models/Cart.php";
$database = new Database();
$db = $database->getConnection();
$cart = new Cart($db);

$userId = 1; 

if($_SESSION && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit();
}

$cartFetch = $cart->getCartItemsByUserId($userId);

if(!$cartFetch) {
    die("Error fetching cart items.");
}

$cartItems = json_decode($cartFetch, true)['items'];
$totalAmount = json_decode($cartFetch, true)['total_amount'] ?? 0;
$transportFee = 5.00;


if(!$cartItems){
    $cartItems = [];
}

if($totalAmount == 0){
    $transportFee = 0.00;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/cart.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
    <?php include '../../includes/header.php' ?>
    <div class="cart-page">
        <h1>Shporta</h1>

        <div class="cart-layout">
            <section class="cart-items">
                <?php if (empty($cartItems)): ?>
                <p style="font-weight: bold;">Shporta juaj është bosh.</p>
                <?php else: ?>
                <?php foreach ($cartItems as $item): ?>
                <div class="cart-item">
                    
                        <img src="../../../backend/public/uploads/<?= $item['product_image'] ?>" alt="Product">

                        <div class="item-info">
                            <h3><?= $item['product_name'] ?></h3>
                            <p class="price">€<?= number_format($item['product_price'], 2) ?></p>
                        </div>

                        <div class="qty-control">
                            <button type="button" class="qty-btn decrease">−</button>
                            <input class="qty" type="number" value="<?= $item['quantity'] ?>" min="1" max="100">
                            <button type="button" class="qty-btn increase">+</button>
                        </div>

                        <p class="item-total">€<?= number_format($item['product_price'], 2) ?></p>
                    <form action="../../../backend/controllers/deleteCartItem.php" method="POST">
                        <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                        <input type="hidden" name="user_id" value="<?= $userId ?>">
                        <button type="submit" class="remove-item">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </section>

            <aside class="cart-summary" <?php if (empty($cartItems)) echo 'style="display:none;"'; ?>>
                <h3>Përmbledhje</h3>

                <div class="summary-row">
                    <span>Nëntotali</span>
                    <span>€<?= number_format($totalAmount, 2) ?></span>
                </div>

                <div class="summary-row">
                    <span>Transport</span>
                    <span>€<?= number_format($transportFee, 2) ?></span>
                </div>

                <div class="summary-row total">
                    <span>Totali</span>
                    <span>€<?= number_format($totalAmount + $transportFee, 2) ?></span>
                </div>
                
                <form action="../../../backend/controllers/checkout.php" method="POST">
                    <input type="hidden" name="user_id" value="<?= $userId ?>">
                    <input type="hidden" name="total_amount" value="<?= $totalAmount + $transportFee ?>">
                    <input type="hidden" name="cartItems" value='<?= json_encode($cartItems) ?>'>
                    <button type="submit" class="checkout-btn">Vazhdo në Pagesë</button>
                </form>
            </aside>
        </div>
    </div>
    <?php if(!empty($cartItems)): ?>
    <?php include '../../includes/footer.php' ?>
    <?php endif; ?>
    <script src="../../assets/js/hamburgerMenuToggler.js"></script>
    <script src="../../assets/js/cartControlQty.js"></script>
</body>

</html>