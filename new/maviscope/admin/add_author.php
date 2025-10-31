<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

require "conn.php";
?>

<!-- JS TextEditor -->
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Post</title>

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


        <!-- Main -->
        <main id="content-wrapper" class="d-flex flex-column">

            <!-- <div class="jumbotron text-center">
            <h1 class="display-3 font-weight-normal text-muted">Update Article</h1>
        </div> -->

            <div id="content">

                <!-- Topbar -->
                <?php include "partials/nav.php"; ?>
                <!-- End of Topbar -->

                <div class="container-fluid">
            <div class="row d-flex justify-content-center">

                <div class="col-lg-8 mb-4 ">
                    <h4>Add Author:</h4>
                    <!-- Form -->
                    <form action="functions/insert.php?type=author" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="authName">Full Name</label>
                            <input type="text" class="form-control" name="authName" id="authName">
                        </div>

                        <div class="form-group">
                            <label for="authDesc">Description</label>
                            <input type="text" class="form-control" name="authDesc" id="authDesc">
                        </div>

                        <div class="form-group">
                            <label for="authEmail">Email</label>
                            <input type="email" class="form-control" name="authEmail" id="authEmail">
                        </div>

                        <div class="form-group">
                            <label for="authImage">Avatar <?php if(isset($_SESSION['img-update'])){
                                            echo ": " . $_SESSION['img-update'];
                                            unset($_SESSION['img-update']);
                                        } ?></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="authImage" id="authImage">
                                <label class="custom-file-label" for="authImage">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="authTwitter">Twitter Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control" name="authTwitter" id="authTwitter" placeholder="Ex: wisdom_michael">
                        </div>
                        <div class="form-group">
                            <label for="authGithub">Instagram Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control" name="authGithub" id="authGithub" placeholder="Ex: wisdom_michael">
                        </div>
                        <div class="form-group">
                            <label for="authLinkedin">Linkedin Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control" name="authLinkedin" id="authLinkedin" placeholder="Ex: wisdom_michael">
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


    <!-- Footer -->
    <?php include "partials/footer_links.php" ?>
        <script>
            CKEDITOR.replace('arContent');
        </script>

</body>

</html>