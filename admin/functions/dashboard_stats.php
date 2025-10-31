<?php
require './conn.php';

// Total Appointments
$totalAppointments = $pdo->query("SELECT COUNT(*) FROM specialties")->fetchColumn();

// Completed Appointments
$completedAppointments = $pdo->query("SELECT COUNT(*) FROM completed_appointments")->fetchColumn();

// Appointments Today
$stmt = $pdo->prepare("SELECT COUNT(*) FROM specialties WHERE date = CURDATE()");
$stmt->execute();
$todaysAppointments = $stmt->fetchColumn();

// Pending = total - completed
$pendingAppointments = $totalAppointments - $completedAppointments;

// Total Articles
$totalArticles = $pdo->query("SELECT COUNT(*) FROM article")->fetchColumn();

// Total Authors
$totalAuthors = $pdo->query("SELECT COUNT(*) FROM author")->fetchColumn();

// Total Gallery Images
$totalImages = $pdo->query("SELECT COUNT(*) FROM gallery")->fetchColumn();

// Total Gallery Categories
$totalCategories = $pdo->query("SELECT COUNT(*) FROM gallery_category")->fetchColumn();

// Output JSON
 json_encode([
    "totalAppointments" => $totalAppointments,
    "completedAppointments" => $completedAppointments,
    "pendingAppointments" => $pendingAppointments,
    "todaysAppointments" => $todaysAppointments,
    "totalArticles" => $totalArticles,
    "totalAuthors" => $totalAuthors,
    "totalImages" => $totalImages,
    "totalCategories" => $totalCategories
]);
?>
