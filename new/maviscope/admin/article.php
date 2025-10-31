<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}
require "conn.php" ;


// Get all Articles Data
$stmt = $pdo->prepare("SELECT * FROM article, author, category WHERE id_categorie = category_id AND author_id = id_author ORDER BY article_id DESC");
$stmt->execute();
$data = $stmt->fetchAll();

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Posts</title>

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


<body>
    <div id="wrapper">

        <?php include "partials/sidebar.php" ?>

        <!-- Main -->
        <main id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <!-- Topbar -->
                <?php include "partials/nav.php"; ?>
                <!-- End of Topbar -->

                <div class="bg-white p-4">

                    <div class="row ">

                        <div class="col-lg-12 text-center mb-3">
                            <a class="btn btn-info" href="add_article.php">Add Article</a>
                        </div>

                    </div>

                    <div class="row">
                        <table class='table table-striped table-bordered'>

                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Title</th>
                                    <th scope='col'>Content</th>
                                    <th scope='col'>Image</th>
                                    <th scope='col'>Created Time</th>
                                    <th scope='col'>Category</th>
                                    <th scope='col'>Author</th>
                                    <th scope='col' colspan="3">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($data as $row) :
                                    echo "<tr>";
                                ?>

                                    <td><?= $row['article_id'] ?></td>
                                    <td><?= $row['article_title'] ?></td>
                                    <td class="text-break"><?= strip_tags(substr($row['article_content'], 0, 40)) . "..." ?></td>
                                    <td><img src="../img/article/<?= $row['article_image'] ?>" style="width: 100px; height: auto;"></td>
                                    <td><?= $row['article_created_time'] ?></td>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><?= $row['author_fullname'] ?></td>

                                 
                                    <td>
                                        <a class="btn btn-success" href="update_article.php?id=<?= $row['article_id'] ?> ">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="functions/delete.php?type=article&id=<?= $row['article_id'] ?> ">
                                            <i class="fa fa-trash " aria-hidden="true"></i>
                                        </a>
                                    </td>

                                <?php
                                    echo "</tr>";
                                endforeach;
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>                        
        </main>


    </div>

    
<?php include "partials/footer_links.php"; ?>

</body>

</html>