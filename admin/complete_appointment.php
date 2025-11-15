<?php
require "conn.php";

$id = $_GET['id'];

// Fetch record
$stmt = $conn->prepare("SELECT * FROM online_appointments WHERE online_appointment_id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Insert into completed_appointments
$insert = $conn->prepare("
INSERT INTO completed_appointments
(firstname, lastname, email, phone, department, reason, appointment_id)
VALUES (?, ?, ?, ?, ?, ?, ?)
");

$insert->execute([
    $data['firstname'],
    $data['lastname'],
    $data['email'],
    $data['phone'],
    $data['department'],
    $data['reason'],
    $data['online_appointment_id']
]);

// Delete from online_appointment
$delete = $pdo->prepare("DELETE FROM online_appointments WHERE online_appointment_id = ?");
$delete->execute([$id]);

header("Location: online_appointments.php?completed=1");
exit;
