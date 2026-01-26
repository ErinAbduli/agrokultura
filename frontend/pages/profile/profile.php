<!DOCTYPE html>
<html lang="sq">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profili - Agrokultura</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/profile.css">
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
    <?php include '../../includes/header.php' ?>

    <div class="profile-page">
        <div class="profile-hero">
            <div>
                <h1>Profili im</h1>
                <p>Menaxho të dhënat dhe qasjen në llogarinë tënde.</p>
            </div>

            <div class="profile-badge">
                <i class="bi bi-person-circle"></i>
                <div class="badge-text">
                    <span class="name">Emri Mbiemri</span>
                    <span class="email">email@shembull.com</span>
                </div>
            </div>
        </div>

        <div class="profile-grid">
            <section class="profile-card">
                <h2><i class="bi bi-card-list"></i> Të dhënat personale</h2>

                <div class="profile-fields">
                    <div class="profile-field">
                        <span class="label">Emri i plotë</span>
                        <span class="value">Emri Mbiemri</span>
                    </div>

                    <div class="profile-field">
                        <span class="label">Email</span>
                        <span class="value">email@shembull.com</span>
                    </div>

                    <div class="profile-field">
                        <span class="label">Telefon</span>
                        <span class="value">+383 44 000 000</span>
                    </div>

                    <div class="profile-field">
                        <span class="label">Qyteti</span>
                        <span class="value">Prishtinë</span>
                    </div>

                    <div class="profile-field" style="grid-column: 1 / -1;">
                        <span class="label">Adresa</span>
                        <span class="value">Rr. Shembull, Nr. 10, Hyrja A</span>
                    </div>

                    <div class="profile-field">
                        <span class="label">Kodi postar</span>
                        <span class="value">10000</span>
                    </div>
                </div>
            </section>

            <aside class="profile-card">
                <h2><i class="bi bi-lightning-charge"></i> Veprime</h2>

                <div class="profile-actions">
                    <a class="primary" href="/agrokultura/frontend/pages/products/productCategory.php">
                        <i class="bi bi-bag"></i> Shfleto Produktet
                    </a>
                    <a href="/agrokultura/frontend/pages/cart/cart.php">
                        <i class="bi bi-cart"></i> Shporta ime
                    </a>
                    <a href="/agrokultura/frontend/pages/contactUs/naKontaktoni.php">
                        <i class="bi bi-headset"></i> Mbështetje
                    </a>
                    <button type="button" class="danger">
                        <i class="bi bi-box-arrow-right"></i> Dil
                    </button>
                </div>
            </aside>
        </div>
    </div>

    <?php include '../../includes/footer.php' ?>
    <script src="../../assets/js/hamburgerMenuToggler.js"></script>
</body>

</html>