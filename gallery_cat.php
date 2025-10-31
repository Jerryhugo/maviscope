<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery category</title>

    <?php include "partials/header.php" ?>
    <!-- LightGallery CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" />



</head>

<body>

    <?php include "partials/navbar.php" ?>

    <h1 class="gallery-title px-4 my-3"><?= $_GET['cat']; ?> </h1>

    <div id="lightgallery" class="row mx-4">

        <?php
        include "admin/conn.php";
        try {


            // Prepare the SQL query
            $stmt = $pdo->prepare("SELECT * FROM gallery WHERE category = ?");

            // Bind the value (e.g., 'landscape')
            $category = $_GET['cat'];
            $stmt->execute([$category]);

            // Fetch all matching rows
            $images = $stmt->fetchAll();

            // Output results
            foreach ($images as $image) { ?>
                <a class="col-12 col-md-4 col-lg-3 m-0 p-0" href="img/gallery/<?= $image['img_name'] ?>"
                    data-lg-size="1600-2400">
                    <img class="w-100 h-100" alt="<?= $image['descriptions'] ?>" src="img/gallery/<?= $image['img_name'] ?>" />
                </a>
            <?php }

        } catch (\PDOException $e) {
            // Handle errors
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        ?>






    </div>






    <?php include "partials/footer.php" ?>

    <!-- LightGallery JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.min.js"></script>



    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgThumbnail],
            licenseKey: 'your_license_key',
            speed: 500,
            // ... other settings
        });
    </script>
</body>

</html>