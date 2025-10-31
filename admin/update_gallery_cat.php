<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}


include "conn.php";
include "functions/gallery_control.php";


$category_id = $_GET["id"];

// Get category Data to display
$stmt = $pdo->prepare("SELECT * FROM gallery_category WHERE id = ?");
$stmt->execute([$category_id]);
$category = $stmt->fetch();

if(isset($_POST["upload"])) {
    
    updateGalleryCat();
}


?>



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Category</title>

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



            <div id="content">

                <!-- Topbar -->
                <?php include "partials/nav.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- <div class="jumbotron text-center ">
                        <h1 class="display-3 font-weight-normal text-muted">Submit an Article</h1>
                    </div> -->
                    <h4>Update Gallery Category:</h4>



                    <div class="row">

                        <div class="col-lg-12 mb-4">
                            <!-- Form -->
                            <form action="update_gallery_cat.php?id=<?= $category_id ?>" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="cat-id" value="<?= $category_id ?>">

                                <div class="form-group">
                                    <label for="category" class="">Category Name</label>
                                    <input type="text" name="category" class="form-control" placeholder="<?= $category['category_name'] ?>" value="<?= $category['category_name'] ?>">

                                </div>

                                <div class="form-group">

                                    <label for="images">Category Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="catImage"><?= $category["category_image"] ?></label>
                                    </div>
                                </div>


                                <div class="my-3" style="width: 200px;">
                                    <img class="w-100 h-auto" src="../img/gallery/<?= $category["category_image"] ?>" alt="">
                                </div>


                                <div class="text-center">
                                    <button type="submit" name="upload" class="btn btn-success btn-lg w-25">Update</button>
                                </div>
                            </form>
                        </div>




                    </div>
                </div>



            </div>

        </main>
    </div>




    <!-- Main -->


    <!-- Footer -->
    <?php include "partials/footer_links.php" ?>

    <!-- Text Editor Script -->
    <script>
        CKEDITOR.replace('arContent');
    </script>

</body>

</html>