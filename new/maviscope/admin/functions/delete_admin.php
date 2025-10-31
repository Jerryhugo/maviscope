<?php
require '../conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM users2 WHERE id = ?");
    if ($stmt->execute([$id])) {
        header("Location: ../all_users.php?success=User deleted successfully.");
        exit;
    } else {
        header("Location: ../all_users.php?error=Error deleting user.");
        exit;
    }
}
?>
