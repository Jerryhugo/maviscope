<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

require "conn.php";
$stmt = $pdo->prepare("SELECT category_id, category_name FROM category");
$stmt->execute();
$categories = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT author_id, author_fullname FROM author");
$stmt->execute();
$authors = $stmt->fetchAll();

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Post</title>

    <!-- JS TextEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>



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
                    <h4>Add Post:</h4>

                    <div class="">
                        <div class="row">

                            <div class="col-lg-12 mb-4">
                                <!-- Form -->
                                <form action="functions/insert.php?type=article" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="arTitle">Title</label>
                                        <input type="text" class="form-control" name="arTitle" id="arTitle" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="arContent">Content</label>

                                        <textarea class="form-control" name="arContent" id="arContent" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="arImage">Image <span class="text-danger"><?php if(isset($_SESSION['img-update'])){
                                            echo ": " . $_SESSION['img-update'];
                                            unset($_SESSION['img-update']);
                                        } ?></span></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="arImage" id="arImage">
                                            <label class="custom-file-label" for="arImage">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="arCategory">Category</label>
                                        <select class="custom-select" name="arCategory" id="arCategory" required>
                                            <option disabled>-- Select Category --</option>

                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="arAuthor">Author</label>
                                        <select class="custom-select" name="arAuthor" id="arAuthor" required>
                                            <option disabled>-- Select Author --</option>

                                            <?php foreach ($authors as $author) : ?>
                                                <option value="<?= $author['author_id'] ?>"><?= $author['author_fullname'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-success btn-lg w-25">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <!-- <div class="col-lg-4 mb-4">
                     <h1> Random Articles </h1>
                  </div> -->


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
        ClassicEditor
            .create(document.querySelector('#arContent'))
            .then(editor => {
                console.log('Editor is ready!', editor);
            })
            .catch(error => {
                console.error('There was a problem initializing the editor.', error);
            });
    </script>

</body>

</html>