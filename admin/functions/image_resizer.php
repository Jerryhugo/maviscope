<?php 



function resizeImage($sourcePath, $destPath, $maxWidth, $maxHeight) {
    list($width, $height, $type) = getimagesize($sourcePath);

    $ratio = $width / $height;

    if ($maxWidth / $maxHeight > $ratio) {
        $newWidth = $maxHeight * $ratio;
        $newHeight = $maxHeight;
    } else {
        $newHeight = $maxWidth / $ratio;
        $newWidth = $maxWidth;
    }

    $image_p = imagecreatetruecolor($newWidth, $newHeight);

    switch ($type) {
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($sourcePath);
            break;
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($sourcePath);
            break;
        case IMAGETYPE_GIF:
            $image = imagecreatefromgif($sourcePath);
            break;
        default:
            return false;
    }

    imagecopyresampled($image_p, $image, 0, 0, 0, 0, 
                       $newWidth, $newHeight, $width, $height);

    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($image_p, $destPath, 85); // 85% quality
            break;
        case IMAGETYPE_PNG:
            imagepng($image_p, $destPath, 6); // compression level 0-9
            break;
        case IMAGETYPE_GIF:
            imagegif($image_p, $destPath);
            break;
    }

    return true;
}
