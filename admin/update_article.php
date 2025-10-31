<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}


require "conn.php";

$article_id = $_GET["id"];

// Get article Data to display
$stmt = $pdo->prepare("SELECT * FROM article WHERE article_id = ?");
$stmt->execute([$article_id]);
$article = $stmt->fetch();

// Get categories Data to display
$stmt = $pdo->prepare("SELECT category_id, category_name FROM category");
$stmt->execute();
$categories = $stmt->fetchAll();

// Get authors Data to display
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

    <title>Update Post</title>

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
                    <div class="row">

                        <div class="col-lg-12 mb-4">
                            <!-- Form -->
                            <form action="functions/update.php?type=article&id=<?= $article_id ?>&img=<?= $article["article_image"] ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="arTitle">Title</label>
                                    <input type="text" class="form-control" name="arTitle" id="arTitle" value="<?= $article["article_title"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="arContent">Content</label>
                                    <textarea class="form-control" name="arContent" id="arContent" rows="3">
                            <?= $article["article_content"] ?>
                        </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="UploadImage">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="arImage" id="arImage">
                                        <label class="custom-file-label" for="UploadImage"> <?= $article['article_image'] ?></label>
                                    </div>

                                </div>

                                <div class="my-2" style="width: 200px;">
                                    <img class="w-100 h-auto" src="../img/article/<?= $article["article_image"] ?>" alt="">
                                </div>

                                <div class="form-group">
                                    <label for="arCategory">Category</label>
                                    <select class="custom-select" name="arCategory" id="arCategory">
                                        <option disabled>-- Select Category --</option>

                                        <?php foreach ($categories as $category) : ?>

                                            <?php if ($article['id_categorie'] == $category['category_id']) : ?>

                                                <option value="<?= $category['category_id'] ?>" selected><?= $category['category_name'] ?></option>

                                            <?php else : ?>

                                                <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>

                                            <?php endif; ?>

                                        <?php endforeach; ?>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="arauthor">Author</label>
                                    <select class="custom-select" name="arAuthor" id="arAuthor">
                                        <option disabled>-- Select Author --</option>

                                        <?php foreach ($authors as $author) : ?>

                                            <?php if ($article['id_author'] == $author['author_id']) : ?>

                                                <option value="<?= $author['author_id'] ?>" selected><?= $author['author_fullname'] ?></option>

                                            <?php else : ?>

                                                <option value="<?= $author['author_id'] ?>"><?= $author['author_fullname'] ?></option>

                                            <?php endif; ?>


                                        <?php endforeach; ?>


                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="update" class="btn btn-success btn-lg w-25">Update</button>
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