<?php 

include "image_resizer.php";
include 'conn.php';

function updateGalleryCat(){
    include 'conn.php';
    $id = intval($_POST['cat-id']);
    $category = $_POST['category'];
    $uploadDir = "../../img/gallery/";

  

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['image']['tmp_name'];
        $originalName = basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        $uniqueName = $originalName;
        $targetPath = $uploadDir;

        $check = getimagesize($tmpName);
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if ($check === false || !in_array($imageFileType, $allowedTypes)) {
            die("Invalid image file.");
        }

        // Check if the file already exists
        if (file_exists($targetPath)) {
            // Don't move or overwrite the file
            echo "Image already exists. Skipping upload.<br>";

            // Update DB with existing filename
            $stmt = $pdo->prepare("UPDATE gallery_category SET category_image = :img_name, category_name = :category WHERE id = :id");
            $stmt->execute([
                ':img_name' => $uniqueName,
                ':category' => $category,
                ':id' => $id
            ]);

        header("location: view_img_category.php");

        } else {
            // Move and resize image
            if (resizeImage($tmpName, $targetPath, 1024, 768)) {
                $stmt = $pdo->prepare("UPDATE gallery_category SET category_image = :img_name, category_name = :category WHERE id = :id");
                $stmt->execute([
                    ':img_name' => $uniqueName,
                    ':category' => $category,
                    ':id' => $id
                ]);

         header("location: view_img_category.php");

            } else {
                die("Failed to resize or upload image.");
            }
        }
    } else {
        // No image uploaded, update only category
        $stmt = $pdo->prepare("UPDATE gallery_category SET category_name = :category WHERE id = :id");
        $stmt->execute([
            ':category' => $category,
            ':id' => $id
        ]);

        header("location: view_img_category.php");

    }



}


if (isset($_POST['id'])) {
     $id = $_POST['id'];
     echo $id;

     header("location: all_images.php");
   
    // $stmt = $pdo->prepare("DELETE * FROM gallery_category WHERE id = ?");
    // $stmt->bind_param("i", $id);

    // if ($stmt->execute()) {
    //     echo "success";
    // } else {
    //     http_response_code(500);
    //     echo "error";
    // }

    // $stmt->close();
    // $pdo->close();
}