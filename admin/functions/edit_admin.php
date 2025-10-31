<?php
require '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    $stmt = $pdo->prepare("UPDATE users2 SET username = ?, email = ? WHERE id = ?");
    if ($stmt->execute([$username, $email, $id])) {
        header("Location: ../all_users.php?success=User updated successfully.");
        exit;
    } else {
        header("Location: ../all_users.php?error=Error updating user.");
        exit;
    }
}
?>
