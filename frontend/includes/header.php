<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar">
        <div class="logo">
            <a href="/agrokultura/index.php"><img src="/agrokultura/frontend/assets/images/logo-2.png" width="120px" alt="logo" /></a>
        </div>

        <ul class="nav-links">
            <li><a href="/agrokultura/index.php" class="active">Ballina</a></li>

            <li class="dropdown">
                <a href="/agrokultura/frontend/pages/products/allProducts.php" id="produktet">Produktet <i class="bi bi-chevron-down" style="font-size: 1rem;"></i></a>
                <ul class="dropdown-menu">

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=1">Fara & Bime &nbsp;&nbsp;<i
                                class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=1">Fara Perimesh</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=2">Fara Frutash</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=3">Fara Lulesh</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=4">Fara Drithërash</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=5">Fidane / Bime</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=6">Fare Patatesh</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=2">Ushqim & Mbrojtje Bimore &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=7">Plehra Organike</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=8">Plehra NPK</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=9">Plehra të Lëngshme</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=10">Vitamina për Bimë</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=11">Pesticide</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=12">Herbicide</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=13">Fungicide</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=3">Ujitje &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=14">Sisteme Ujitjeje</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=15">Pikezim</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=16">Sisteme Spërkatëse</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=17">Tuba (PVC / HDPE)</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=18">Mjete Spërkatjeje</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=19">Pompa Uji</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=4">Mjete & Pajisje Kopshti &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=20">Mjete Dore</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=21">Mjete Elektrike</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=22">Vazo & Aksesore</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=23">Doreza & Lidhëse</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=5">Makineri & Pjesë &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=24">Makineri të Rënda</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=25">Pajisje Spërkatjeje</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=26">Pjesë Motori</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=27">Pjesë Hidraulike</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=28">Goma & Rrota</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=6">Kafshë & Produkte Veterinare &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=29">Ushqim për Shpendë</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=30">Ushqim për Bagëti</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=31">Ushqim për Kafshë Shtëpie</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=32">Vitamina & Suplemente</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=33">Produkte Veterinare</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=34">Pajisje për Kafshë</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=7">Furnizime Bujqësore & Ndërtim &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=35">Pajisje për Serra</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=36">Rrjeta & Mbulesa</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=37">Fletë Plastike</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=38">Gardhe & Rrethime</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=39">Enë Ruajtjeje</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=40">Veshje Sigurie</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=8">Vajra & Lubrifikantë &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=41">Vaj Motorri</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=42">Vaj Hidraulik</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=43">Lubrifikantë</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=44">Konteinerë Karburanti</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/agrokultura/frontend/pages/products/productCategory.php?id=9">Aksesorë, Bulona & Vida &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=45">Bulona</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=46">Vida</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=47">Dado</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=48">Rondela</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=49">Kushineta</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=50">Rripa</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=51">Filtra</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=52">Bateri</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=53">Llampa & Drita</a></li>
                            <li><a href="/agrokultura/frontend/pages/products/productSubcategory.php?id=54">Komponentë Elektrike</a></li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li><a href="/agrokultura/frontend/pages/aboutUs/mbiNe.php">Mbi Ne</a></li>
            <li><a href="/agrokultura/frontend/pages/contactUs/naKontaktoni.php">Na Kontaktoni</a></li>
        </ul>

        <div class="cart-section nav-links">
            <a href="/agrokultura/frontend/pages/cart/cart.php"><i class="bi bi-cart" style="font-size: 1.3rem;"></i></a>
            <ul class="nav-links">
                <?php if (isset($_SESSION['user_id'])):?>  
                    <a href="/agrokultura/frontend/pages/profile/profile.php"><i class="bi bi-person-circle" style="font-size: 1.3rem;"></i></a>
                <?php else: ?>
                    <a href="/agrokultura/frontend/pages/forms/login.php">Log in</a>
                <?php endif; ?>
                <?php if ((isset($_SESSION['role'])) && $_SESSION['role'] == 1):?>
                        <a href="/agrokultura/frontend/pages/admin/adminDashboard.php"><i class="bi bi-code-square" style="font-size: 1.3rem;"></i></a>
                <?php endif; ?>
            </ul>
        </div>

        <div class="hamburger-menu">
            <i class="bi-list" id="hamburger"></i>

            <nav class="mobile-menu" id="mobileMenu">
                <ul class="menu-items">
                    <li><a href="#" class="active">Ballina</a></li>
                    <li class="dropdown-h">
                        <a href="#" id="produktet-h">Produktet <i class="bi bi-chevron-down"></i></a>
                        <ul class="dropdown-menu-h">
                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=1">Fara & Bime &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Fara Perimesh</a></li>
                                    <li><a href="#">Fara Frutash</a></li>
                                    <li><a href="#">Fara Lulesh</a></li>
                                    <li><a href="#">Fara Drithërash</a></li>
                                    <li><a href="#">Fidane / Bime</a></li>
                                    <li><a href="#">Fare Patatesh</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=2">Ushqim & Mbrojtje Bimore &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Plehra Organike</a></li>
                                    <li><a href="#">Plehra NPK</a></li>
                                    <li><a href="#">Plehra të Lëngshme</a></li>
                                    <li><a href="#">Vitamina për Bimë</a></li>
                                    <li><a href="#">Pesticide</a></li>
                                    <li><a href="#">Herbicide</a></li>
                                    <li><a href="#">Fungicide</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=3">Ujitje &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Sisteme Ujitjeje</a></li>
                                    <li><a href="#">Pikezim</a></li>
                                    <li><a href="#">Sisteme Spërkatëse</a></li>
                                    <li><a href="#">Tuba (PVC / HDPE)</a></li>
                                    <li><a href="#">Mjete Spërkatjeje</a></li>
                                    <li><a href="#">Pompa Uji</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=4">Mjete & Pajisje Kopshti &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Mjete Dore</a></li>
                                    <li><a href="#">Mjete Elektrike</a></li>
                                    <li><a href="#">Vazo & Aksesore</a></li>
                                    <li><a href="#">Doreza & Lidhëse</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=5">Makineri & Pjesë &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Makineri të Rënda</a></li>
                                    <li><a href="#">Pajisje Spërkatjeje</a></li>
                                    <li><a href="#">Pjesë Motori</a></li>
                                    <li><a href="#">Pjesë Hidraulike</a></li>
                                    <li><a href="#">Goma & Rrota</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=6">Kafshë & Produkte Veterinare &nbsp;&nbsp;<i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Ushqim për Shpendë</a></li>
                                    <li><a href="#">Ushqim për Bagëti</a></li>
                                    <li><a href="#">Ushqim për Kafshë Shtëpie</a></li>
                                    <li><a href="#">Vitamina & Suplemente</a></li>
                                    <li><a href="#">Produkte Veterinare</a></li>
                                    <li><a href="#">Pajisje për Kafshë</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=7">Furnizime Bujqësore & Ndërtim &nbsp;&nbsp;<i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Pajisje për Serra</a></li>
                                    <li><a href="#">Rrjeta & Mbulesa</a></li>
                                    <li><a href="#">Fletë Plastike</a></li>
                                    <li><a href="#">Gardhe & Rrethime</a></li>
                                    <li><a href="#">Enë Ruajtjeje</a></li>
                                    <li><a href="#">Veshje Sigurie</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=8">Vajra & Lubrifikantë &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Vaj Motorri</a></li>
                                    <li><a href="#">Vaj Hidraulik</a></li>
                                    <li><a href="#">Lubrifikantë</a></li>
                                    <li><a href="#">Konteinerë Karburanti</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="../../frontend/pages/products/productCategory.php?id=9">Aksesorë, Bulona & Vida &nbsp;&nbsp;<i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Bulona</a></li>
                                    <li><a href="#">Vida</a></li>
                                    <li><a href="#">Dado</a></li>
                                    <li><a href="#">Rondela</a></li>
                                    <li><a href="#">Kushineta</a></li>
                                    <li><a href="#">Rripa</a></li>
                                    <li><a href="#">Filtra</a></li>
                                    <li><a href="#">Bateri</a></li>
                                    <li><a href="#">Llampa & Drita</a></li>
                                    <li><a href="#">Komponentë Elektrike</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li><a href="/agrokultura/frontend/pages/aboutUs/mbiNe.php">Mbi Ne</a></li>
                    <li><a href="/agrokultura/frontend/pages/contactUs/naKontaktoni.php">Na Kontaktoni</a></li>
                    <li><a href="/agrokultura/frontend/pages/cart/cart.php"><i class="bi bi-cart" style="font-size: 1.3rem;"></i> My
                            cart</a></li>
                    <li style="padding: 0px 20px; background-color: #22a561; width: 50px; border-radius: 10px;">
                        <?php if (isset($_SESSION['user_id'])):?>  
                            <a style="color: white;" href="/agrokultura/frontend/pages/profile/profile.php">Profile</a>
                        <?php else: ?>
                            <a style="color: white;" href="/agrokultura/frontend/pages/forms/login.php">Log in</a>
                        <?php endif; ?>
                    </li>
                    <li style="padding: 0px 20px; background-color: #22a561; width: 40%; border-radius: 10px;">
                        <?php if ((isset($_SESSION['user_id'])) && $_SESSION['role'] === 1):?>  
                            <a style="color: white;" href="/agrokultura/frontend/pages/admin/adminDashboard.php">Dashboard</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>