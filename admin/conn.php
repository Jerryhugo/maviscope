<?php
$host = 'localhost';       // Your database host (could be an IP or domain)
$dbname = 'maviscope';  // Your database name
$username = 'root';// Your database username
$password = '';// Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set error mode to exceptions to catch issues easily
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set fetch mode to associative array by default
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Optional: If you want persistent connection (usually for performance reasons)
    // $pdo->setAttribute(PDO::ATTR_PERSISTENT, true);



} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
