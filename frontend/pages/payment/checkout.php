<?php
session_start();
require_once __DIR__ . "../../../../backend/config/Database.php";
require_once __DIR__ . "../../../../backend/models/Order.php";

if(!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}

$database = new Database();
$db = $database->getConnection();
$orderModel = new Order($db);

$order_id = $_GET['order_id'] ?? null;
$orderStatus = $orderModel->checkOrderStatus($order_id);


if($orderStatus === 'paid') {
    header("Location: /agrokultura/frontend/pages/payment/success.php?order_id=" . $order_id);
    exit();
}

if($orderStatus !== 'pending') {
    header("Location: /agrokultura/index.php");
    exit();
}



if ($order_id) {
    $orderDetails = $orderModel->getOrderItems($order_id);
    $order = $orderModel->getOrderById($order_id);
} else {
    header("Location: /cart.php");
    exit();
}

if($order['user_id'] != $_SESSION['user_id']) {
    header("Location: /agrokultura/index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Agrokultura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/checkout.css">
</head>
<body>
    <?php include '../../includes/header.php' ?>
    <div class="checkout-page">
        <h1>Checkout</h1>
        <div class="container">
            <div class="billing-info">
                <form id="bill-form" class="billing-form" method="POST"
                action="../../../backend/controllers/payment.php">
                    <div class="billing">
                        <h3>Billing Information</h3>
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" name="full-name" value="<?= $_SESSION['full_name'] ?? '' ?>" required>
                        <small class="error"></small>

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?= $_SESSION['address'] ?? '' ?>" required>
                        <small class="error"></small>

                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?= $_SESSION['qyteti'] ?? '' ?>" required>
                        <small class="error"></small>

                        <label for="postal-code">Postal Code</label>
                        <input type="text" id="postal-code" name="postal-code" value="<?= $_SESSION['kodi_postar'] ?? '' ?>" required>
                        <small class="error"></small>
                    </div>
                    
                    <div class="billing">
                        <h3>Payment Details</h3>

                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" name="card-number" required>
                        <small class="error"></small>

                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" id="expiry-date" name="expiry-date" required>
                        <small class="error"></small>

                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" required>
                        <small class="error"></small>
                        </div>
                        <input type="hidden" name="order_id" value="<?= $order_id ?>">
                </form>
            </div>
            <div class="summary-info">
                <div>
                    <h3>Order Details</h3>
                        <?php foreach($orderDetails as $item): ?>
                            <div class="order-card">
                                <img height="100px" src="/agrokultura/backend/public/uploads/<?= $item['product_image'] ?>">
                                <div class="order-info">
                                    <h4><?= htmlspecialchars($item['product_name']) ?></h4>
                                    <p>Quantity: <?= $item['quantity'] ?></p>
                                    <p>Price: €<?= number_format($item['price'] * $item['quantity'], 2) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
                <div class="order-summary">
                    <h3>Order Summary</h3>
                    <div class="summary-item">
                        <span>Subtotal:</span>
                        <span>€<?= number_format($order['total'] - 5, 2) ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Shipping:</span>
                        <span>€5.00</span>
                    </div>
                    <div class="summary-item total">
                        <span>Total:</span>
                        <span>€<?= number_format($order['total'], 2) ?></span>
                    </div>
                    <button type="submit" form="bill-form" class="place-order-btn">Place Order</button>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>
    <script src="../../assets/js/hamburgerMenuToggler.js"></script>
    <!-- <script>
        const form = document.querySelector(".billing-form");

        form.addEventListener("submit", (e) => {
        e.preventDefault();
        let valid = true;

        const fields = form.querySelectorAll("input");

        fields.forEach(input => {
            clearError(input);

            // Required
            if (!input.value.trim()) {
            showError(input, "This field is required");
            valid = false;
            return;
            }

            // Card number (16 digits)
            if (input.id === "card-number" && !/^\d{16}$/.test(input.value)) {
            showError(input, "Card number must be 16 digits");
            valid = false;
            }

            // Expiry date (MM/YY)
            if (input.id === "expiry-date" && !/^(0[1-9]|1[0-2])\/\d{2}$/.test(input.value)) {
            showError(input, "Format must be MM/YY");
            valid = false;
            }

            // CVV (3 digits)
            if (input.id === "cvv" && !/^\d{3}$/.test(input.value)) {
            showError(input, "CVV must be 3 digits");
            valid = false;
            }
        });

        if (valid) {
            form.submit(); // or AJAX / fetch
        }
        });

        function showError(input, message) {
        input.classList.add("invalid");
        const error = input.nextElementSibling;
        error.textContent = message;
        error.style.display = "block";
        }

        function clearError(input) {
        input.classList.remove("invalid");
        const error = input.nextElementSibling;
        error.style.display = "none";
        }

    </script> -->
</body>
</html>