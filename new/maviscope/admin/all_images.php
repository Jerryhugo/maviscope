<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

require "conn.php";
$stmt = $pdo->prepare("SELECT * FROM gallery");
$stmt->execute();
$images = $stmt->fetchAll();



if (isset($_POST['image_id'])) {
    $id = intval($_POST['image_id']);

    $stmt = $pdo->prepare("DELETE FROM gallery WHERE id = ?");
    
    if ($stmt->execute([$id])) {
        
    } else {
        http_response_code(500);
        echo "error";
    }

    $stmt = null;
    $pdo = null;
}
?>



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Categories</title>

    <!-- JS TextEditor -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>



    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- sweet alert template -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- sweetalert js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</head>


<body id="page-top">

    <div id="wrapper">

        <?php include "partials/sidebar.php" ?>

        <main id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
            <?php include "partials/nav.php"; ?>
            <!-- End of Topbar -->
            <!-- <div class="jumbotron text-center mb-0">
                <h1 class="display-3 font-weight-normal text-muted">All Categories</h1>
            </div> -->

            <div class="bg-white p-4">

                <div class="row">

                    <div class="col-lg-12 text-center mb-3">
                        <a class="btn btn-info" href="add_gallery_img.php">Add Images</a>
                    </div>

                </div>

                <div class="row">
                    <table class='table table-striped table-bordered'>

                        <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Image</th>
                                <th scope='col'>Category</th>
                                <!-- <th scope='col'>Color</th> -->
                                <th scope='col' colspan="2">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $count = 0;
                            foreach ($images as $image) :
                                echo "<tr>";
                                $count++
                            ?>
                                
                                <td><?= $count ?></td>
                                <td>
                                    
                                    <img src="../img/gallery/<?= empty($image['img_name']) ? "no-image-available.png" : $image['img_name']; ?>" style="width: 100px; height: 60px;">
                                </td>
                           
                                <td>
                                    <?= $image['category'] ?>
                                
                                </td>

                                <td>
                                    <form action="all_images.php" method="POST">
                                          <input type="hidden" name="image_id" value="<?= $image['id'] ?>">
                                        <button type="submit" class="  btn btn-danger" data-id="<?= $image['id'] ?>">
                                                                     <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                            </form>
                                </td>

                            <?php
                                echo "</tr>";
                            endforeach;
                            ?>
                        </tbody>

                    </table>
                </div>

            </div>


        </main>

    </div>
    <!-- Footer -->
    <?php include "partials/footer_links.php" ?>
</body>
<script>


</script>
</html>