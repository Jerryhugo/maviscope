<?php 

include "image_resizer.php";
include "../conn.php";

if (isset($_POST['upload'])) {
    $event_state = 1 ;
    $event_description = ""; // array of descriptions
    $uploadDir = "../../img/gallery/";

    // Make sure your gallery table has a `description` column
    // ALTER TABLE gallery ADD description TEXT;

    $stmt = $pdo->prepare("INSERT INTO events (event_img, event_description, event_state) VALUES (:event_img, :event_description, :event_state)");

 if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tempPath = $_FILES['image']['tmp_name'];
    $fileName = time() . "_" . uniqid() . "_" . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;

    if (resizeImage($tempPath, $targetPath, 1024, 768)) {
        $stmt->execute([
            ':event_img' => $fileName,
            ':event_description' => $event_description,
            ':event_state' => $event_state
        ]);
    }
}


    header("location: ../view_events.php");
    exit;
}
