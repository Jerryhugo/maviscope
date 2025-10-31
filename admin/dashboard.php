<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}
include "functions/dashboard_stats.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>

  <!-- Fonts and CSS -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
  <div id="wrapper">
    <?php include "partials/sidebar.php" ?>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include "partials/nav.php" ?>

        <div class="container py-4">
          <h2 class="mb-4">Hospital Dashboard</h2>

          <!-- Stat Cards -->
          <div class="row g-4">
            <div class="col-md-3 col-6">
              <div class="stat-card text-center">
                <h5>Total Appointments</h5>
                <h2 id="totalAppointments"></h2>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="stat-card text-center">
                <h5>Completed</h5>
                <h2 id="completedAppointments"></h2>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="stat-card text-center">
                <h5>Pending</h5>
                <h2 id="pendingAppointments"></h2>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="stat-card text-center">
                <h5>Today’s Appointments</h5>
                <h2 id="todaysAppointments"></h2>
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

          <div class="row section-title">
            <div class="col">
              <h4>Content Stats</h4>
            </div>
          </div>

          <div class="row g-4">
            <div class="col-md-3 col-6">
              <div class="stat-card text-center">
                <h5>Articles Published</h5>
                <h2 id="totalArticles"></h2>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="stat-card text-center">
                <h5>Authors</h5>
                <h2 id="totalAuthors"></h2>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="stat-card text-center">
                <h5>Gallery Images</h5>
                <h2 id="totalImages"></h2>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="stat-card text-center">
                <h5>Gallery Categories</h5>
                <h2 id="totalCategories"></h2>
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
      </div>

      <footer class="sticky-footer bg-white"></footer>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    fetch('appointments_over_time.php')
      .then(res => res.json())
      .then(data => {
        const dates = data.map(item => item.date);
        const counts = data.map(item => item.count);
        new Chart(document.getElementById('appointmentsChart'), {
          type: 'line',
          data: {
            labels: dates,
            datasets: [{
              label: 'Appointments per Day',
              data: counts,
              backgroundColor: 'rgba(13, 110, 253, 0.2)',
              borderColor: '#0d6efd',
              borderWidth: 2,
              tension: 0.4,
              fill: true
            }]
          },
          options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });
      });

    fetch('appointments_by_department.php')
      .then(res => res.json())
      .then(data => {
        const departments = data.map(item => item.department);
        const counts = data.map(item => item.count);
        new Chart(document.getElementById('departmentChart'), {
          type: 'bar',
          data: {
            labels: departments,
            datasets: [{
              label: 'Appointments',
              data: counts,
              backgroundColor: ['#0d6efd', '#6610f2', '#198754', '#ffc107', '#dc3545']
            }]
          },
          options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });
      });

      fetch('articles_by_author.php')
  .then(res => res.json())
  .then(data => {
    const authors = data.map(item => item.author);
    const counts = data.map(item => item.count);

    new Chart(document.getElementById('authorChart'), {
      type: 'bar',
      data: {
        labels: authors,
        datasets: [{
          label: 'Articles',
          data: counts,
          backgroundColor: '#20c997'
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  });

  fetch('gallery_images_by_category.php')
  .then(res => res.json())
  .then(data => {
    const categories = data.map(item => item.category);
    const counts = data.map(item => item.count);

    new Chart(document.getElementById('galleryChart'), {
      type: 'pie',
      data: {
        labels: categories,
        datasets: [{
          label: 'Images',
          data: counts,
          backgroundColor: ['#198754', '#dc3545', '#0d6efd', '#6f42c1', '#fd7e14']
        }]
      },
      options: {
        responsive: true
      }
    });
  });


  </script>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/sb-admin-2.min.js"></script>

  <script>
    document.getElementById("totalAppointments").innerText = <?= $totalAppointments ?>;
    document.getElementById("completedAppointments").innerText = <?= $completedAppointments ?>;
    document.getElementById("pendingAppointments").innerText = <?= $pendingAppointments ?>;
    document.getElementById("todaysAppointments").innerText = <?= $todaysAppointments ?>;
    document.getElementById("totalArticles").innerText = <?= $totalArticles ?>;
    document.getElementById("totalAuthors").innerText = <?= $totalAuthors ?>;
    document.getElementById("totalImages").innerText = <?= $totalImages ?>;
    document.getElementById("totalCategories").innerText = <?= $totalCategories ?>;
  </script>
</body>

</html>
