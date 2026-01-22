<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientet - Agrokultura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/adminPages.css" />
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>

<body>
    <div class="sidebar">
        <a href="../../../index.php">
            <img src="../../assets/images/logo-white.png" width="140px" alt="">
        </a>
        <ul>
            <a href="./adminDashboard.php">
                <li><i class="bi bi-clipboard-check"></i> &nbsp;Dashboard</li>
            </a>
            <a href="./adminProducts.php">
                <li><i class="bi bi-box2"></i> &nbsp;Produktet</li>
            </a>
            <a href="./adminOrders.php">
                <li><i class="bi bi-truck"></i> &nbsp;Porositë</li>
            </a>
            <a href="">
                <li class="active"><i class="bi bi-person"></i> &nbsp;Klientët</li>
            </a>
            <a href="">
                <li><i class="bi bi-graph-up"></i> &nbsp;Analitikat</li>
            </a>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <div>
                <h1>Klientët</h1>
                <p>Pershendetje, Erin Abduli</p>
            </div>
        </div>
        <div class="search-bar">
            <div class="bar">
                <input type="text" id="search" class="search" name="search" placeholder="Kerko Produkte...">
                <button><i class="bi bi-search" style="color: white;"></i></button>
            </div>
            <div class="add-product">
                <button>Shto <i class="bi bi-plus-lg"></i></button>
            </div>
        </div>
        <div class="product-table">
            <table class="product-table-box">
                <tr>
                    <th>ID Klientit</th>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Numri</th>
                    <th>Data e Regjistrimit</th>
                    <th>Total Porosi</th>
                    <th>Ndrysho</th>
                </tr>
                <tr>
                    <td>#3011</td>
                    <td>Ardit Kola</td>
                    <td>ardit.kola@example.com</td>
                    <td>+355 68 456 7890</td>
                    <td>12/05/2024</td>
                    <td>14</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#3012</td>
                    <td>Sara Dervishi</td>
                    <td>sara.dervishi@example.com</td>
                    <td>+355 69 222 3344</td>
                    <td>03/06/2024</td>
                    <td>9</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#3013</td>
                    <td>Erion Metaj</td>
                    <td>erion.metaj@example.com</td>
                    <td>+355 67 111 7788</td>
                    <td>22/06/2024</td>
                    <td>3</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#3014</td>
                    <td>Lira Gjoni</td>
                    <td>lira.gjoni@example.com</td>
                    <td>+355 69 889 4412</td>
                    <td>10/07/2024</td>
                    <td>18</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#3015</td>
                    <td>Agon Selimi</td>
                    <td>agon.selimi@example.com</td>
                    <td>+355 68 778 9900</td>
                    <td>25/07/2024</td>
                    <td>6</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#3016</td>
                    <td>Mira Basha</td>
                    <td>mira.basha@example.com</td>
                    <td>+355 67 555 1122</td>
                    <td>01/08/2024</td>
                    <td>2</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#3011</td>
                    <td>Ardit Kola</td>
                    <td>ardit.kola@example.com</td>
                    <td>+355 68 456 7890</td>
                    <td>12/05/2024</td>
                    <td>14</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#3012</td>
                    <td>Sara Dervishi</td>
                    <td>sara.dervishi@example.com</td>
                    <td>+355 69 222 3344</td>
                    <td>03/06/2024</td>
                    <td>9</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#3013</td>
                    <td>Erion Metaj</td>
                    <td>erion.metaj@example.com</td>
                    <td>+355 67 111 7788</td>
                    <td>22/06/2024</td>
                    <td>3</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color:white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color:white;"></i></button>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</body>

</html>