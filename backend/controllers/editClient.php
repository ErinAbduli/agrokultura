<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../backend/models/User.php';
require_once __DIR__ . '/../../backend/config/Database.php';
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
    $query = "UPDATE users 
              SET full_name = :full_name, email = :email, phone = :phone, role = :role 
              WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':full_name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':phone', $_POST['phone']);
    $stmt->bindParam(':role', $_POST['role'], PDO::PARAM_INT);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: /agrokultura/frontend/pages/admin/adminClients.php");
        exit;
    }else {
        echo "Error updating user.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>