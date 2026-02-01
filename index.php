<?php
require_once __DIR__ . '/backend/config/database.php';
require_once __DIR__ . '/backend/models/Product.php';

$database = new Database();
$db = $database->getConnection();
$productModel = new Product($db);

$faraMolle = $productModel->getById(3);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./frontend/assets/css/index.css" />
    <link rel="icon" type="image/x-icon" href="./frontend/assets/images/favicon.ico">
    <title>Ballina - Agrokultura</title>
</head>

<body>
    <?php include './frontend/includes/header.php' ?>
    <div class="main">
        <div class="hero">
            <div class="hero-text">
                <h1 class="hero-title">Ëndërroje. Ndërtoje.</h1>
                <p class="hero-desc">Gjithçka që të duhet për projektin tënd të radhës.</p>
                <button onclick="window.location.href = './frontend/pages/products/allProducts.php'"
                    class="hero-btn">Blej Tani</button>
            </div>
        </div>
        <div class="features">
            <div class="feature-item">
                <i class="bi bi-truck" style="font-size: 2.9rem; color: #22a561;"></i>
                <div class="feature-text">
                    <h4>Transport Falas</h4>
                    <p>Ne ofrojmë transport falas për të gjitha porositë mbi 50 Euro.</p>
                </div>
            </div>
            <div class="feature-item">
                <i class="bi bi-shield-check" style="font-size: 2.9rem; color: #22a561;"></i>
                <div class="feature-text">
                    <h4>Garancion Premium</h4>
                    <p>Kualitet i lartë dhe besueshmëri për çdo produkt.</p>
                </div>
            </div>
            <div class="feature-item">
                <i class="bi bi-box-seam" style="font-size: 2.9rem; color: #22a561;"></i>
                <div class="feature-text">
                    <h4>Kthime të Lehta</h4>
                    <p>Proces i thjeshtë dhe i shpejtë për kthimin e produkteve.</p>
                </div>
            </div>
            <div class="feature-item">
                <i class="bi bi-headset" style="font-size: 2.9rem; color: #22a561;"></i>
                <div class="feature-text">
                    <h4>24/7 Mbështetje</h4>
                    <p>Jemi gjithmonë këtu për të ndihmuar me çdo pyetje ose problem.</p>
                </div>
            </div>
        </div>
        <div class="categories">
            <h2>Kategori të Njohura</h2>
            <div class="categories-cards-container">
                <div class="categories-cards">
                    <div class="category-card">
                        <div class="categories-img-wrapper">
                            <img src="./frontend/assets/images/electrical.jpg" alt="Elektrike">
                            <button onclick="window.location.href = './frontend/pages/products/productCategory.php?id=1'"
                                class="hover-btn">Shiko më Shumë <i class="bi bi-chevron-right"></i></button>
                        </div>
                        <p>Fara & Bimë</p>
                    </div>
                    <div class="category-card">
                        <div class="categories-img-wrapper">
                            <img src="./frontend/assets/images/power-tools.jpg" alt="Mjete Pune">
                            <button class="hover-btn"
                                onclick="window.location.href = './frontend/pages/products/productCategory.php?id=5'">Shiko
                                më Shumë
                                <i class="bi bi-chevron-right"></i></button>
                        </div>
                        <p>Makineri & Pjesë</p>
                    </div>
                    <div class="category-card">
                        <div class="categories-img-wrapper">
                            <img src="./frontend/assets/images/color.png" alt="Ngjyra">
                            <button onclick="window.location.href = './frontend/pages/products/productCategory.php?id=7'"
                                class="hover-btn">Shiko më Shumë <i class="bi bi-chevron-right"></i></button>
                        </div>
                        <p>Vajra & Lubrifikantë</p>
                    </div>
                    <div class="category-card">
                        <div class="categories-img-wrapper">
                            <img src="./frontend/assets/images/gypa.png" alt="">
                            <button onclick="window.location.href = './frontend/pages/products/productCategory.php?id=6'"
                                class="hover-btn">Shiko më Shumë <i class="bi bi-chevron-right"></i></button>
                        </div>
                        <p>Furnizime Bujqësore & Ndërtim</p>
                    </div>
                    <div class="category-card">
                        <div class="categories-img-wrapper">
                            <img src="./frontend/assets/images/hidraulik.jpg" alt="">
                            <button onclick="window.location.href = './frontend/pages/products/productCategory.php?id=3'"
                                class="hover-btn">Shiko më Shumë <i class="bi bi-chevron-right"></i></button>
                        </div>
                        <p>Ujitje</p>
                    </div>
                    <div class="category-card">
                        <div class="categories-img-wrapper">
                            <img src="./frontend/assets/images/kopesht.png" alt="">
                            <button onclick="window.location.href = './frontend/pages/products/productCategory.php?id=4'"
                                class="hover-btn">Shiko më Shumë <i class="bi bi-chevron-right"></i></button>
                        </div>
                        <p>Mjete & Pajisje Kopshti</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-slider">
            <h2>Partnerët Tanë</h2>
            <div class="logo-track">
                <img src="./frontend/assets/images/bosch.png" alt="Bosch" />
                <img src="./frontend/assets/images/dewalt.png" alt="DeWalt" />
                <img src="./frontend/assets/images/ingco.png" alt="IngCo" />
                <img src="./frontend/assets/images/milwaukee.png" alt="Milwaukee" />
                <img src="./frontend/assets/images/wurth.svg" alt="Wurth" />
                <img src="./frontend/assets/images/makita.png" alt="Makita" />
                <img src="./frontend/assets/images/hilti.svg" alt="Node.js" />
                <img src="./frontend/assets/images/parkside.png" alt="Parkside" />
            </div>
        </div>
        <div class="deals">
            <h2>Ofertat Javore</h2>
            <div class="deals-container">
                <div class="deals-card">
                    <div class="deals-img-box">
                        <img src="./backend/public/uploads/<?= $faraMolle['image'] ?>"
                            alt="IngCo Drill" class="mouse" width="50px">
                    </div>
                    <div class="deals-info">
                        <h3><?= $faraMolle['name'] ?></h3>
                        <h2 class="deals-price"><small class="discount-price"> <?= $faraMolle['price'] * 1.2 ?> </small><?= $faraMolle['price'] ?> €</h2>
                        <a href="./frontend/pages/products/product.html" class="deals-buy">Blej Tani</a>
                    </div>
                </div>
                <div class="deals-card">
                    <div class="deals-img-box">
                        <img src="./frontend/assets/images/snow-shovel.png" alt="Snow Shovel" class="mouse"
                            width="100px">
                    </div>
                    <div class="deals-info">
                        <h3>Lopatë Bore</h3>
                        <h2 class="deals-price"><small class="discount-price">15.99</small> 9.<small>99</small> €</h2>
                        <a href="./frontend/pages/products/product.html" class="deals-buy">Blej Tani</a>
                    </div>
                </div>
                <div class="deals-card">
                    <div class="deals-img-box">
                        <img src="https://www.bosch-professional.com/za/en/ocsmedia/304054-54/application-image/1434x828/hand-held-circular-saw-gks-140-06016b30k1.png"
                            alt="mouse corsair" class="bosch-saw" width="100px">
                    </div>
                    <div class="deals-info">
                        <h3>Bosch GKS-140 Turbo</h3>
                        <h2 class="deals-price"><small class="discount-price">155.99</small> 99.<small>98</small> €</h2>
                        <a href="./frontend/pages/products/product.html" class="deals-buy">Blej Tani</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq">
            <h2>Pyetje të Bëra Shpesh</h2>
            <div class="faq-section">
                <div class="faq-item-wrapper">
                    <div class="faq-summary">Cila është politika juaj e kthimit? <span class="icon">+</span></div>
                    <div class="faq-content">
                        <p>Ne pranojmë kthime brenda 30 ditëve nga blerja. Produktet duhet të jenë në gjendjen e tyre
                            origjinale. Për më shumë informata klikoni <a
                                href="./frontend/assets/html/refundPolicy.html"
                                style="text-decoration: none; color: #22a561;">këtu.</a>
                        </p>
                    </div>
                </div>

                <div class="faq-item-wrapper">
                    <div class="faq-summary">Sa kohë zgjat dërgesa? <span class="icon">+</span></div>
                    <div class="faq-content">
                        <p>Dërgesa zakonisht zgjat 5–7 ditë pune, varësisht nga lokacioni juaj.</p>
                    </div>
                </div>

                <div class="faq-item-wrapper">
                    <div class="faq-summary">A ofroni dërgesa ndërkombëtare? <span class="icon">+</span></div>
                    <div class="faq-content">
                        <p>Po, ne dërgojmë edhe ndërkombëtarisht. Tarifat dhe koha e dorëzimit ndryshojnë sipas shtetit.
                        </p>
                    </div>
                </div>

                <div class="faq-item-wrapper">
                    <div class="faq-summary">Si mund të kontaktoj mbështetjen e klientit? <span class="icon">+</span>
                    </div>
                    <div class="faq-content">
                        <p>Mund të na kontaktoni përmes email-it në support@agrokultura.com ose të na telefononi në
                            (123)
                            456-7890.</p>
                    </div>
                </div>
                <div class="faq-item-wrapper">
                    <div class="faq-summary">Çfarë mënyrash pagesash pranoni? <span class="icon">+</span></div>
                    <div class="faq-content">
                        <p> Ne ofrojmë një gamë të gjerë mënyrash pagesash për të përshtatur nevojat e klientëve tanë,
                            duke përfshirë kartat e kreditit dhe debitit, pagesën në dorëzim, dhe transferet bankare. Të
                            gjitha transaksionet kryhen përmes sistemeve të enkriptuara dhe të sigurta, në mënyrë që të
                            dhënat tuaja të jenë të mbrojtura nga çdo përdorim i paautorizuar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './frontend/includes/footer.php' ?>
    <script src="./frontend/assets/js/slider.js"></script>
    <script src="./frontend/assets/js/faq.js"></script>
    <script src="./frontend/assets/js/hamburgerMenuToggler.js"></script>
</body>

</html>