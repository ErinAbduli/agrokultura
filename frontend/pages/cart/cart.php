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
                <div class="cart-item">
                    <img src="../../assets/images/bosch-saw.png" alt="Product">

                    <div class="item-info">
                        <p class="brand">Bosch</p>
                        <h3>Bosch Saw</h3>
                        <p class="price">€120.00</p>
                    </div>

                    <div class="qty-control">
                        <button class="qty-btn decrease">−</button>
                        <input class="qty" type="number" value="1" min="1" max="100">
                        <button class="qty-btn increase">+</button>
                    </div>

                    <p class="item-total">€120.00</p>

                    <button class="remove-item">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="cart-item">
                    <img src="../../assets/images/bosch-saw.png" alt="Product">

                    <div class="item-info">
                        <p class="brand">Bosch</p>
                        <h3>Bosch Saw</h3>
                        <p class="price">€120.00</p>
                    </div>

                    <div class="qty-control">
                        <button class="qty-btn decrease">−</button>
                        <input class="qty" type="number" value="1" min="1" max="100">
                        <button class="qty-btn increase">+</button>
                    </div>

                    <p class="item-total">€120.00</p>

                    <button class="remove-item">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="cart-item">
                    <img src="../../assets/images/bosch-saw.png" alt="Product">

                    <div class="item-info">
                        <p class="brand">Bosch</p>
                        <h3>Bosch Saw</h3>
                        <p class="price">€120.00</p>
                    </div>

                    <div class="qty-control">
                        <button class="qty-btn decrease">−</button>
                        <input class="qty" type="number" value="1" min="1" max="100">
                        <button class="qty-btn increase">+</button>
                    </div>

                    <p class="item-total">€120.00</p>

                    <button class="remove-item">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>

            </section>

            <aside class="cart-summary">
                <h3>Përmbledhje</h3>

                <div class="summary-row">
                    <span>Nëntotali</span>
                    <span>€120.00</span>
                </div>

                <div class="summary-row">
                    <span>Transport</span>
                    <span>€5.00</span>
                </div>

                <div class="summary-row total">
                    <span>Totali</span>
                    <span>€125.00</span>
                </div>

                <button class="checkout-btn">Vazhdo në Pagesë</button>
            </aside>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>

    <script src="../../assets/js/hamburgerMenuToggler.js"></script>
    <script src="../../assets/js/cartControlQty.js"></script>
</body>

</html>