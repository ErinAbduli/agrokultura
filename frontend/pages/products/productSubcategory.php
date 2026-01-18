<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Subcategory - Agrokultura</title>
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
            <div class="sidebar">
                <div>
                    <h3>Filtro</h3>
                    <h4>Sipas Çmimit</h4>
                    <div class="filtro-sipas-cmimit">
                        <div class="cmimi-range">
                            <input type="number" id="cmimiMin" name="cmimiMin" placeholder="1">
                        </div>
                        <span class="sipas-cmimit-text">deri</span>
                        <div class="cmimi-range">
                            <input type="number" id="cmimiMax" name="cmimiMax" placeholder="1000">
                        </div>
                    </div>
                    <div class="sipas-cmimit-desc">Filtrimi mund të bëhet nga
                        1 Euro
                        deri në
                        11100 Euro</div>
                    <button class="apliko-filtro">Apliko</button>
                </div>
                <div class="sipas-prodhuesit">
                    <h4>Sipas Prodhuesit</h4>
                    <div class="prodhuesit">
                        <label>
                            <input type="checkbox" name="producers[]" value="dewalt"> DeWalt
                        </label>

                        <label>
                            <input type="checkbox" name="producers[]" value="makita"> Makita
                        </label>

                        <label>
                            <input type="checkbox" name="producers[]" value="milwaukee"> Milwaukee
                        </label>

                        <label>
                            <input type="checkbox" name="producers[]" value="stanley"> Stanley
                        </label>
                    </div>

                </div>
            </div>
            <div class="products">
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
                    <div class="product-card">
                        <img src="../../assets/images/snow-shovel.png" alt="Product Image" width="50px">
                        <div class="product-card-description">
                            <h3>Power Drill</h3>
                            <p class="producer">IngCo</p>
                            <p class="price">100 &euro;</p>
                            <button onclick="window.location.href = './product.php'" class="add-to-cart-btn">Shiko
                                Detajet</button>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../assets/images/bosch-saw.png" alt="Product Image" width="50px">
                        <div class="product-card-description">
                            <h3>Power Drill</h3>
                            <p class="producer">IngCo</p>
                            <p class="price">100 &euro;</p>
                            <button onclick="window.location.href = './product.php'" class="add-to-cart-btn">Shiko
                                Detajet</button>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="https://png.pngtree.com/png-vector/20250320/ourmid/pngtree-yellow-cordless-power-drill-isolated-on-transparent-background-png-image_15775261.png"
                            alt="Product Image" width="50px">
                        <div class="product-card-description">
                            <h3>Power Drill</h3>
                            <p class="producer">IngCo</p>
                            <p class="price">100 &euro;</p>
                            <button onclick="window.location.href = './product.php'" class="add-to-cart-btn">Shiko
                                Detajet</button>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../assets/images/snow-shovel.png" alt="Product Image" width="50px">
                        <div class="product-card-description">
                            <h3>Power Drill</h3>
                            <p class="producer">IngCo</p>
                            <p class="price">100 &euro;</p>
                            <button onclick="window.location.href = './product.php'" class="add-to-cart-btn">Shiko
                                Detajet</button>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../assets/images/bosch-saw.png" alt="Product Image" width="50px">
                        <div class="product-card-description">
                            <h3>Power Drill</h3>
                            <p class="producer">IngCo</p>
                            <p class="price">100 &euro;</p>
                            <button onclick="window.location.href = './product.php'" class="add-to-cart-btn">Shiko
                                Detajet</button>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="https://png.pngtree.com/png-vector/20250320/ourmid/pngtree-yellow-cordless-power-drill-isolated-on-transparent-background-png-image_15775261.png"
                            alt="Product Image" width="50px">
                        <div class="product-card-description">
                            <h3>Power Drill</h3>
                            <p class="producer">IngCo</p>
                            <p class="price">100 &euro;</p>
                            <button onclick="window.location.href = './product.php'" class="add-to-cart-btn">Shiko
                                Detajet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>
    <script src="../../assets/js/hamburgerMenuToggler.js"></script>
    <script src="../../assets/js/customOrderByDropdown.js"></script>
    <script src="../../assets/js/productSearchValidation.js"></script>
</body>

</html>