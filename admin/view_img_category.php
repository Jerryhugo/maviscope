<?php
session_start();

include "conn.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

if (isset($_POST['category_id'])) {
    $id = intval($_POST['category_id']);

    $stmt = $pdo->prepare("DELETE FROM gallery_category WHERE id = ?");
    
    if ($stmt->execute([$id])) {
        
    } else {
        http_response_code(500);
        echo "error";
    }

    $stmt = null;
    $pdo = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Image Categories</title>

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

<?php
require "conn.php";

?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- Sidebar -->
        <?php include "partials/sidebar.php" ?>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "partials/nav.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Completed Apppointments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Category Image</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Department</th>
                                            <th>No of Childre</th>
                                            <th>Appointment Reason</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php
                                        // SQL query to select all records from the specialty table
                                        $sql = "SELECT * FROM gallery_category";

                                        try {
                                            $stmt = $pdo->query($sql);

                                            // Fetch all records as an associative array
                                            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if ($records) {
                                                $count = 0;
                                                // Process the records as needed
                                                foreach ($records as $record) {
                                                    $count++   ?>

                                                    <tr>
                                                        <td><?php echo $count ?> </td>
                                                        <td><?php echo htmlspecialchars($record['category_name'])  ?></td>
                                                        <td> <img src="../img/gallery/<?= empty($record['category_image']) ? "no-image-available.png" : $record['category_image']; ?>" style="width: 100px; height: 60px;"></td>




                                                        <td>
                                                            <div class="d-flex">

                                                                <a class="btn btn-success mr-3" href="update_gallery_cat.php?id=<?= $record['id'] ?> ">
                                                                    Edit
                                                                </a>


                                                            <form action="view_img_category.php" method="POST">
                                                                
                                                              
                                                                <input type="hidden" name="category_id" value="<?= $record['id'] ?>">
                                                               

                                                                   <button type="submit" class="btn btn-danger mr-3" 
                                                                   >
                                                                    delete
                                                </button>
                                                            </form>
                                                                



                                                               


                                                </div>




                                                        </td>

                                                    </tr>

                                        <?php        }
                                            } else {
                                                echo "No records found.";
                                            }
                                        } catch (PDOException $e) {
                                            echo "Error retrieving records: " . $e->getMessage();
                                        }
                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> -->

    <?php include "partials/footer_links.php" ?>


<script>

        function deleteCategory() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this category?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete category!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if user confirms
                    const form = button.closest('form');
                    form.submit();
                }
            });
        }




        function logout() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to logout",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if user confirms
                    const logoutForm = document.getElementById("logoutForm");
                    logoutForm.submit();
                }
            });
        }

        <?php
        if (isset($_SESSION['message'])) { ?>

            Swal.fire('Success!', 'Appointment Deleted', 'success');


        <?php unset($_SESSION['message']);
        }
        ?>
    </script>


</body>

</html>