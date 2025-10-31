<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}


require "conn.php";
$author_id = $_GET["id"];

// Get author Data to display
$stmt = $pdo->prepare("SELECT * FROM author WHERE author_id = ?");
$stmt->execute([$author_id]);
$author = $stmt->fetch();

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
            <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 mb-4">
                    <!-- Form -->
                    <form action="functions/update.php?type=author&id=<?= $author_id ?>&img=<?= $author["author_avatar"] ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="authName">Full Name</label>
                            <input type="text" class="form-control" name="authName" id="authName" value="<?= $author['author_fullname'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="authDesc">Description</label>
                            <input type="text" class="form-control" name="authDesc" id="authDesc" value="<?= $author['author_desc'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="authEmail">Email</label>
                            <input type="text" class="form-control" name="authEmail" id="authEmail" value="<?= $author['author_email'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="authImage">Avatar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="authImage" id="authImage">
                                <label class="custom-file-label" for="authImage"> <?= $author['author_avatar'] ?> </label>
                            </div>
                        </div>

                        <div class="my-2" style="width: 200px;">
                            <img class="w-100 h-auto" src="../img/avatar/<?= $author['author_avatar'] ?>" alt="">
                        </div>

                        <div class="form-group">
                            <label for="authTwitter">Twitter Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control" name="authTwitter" id="authTwitter" value="<?= $author['author_twitter'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="authGithub">Github Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control" name="authGithub" id="authGithub" value="<?= $author['author_github'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="authLinkedin">Linkedin Username <span class="text-info">(optional)</span></label>
                            <input type="text" class="form-control" name="authLinkedin" id="authLinkedin" value="<?= $author['author_link'] ?>">
                        </div>


                        <div class="text-center">
                            <button type="submit" name="update" class="btn btn-success btn-lg w-25">Submit</button>
                        </div>


                    </form>
                </div>


            </div>

        </div>

        </main>

    </div>
        <!-- Footer -->
        <?php include "partials/footer_links.php" ?>
</body>

</html>