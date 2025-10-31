<?php
require 'conn.php'; // Ensure this contains your PDO connection

$sql = "SELECT date, COUNT(*) as count 
        FROM specialties 
        WHERE date >= CURDATE() - INTERVAL 6 DAY 
        GROUP BY date 
        ORDER BY date ASC";

$stmt = $pdo->query($sql);
$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = [
        'date' => $row['date'],
        'count' => (int) $row['count']
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
