<?php 

include "image_resizer.php";
include "../conn.php";

if (isset($_POST['upload'])) {
    $category = $_POST['category'];
    $descriptions = $_POST['descriptions']; // array of descriptions
    $uploadDir = "../../img/gallery/";

    // Make sure your gallery table has a `description` column
    // ALTER TABLE gallery ADD description TEXT;

    $stmt = $pdo->prepare("INSERT INTO gallery (img_name, category, descriptions) VALUES (:img_name, :category, :description)");

    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $tempPath = $_FILES['images']['tmp_name'][$key];
        $fileName = time() . "_" . uniqid() . "_" . basename($_FILES['images']['name'][$key]);
        $targetPath = $uploadDir . $fileName;

        if (resizeImage($tempPath, $targetPath, 1024, 768)) {
            $stmt->execute([
                ':img_name' => $fileName,
                ':category' => $category,
                ':description' => $descriptions[$key] ?? ''
            ]);
        }
    } 

    header("location: ../all_images.php");
    exit;
}
