<?php
require "conn.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM online_appointments WHERE online_appointment_id = ?");
$stmt->execute([$id]);

header("Location: online_appointments.php?deleted=1");
exit;
