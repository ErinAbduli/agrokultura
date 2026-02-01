<?php
session_start();

$prevPage = $_SERVER['HTTP_REFERER'] ?? '../../../index.php';

if (isset($_SESSION['user_id'])) {
    header("Location: /agrokultura/index.php");
    exit;
}

require_once __DIR__ . '../../../../backend/config/Database.php';
require_once __DIR__ . '../../../../backend/models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($user->login($email, $password)) {
        header("Location: /agrokultura/index.php");
        exit;
    } else {
        $_SESSION['login_error'] = 'Email ose fjalëkalimi janë gabim ❌';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kyçu - Agrokultura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/Login.css" />
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">
</head>
<body>

<!-- Alert gabimi login -->
<?php if (!empty($_SESSION['login_error'])): ?>
    <script>
        alert("<?= $_SESSION['login_error'] ?>");
    </script>
<?php unset($_SESSION['login_error']); endif; ?>

<div class="wrapper">
    <a href="<?= htmlspecialchars($prevPage) ?>" class="back-btn"><i class="bi bi-chevron-left"></i>&nbsp; Back</a>
    <div class="login-box">
        <h2>Kyçu në llogarinë tënde</h2>
        <p class="subtitle">Kyçu përmes rrjeteve sociale</p>

        <div class="social-buttons">
            <button class="social facebook"><i class="bi bi-facebook"></i></button>
            <button class="social google"><i class="bi bi-google"></i></button>
            <button class="social apple"><i class="bi bi-apple"></i></button>
        </div>

        <div class="divider"><span>OSE</span></div>

        <form class="login-form" method="POST" novalidate>
            <div>
                <label for="email">Email</label>
                <input type="email" placeholder="Shkruaj email-in tënd" id="email" name="email" required>
                <div id="emailErrorMsg"></div>
            </div>
            <div>
                <label for="password">Fjalëkalimi</label>
                <input type="password" id="password" name="password" placeholder="Shkruaj fjalëkalimin-in tënd" required />
                <div id="passwordErrorMsg"></div>
            </div>
            <p class="forgot"><a href="">Keni harruar fjalëkalimin?</a></p>
            <button type="submit" class="sign-in">Kyçu</button>
            <p class="reg">Nuk keni llogari? <a href="./regjistrohu.php">Regjistrohu!</a></p>
        </form>
    </div>
</div>

<script src="../../assets/js/loginValidation.js"></script>
</body>
</html>
