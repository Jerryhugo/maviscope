<?php
require 'conn.php'; // Ensure this contains your PDO connection

$sql = "SELECT department, COUNT(*) as count 
        FROM specialties 
        GROUP BY department";

$stmt = $pdo->query($sql);
$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = [
        'department' => $row['department'],
        'count' => (int) $row['count']
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
