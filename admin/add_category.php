<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Article</title>

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

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12 mb-4">
                            <!-- Form -->
                            <form action="functions/insert.php?type=category" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="catName">Category Name</label>
                                    <input type="text" class="form-control" name="catName" id="catName">
                                </div>

                                <div class="form-group">
                                    <label for="catImage">Category Image <?php if(isset($_SESSION['img-update'])){
                                            echo ": " . $_SESSION['img-update'];
                                            unset($_SESSION['img-update']);
                                        } ?></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="catImage" id="catImage">
                                        <label class="custom-file-label" for="catImage">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="catColor">Category Color</label>
                                    <input type="color" id="catColor" name="catColor" value="#0f88e1">
                                </div>


                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-success btn-lg w-25">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>


        </main>
    </div>
    <!-- Main -->


<?php include "partials/footer_links.php"; ?>


</body>

</html>