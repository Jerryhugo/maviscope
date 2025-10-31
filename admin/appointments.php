<?php
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// ini_set('error_log', '/path/to/your/php-error.log');
// error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
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

    <title>Appointments</title>

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
require "delete.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $appointmentId = $_POST["appointmentId"];
    $department = $_POST['department'];
    $reason = $_POST['reason'];
    $user = $_SESSION['username'];


    // Insert into completed table
    $stmt = $pdo->prepare("INSERT INTO completed_appointments (appointment_id, firstname, lastname, email, phone, department, reason, completed_by) VALUES (:appointment_id, :firstname, :lastname, :email, :phone, :department, :reason, :completed_by)");
    $stmt->execute([
        ':appointment_id' => $appointmentId,
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':email' => $email,
        ':phone' => $phone,
        ':department' => $department,
        ':reason' => $reason,
        ':completed_by' => $user
    ]);

    deleteAppointment($appointmentId, "specialties");
    $_SESSION["complete"] = "Appointment marked as completed";
    // header("location: appointments.php");
}

?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "partials/sidebar.php" ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "partials/nav.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Appointments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Department</th>
                                            <th>No of Children</th>
                                            <th>Appointment Reason</th>
                                            <th></th>
                                            <th></th>
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
                                        $sql = "SELECT * FROM specialties ORDER BY id DESC";

                                        try {
                                            $stmt = $pdo->query($sql);

                                            // Fetch all records as an associative array
                                            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if ($records) {
                                                $count = 0;
                                                // Process the records as needed
                                                foreach ($records as $record) {
                                                    $count++ ;
                                                    $appointment_time = htmlspecialchars($record['time']); // Example time from MySQL
                                                    $formatted_time = date("g:i A", strtotime($appointment_time));
                                                    ?>

                                                   

                                                    <tr>
                                                        <td><?php echo $count ?> </td>
                                                        <td><?php echo htmlspecialchars($record['firstname'])  ?></td>
                                                        <td><?php echo htmlspecialchars($record['lastname'])  ?></td>
                                                        <td><?php echo htmlspecialchars($record['phone']) ?></td>
                                                        <td><?php echo htmlspecialchars($record['email']) ?></td>
                                                        <td><?php echo htmlspecialchars($record['date']) ?></td>
                                                        <td><?php echo $formatted_time ?></td>
                                                        <td><?php echo htmlspecialchars($record['department']) ?></td>
                                                        <td><?php echo htmlspecialchars($record['children']) ?></td>
                                                        <td><?php echo htmlspecialchars($record['reason']) ?></td>
                                                        <td>
                                                            <form id="markCompletedForm" action="appointments.php" method="POST">
                                                                <input type="hidden" name="appointments">
                                                                <input type="hidden" name="firstname" value="<?php echo htmlspecialchars($record['firstname'])  ?>">
                                                                <input type="hidden" name="lastname" value="<?php echo htmlspecialchars($record['lastname'])  ?>">
                                                                <input type="hidden" name="phone" value="<?php echo htmlspecialchars($record['phone']) ?>">
                                                                <input type="hidden" name="email" value="<?php echo htmlspecialchars($record['email']) ?>">
                                                                <input type="hidden" name="department" value="<?php echo htmlspecialchars($record['department']) ?>">
                                                                <input type="hidden" name="reason" value="<?php echo htmlspecialchars($record['reason']) ?>">
                                                                <input type="hidden" name="appointmentId" value="<?php echo htmlspecialchars($record["id"]) ?>">


                                                                <button type="button" onclick="confirmMarkAsCompleted(this)" class="complete-btn btn btn-success">Complete</button>

                                                            </form>



                                                        </td>

                                                        <td>
                                                            <form action="delete.php" method="POST">
                                                                
                                                                <input type="hidden" name="appointmentId" value="<?php echo htmlspecialchars($record["id"]) ?>">
                                                                <input type="hidden" name="table" value="appointments">
                                                                <button type="button" onclick="deleteAppointment(this)" class="delete-btn btn btn-danger">Delete</button>
                                                            </form>
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


    <!-- <script src="js/main.js"></script> -->
    <script>
        function confirmMarkAsCompleted(button) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to mark this appointment as completed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark it as completed!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if user confirms
                    const form = button.closest('form');
                    form.submit();
                }
            });
        }

        function deleteAppointment(button) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this appointment?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete appointment!'
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

            Swal.fire('Success!', <?php echo $_SESSION['message']; ?>, 'success');


        <?php unset($_SESSION['message']);
        }
        ?>

        <?php
        if (isset($_SESSION['complete'])) { ?>

            Swal.fire('Success!', "Appointment marked as completed", 'success');


        <?php unset($_SESSION['complete']);
        }
        ?>
    </script>


</body>

</html>