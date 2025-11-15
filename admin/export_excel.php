<?php
require "conn.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=online_appointments.xls");

$stmt = $pdo->prepare("SELECT * FROM online_appointments ORDER BY online_appointment_id DESC");
$stmt->execute();

echo "Online ID\tTicket ID\tFirstname\tLastname\tPhone\tEmail\tDepartment\tChildren\tReason\n";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['online_appointment_id']}\t{$row['ticket_id']}\t{$row['firstname']}\t{$row['lastname']}\t{$row['phone']}\t{$row['email']}\t{$row['department']}\t{$row['children']}\t{$row['reason']}\n";
} 
