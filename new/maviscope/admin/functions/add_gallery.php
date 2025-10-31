<?php 

include "image_resizer.php";
include "../conn.php";

if (isset($_POST['upload'])) {
    $category = $_POST['category'];
    $uploadDir = "../../img/gallery/";

    $stmt = $pdo->prepare("INSERT INTO gallery (img_name, category) VALUES (:img_name, :category)");

    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $tempPath = $_FILES['images']['tmp_name'][$key];
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetPath = $uploadDir . $fileName;

        if (resizeImage($tempPath, $targetPath, 1024, 768)) {
            $stmt->execute([
                ':img_name' => $fileName,
                ':category' => $category
            ]);
        }
    }

    header("location: ../all_images.php");

    // echo "Images uploaded successfully.";
}