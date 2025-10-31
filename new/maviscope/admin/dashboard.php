<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

function selectDepartment($selected_department)
{
    require "conn.php";
    $sql = "SELECT * FROM specialties WHERE department = :department";
    $stmt = $pdo->prepare($sql);

    // Bind the parameter
    $department = $selected_department;
    $stmt->bindParam(':department', $department);

    // Execute the query
    $stmt->execute();

    // Count the number of rows returned
    $rowCount = $stmt->rowCount();

    return $rowCount;
}

function selectAllSpecialty()
{
    require "conn.php";
    $sql = "SELECT * FROM specialties";
    $stmt = $pdo->prepare($sql);

    // Bind the parameter


    // Execute the query
    $stmt->execute();

    // Count the number of rows returned
    $rowCount = $stmt->rowCount();

    return $rowCount;
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

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- sweet alert template -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- sweetalert js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .stat-card {
      background: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .section-title {
      margin-top: 40px;
      margin-bottom: 20px;
    }
  </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

     <?php include "partials/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
            

                    <?php include "partials/nav.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
               <div class="container py-4">
  <h2 class="mb-4">Hospital Dashboard</h2>

  <!-- Stat Cards -->
  <div class="row g-4">
    <div class="col-md-3">
      <div class="stat-card text-center">
        <h5>Total Appointments</h5>
        <h2 id="totalAppointments">120</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card text-center">
        <h5>Completed</h5>
        <h2 id="completedAppointments">95</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card text-center">
        <h5>Pending</h5>
        <h2 id="pendingAppointments">25</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card text-center">
        <h5>Today’s Appointments</h5>
        <h2 id="todaysAppointments">8</h2>
      </div>
    </div>
  </div>

  <!-- Charts -->
  <div class="row section-title">
    <div class="col">
      <h4>Appointments Overview</h4>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-md-6">
      <div class="stat-card">
        <h6>Appointments Over Time</h6>
        <canvas id="appointmentsChart" height="200"></canvas>
      </div>
    </div>
    <div class="col-md-6">
      <div class="stat-card">
        <h6>Appointments by Department</h6>
        <canvas id="departmentChart" height="200"></canvas>
      </div>
    </div>
  </div>

  <!-- Blog and Gallery -->
  <div class="row section-title">
    <div class="col">
      <h4>Content Stats</h4>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-md-3">
      <div class="stat-card text-center">
        <h5>Articles Published</h5>
        <h2 id="totalArticles">14</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card text-center">
        <h5>Authors</h5>
        <h2 id="totalAuthors">5</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card text-center">
        <h5>Gallery Images</h5>
        <h2 id="totalImages">58</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat-card text-center">
        <h5>Gallery Categories</h5>
        <h2 id="totalCategories">4</h2>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-6">
      <div class="stat-card">
        <h6>Articles by Author</h6>
        <canvas id="authorChart" height="200"></canvas>
      </div>
    </div>
    <div class="col-md-6">
      <div class="stat-card">
        <h6>Images by Category</h6>
        <canvas id="galleryChart" height="200"></canvas>
      </div>
    </div>
  </div>
</div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <!-- <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div> -->
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Dummy data for demonstration
  new Chart(document.getElementById('appointmentsChart'), {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
      datasets: [{
        label: 'Appointments',
        data: [12, 19, 3, 5, 9],
        backgroundColor: 'rgba(13, 110, 253, 0.2)',
        borderColor: '#0d6efd',
        borderWidth: 2
      }]
    },
    options: { responsive: true }
  });

  new Chart(document.getElementById('departmentChart'), {
    type: 'bar',
    data: {
      labels: ['Cardiology', 'ENT', 'Pediatrics', 'General'],
      datasets: [{
        label: 'Appointments',
        data: [8, 6, 15, 10],
        backgroundColor: ['#0d6efd', '#6610f2', '#198754', '#ffc107']
      }]
    },
    options: { responsive: true }
  });

  new Chart(document.getElementById('authorChart'), {
    type: 'bar',
    data: {
      labels: ['Dr. Alice', 'Dr. Bob', 'Dr. Jane'],
      datasets: [{
        label: 'Articles',
        data: [5, 3, 6],
        backgroundColor: ['#20c997', '#0dcaf0', '#fd7e14']
      }]
    },
    options: { responsive: true }
  });

  new Chart(document.getElementById('galleryChart'), {
    type: 'pie',
    data: {
      labels: ['Events', 'Facilities', 'Campaigns', 'Staff'],
      datasets: [{
        label: 'Images',
        data: [20, 15, 10, 13],
        backgroundColor: ['#198754', '#dc3545', '#0d6efd', '#6f42c1']
      }]
    },
    options: { responsive: true }
  });
</script>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <script>
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
    </script>

</body>

</html>