<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porositë - Agrokultura</title>
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
            <a href="">
                <li class="active"><i class="bi bi-truck"></i> &nbsp;Porositë</li>
            </a>
            <a href="./adminClients.php">
                <li><i class="bi bi-person"></i> &nbsp;Klientët</li>
            </a>
            <a href="">
                <li><i class="bi bi-graph-up"></i> &nbsp;Analitikat</li>
            </a>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <div>
                <h1>Porositë</h1>
                <p>Pershendetje, Erin Abduli</p>
            </div>
        </div>
        <div class="search-bar">
            <div class="bar">
                <input type="text" id="search" class="search" name="search" placeholder="Kerko Pororsi...">
                <button><i class="bi bi-search" style="color: white;"></i></button>
            </div>
        </div>
        <div class="product-table">
            <table class="product-table-box">
                <tr>
                    <th>ID Porosisë</th>
                    <th>Porositur Nga</th>
                    <th>Statusi</th>
                    <th>Data</th>
                    <th>Totali</th>
                    <th>Ndrysho</th>
                </tr>
                <tr>
                    <td>#1023</td>
                    <td>Ardit Kola</td>
                    <td>Ne Proces</td>
                    <td>03/12/2025</td>
                    <td>120€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1024</td>
                    <td>Sara Dervishi</td>
                    <td>Dërguar</td>
                    <td>02/12/2025</td>
                    <td>90€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1025</td>
                    <td>Erind Hysaj</td>
                    <td>Përfunduar</td>
                    <td>01/12/2025</td>
                    <td>45€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1026</td>
                    <td>Mira Basha</td>
                    <td>Anuluar</td>
                    <td>28/11/2025</td>
                    <td>38€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1027</td>
                    <td>Agon Selimi</td>
                    <td>Ne Proces</td>
                    <td>26/11/2025</td>
                    <td>78€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1028</td>
                    <td>Lira Gjoni</td>
                    <td>Dërguar</td>
                    <td>24/11/2025</td>
                    <td>150€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1023</td>
                    <td>Ardit Kola</td>
                    <td>Ne Proces</td>
                    <td>03/12/2025</td>
                    <td>120€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1024</td>
                    <td>Sara Dervishi</td>
                    <td>Dërguar</td>
                    <td>02/12/2025</td>
                    <td>90€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1025</td>
                    <td>Erind Hysaj</td>
                    <td>Përfunduar</td>
                    <td>01/12/2025</td>
                    <td>45€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1026</td>
                    <td>Mira Basha</td>
                    <td>Anuluar</td>
                    <td>28/11/2025</td>
                    <td>38€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1027</td>
                    <td>Agon Selimi</td>
                    <td>Ne Proces</td>
                    <td>26/11/2025</td>
                    <td>78€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1023</td>
                    <td>Ardit Kola</td>
                    <td>Ne Proces</td>
                    <td>03/12/2025</td>
                    <td>120€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1024</td>
                    <td>Sara Dervishi</td>
                    <td>Dërguar</td>
                    <td>02/12/2025</td>
                    <td>90€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1025</td>
                    <td>Erind Hysaj</td>
                    <td>Përfunduar</td>
                    <td>01/12/2025</td>
                    <td>45€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1026</td>
                    <td>Mira Basha</td>
                    <td>Anuluar</td>
                    <td>28/11/2025</td>
                    <td>38€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>#1027</td>
                    <td>Agon Selimi</td>
                    <td>Ne Proces</td>
                    <td>26/11/2025</td>
                    <td>78€</td>
                    <td class="action-btns">
                        <button class="btn-1"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                        <button class="btn-2"><i class="bi bi-trash-fill" style="color: white;"></i></button>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</body>

</html>