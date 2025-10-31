<?php
require 'conn.php'; // Ensure this contains your PDO connection

$sql = "SELECT gc.category_name, COUNT(g.id) as image_count
        FROM gallery_category gc
        LEFT JOIN gallery g ON g.category = gc.id
        GROUP BY gc.category_name";

$stmt = $pdo->query($sql);
$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = [
        'category' => $row['category_name'],
        'count' => (int) $row['image_count']
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
