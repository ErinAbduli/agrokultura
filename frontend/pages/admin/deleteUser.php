<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: /agrokultura/frontend/pages/forms/login.php");
    exit;
}

require_once __DIR__ . '/../../../backend/config/Database.php';

$db = new Database();
$connection = $db->getConnection();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: adminClients.php?error=user_not_found");
    exit;
}

$userId = $_GET['id'];

try {
    $checkQuery = "SELECT id, role FROM users WHERE id = :id";
    $checkStmt = $connection->prepare($checkQuery);
    $checkStmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $checkStmt->execute();
    $user = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: adminClients.php?error=user_not_found");
        exit;
    }

    if ($user['role'] == 1) {
        header("Location: adminClients.php?error=cannot_delete_admin");
        exit;
    }

    $connection->beginTransaction();

    $deleteAddressQuery = "DELETE FROM adresses WHERE user_id = :user_id";
    $deleteAddressStmt = $connection->prepare($deleteAddressQuery);
    $deleteAddressStmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $deleteAddressStmt->execute();

    $deleteCartQuery = "DELETE FROM cart WHERE user_id = :user_id";
    $deleteCartStmt = $connection->prepare($deleteCartQuery);
    $deleteCartStmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $deleteCartStmt->execute();

    $deleteUserQuery = "DELETE FROM users WHERE id = :id";
    $deleteUserStmt = $connection->prepare($deleteUserQuery);
    $deleteUserStmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $deleteUserStmt->execute();

    $connection->commit();

    header("Location: adminClients.php?success=user_deleted");
    exit;
} catch (PDOException $e) {
    $connection->rollBack();
    header("Location: adminClients.php?error=delete_failed");
    exit;
}
?>

