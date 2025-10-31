<?php
require 'conn.php'; // Ensure this contains your PDO connection

$sql = "SELECT a.author_fullname, COUNT(ar.article_id) as article_count
        FROM author a
        LEFT JOIN article ar ON a.author_id = ar.id_author
        GROUP BY a.author_fullname";

$stmt = $pdo->query($sql);
$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = [
        'author' => $row['author_fullname'],
        'count' => (int) $row['article_count']
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
