<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}
require "conn.php";


$stmt = $pdo->prepare("SELECT * FROM author");
$stmt->execute();
$authors = $stmt->fetchAll();


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

    <style>
        .fa-twitter,
        .fa-github,
        .fa-linkedin-square {
            font-size: 2.3rem;
        }
    </style>

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
                    <h4>Authors</h4>


                    <div class="bg-white py-3 px-5">
                        <div class="row">

                            <div class="col-lg-12 text-center mb-3">
                                <a class="btn btn-info" href="add_author.php">Add Author</a>
                            </div>

                        </div>

                        <div class="row">
                            <table class='table table-striped table-bordered'>

                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>ID</th>
                                        <th scope='col'>Full Name</th>
                                        <th scope='col'>Description</th>
                                        <th scope='col'>Avatar</th>
                                        <th scope='col'>Email</th>
                                        <th scope='col'>Twitter</th>
                                        <th scope='col'>Github</th>
                                        <th scope='col'>Linkedin</th>
                                        <th scope='col' colspan="2">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($authors as $author) :
                                        echo "<tr>";
                                    ?>

                                        <td><?= $author['author_id'] ?></td>
                                        <td><?= $author['author_fullname'] ?></td>
                                        <td><?= $author['author_desc'] ?></td>
                                        <td>
                                            <img src="../img/avatar/<?= $author['author_avatar'] ?>" style="width: 50px; height: 50px;border-radius: 100%;">
                                        </td>
                                        <td><?= $author['author_email'] ?></td>
                                        <td class="text-center">
                                            <a href="https://twitter.com/<?= $author['author_twitter'] ?>" target="_blank">
                                            <i class="fab fa-twitter text-dark fa-3x"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="https://instagram.com/<?= $author['author_github'] ?>" target="_blank">
                                                <i class="fab fa-instagram text-dark fa-3x"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="https://www.linkedin.com/in/<?= $author['author_link'] ?>" target="_blank">
                                            <i class="fab fa-linkedin fa-3x text-dark"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a class="btn btn-success" href="update_author.php?id=<?= $author['author_id'] ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="functions/delete.php?type=author&id=<?= $author['author_id'] ?>">
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