<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/models/User.php';
require_once __DIR__ . '/../../../backend/config/Database.php';
$db = new Database();
$connection = $db->getConnection();
$userId = $_POST['user_id'];
$userModel = new User($connection);
$user = $userModel->getById($userId);



if ($user['role'] == 1 && $_POST['user_id'] != $_SESSION['user_id']) {
    header("Location: /agrokultura/frontend/pages/admin/adminClients.php?error=cannot_edit_admin");
    exit;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {

    if ($user) {
        $fullName = $user['full_name'];
        $email = $user['email'];
        $phone = $user['phone'];
        $role = $user['role'];
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Clients - Agrokultura</title>
    <link rel="stylesheet" href="../../assets/css/editProducts.css" />
<body>
    <div class="editForm">
        <h2>Edit Clients</h2>
        <form id="editForm" method="POST" action="../../../backend/controllers/editClient.php">
            <input type="hidden" id="editUserId" name="user_id" value="<?= $userId ?>" />
            <label for="editName">Emri:</label>
            <input type="text" id="editName" name="name" value="<?= $fullName ?>" required />

            <label for="editEmail">Email:</label>
            <textarea id="editEmail" name="email" required><?= $email ?></textarea>

            <label for="editPhone">Phone:</label>
            <input type="text" id="editPhone" name="phone" value="<?= $phone ?>" required />

            <label for="editRole">Role:</label>
            <select name="role" id="editRole" <?php if ($_POST['user_id'] == $_SESSION['user_id']) echo 'disabled'; ?>>
                <option value="1" <?= $role == 1 ? 'selected' : '' ?>>Administrator</option>
                <option value="0" <?= $role == 0 ? 'selected' : '' ?>>Klient</option>
            </select>

            <div class="form-buttons">
                <button type="submit" class="btn-submit">Save Changes</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='../admin/adminClients.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>