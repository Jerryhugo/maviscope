<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

require "conn.php";
$stmt = $pdo->prepare("SELECT * FROM category");
$stmt->execute();
$categories = $stmt->fetchAll();

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
                        <a class="btn btn-info" href="add_category.php">Add Category</a>
                    </div>

                </div>

                <div class="row">
                    <table class='table table-striped table-bordered'>

                        <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>Image</th>
                                <th scope='col'>Color</th>
                                <th scope='col' colspan="2">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($categories as $category) :
                                echo "<tr>";
                            ?>

                                <td><?= $category['category_id'] ?></td>
                                <td><?= $category['category_name'] ?></td>
                                <td>
                                    <img src="../img/category/<?= empty($category['category_image']) ? "no-image-available.png" : $category['category_image']; ?>" style="width: 100px; height: 60px;">
                                </td>
                                <td class="">
                                    <div style="width: 40px; height: 40px; border-radius: 100% ;background-color: <?= $category['category_color'] ?>"></div>
                                </td>

                                <td>
                                    <a class="btn btn-success" href="update_category.php?id=<?= $category['category_id'] ?> ">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="functions/delete.php?type=category&id=<?= $category['category_id'] ?> ">
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


        </main>

    </div>
        <!-- Footer -->
        <?php include "partials/footer_links.php" ?>
</body>

</html>