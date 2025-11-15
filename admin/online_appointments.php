<?php
session_start();
require "conn.php";

// SEARCH & FILTER
$search = $_GET['search'] ?? '';
$department = $_GET['department'] ?? '';

// PAGINATION
$limit = 10;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// MAIN QUERY
$sql = "SELECT * FROM online_appointments WHERE 
        (firstname LIKE :search 
        OR lastname LIKE :search 
        OR phone LIKE :search 
        OR ticket_id LIKE :search 
        OR online_appointment_id LIKE :search)";

if ($department !== '') {
    $sql .= " AND department = :department";
}

$sql .= " ORDER BY online_appointment_id DESC LIMIT :start, :limit";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search', "%$search%");
$stmt->bindValue(':start', $start, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
if ($department !== '') {
    $stmt->bindValue(':department', $department);
}
$stmt->execute();
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// COUNT FOR PAGINATION
$countQuery = "SELECT COUNT(*) FROM online_appointments";
$countStmt = $pdo->prepare($countQuery);
$countStmt->execute();
$totalRows = $countStmt->fetchColumn();
$totalPages = ceil($totalRows / $limit);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Appointments - Admin</title>


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

<body class="bg-light" id="page-top">
    <div id="wrapper">
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
                    <div class="container mt-4">

                        <h3 class="mb-3">Online Appointment Requests</h3>

                        <!-- SEARCH + FILTER -->
                        <form class="row mb-3">
                            <div class="col-md-4 mb-2">
                                <input type="text" name="search" class="form-control" value="<?= $search ?>"
                                    placeholder="Search name, phone, ticket ID...">
                            </div>

                            <div class="col-md-3 mb-2">
                                <select name="department" class="form-select p-1">
                                    <option value="">All Departments</option>
                                    <option value="Gynecology">Gynecology</option>
                                    <option value="Fertility">Fertility</option>
                                    <option value="Ultrasound">Ultrasound</option>
                                    <option value="Radiology">Radiology</option>
                                    
                                </select>
                            </div>

                            <div class="col-md-3 mb-2">
                                <button class="btn btn-primary w-100">Search</button>
                            </div>
<!-- 
                            <div class="col-md-2">
                                <a href="export_excel.php" class="btn btn-success w-100 mb-2">Excel</a>
                                <a href="export_pdf.php" class="btn btn-danger w-100">PDF</a>
                            </div> -->
                        </form>

                        <!-- DATA TABLE -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover bg-white">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Online ID</th>
                                        <th>Ticket ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Children</th>
                                        <th>Reason</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($appointments as $row): ?>
                                        <tr>
                                            <td><?= $row["online_appointment_id"] ?></td>
                                            <td><?= $row["ticket_id"] ?></td>
                                            <td><?= $row["firstname"] . " " . $row["lastname"] ?></td>
                                            <td><?= $row["phone"] ?></td>
                                            <td><?= $row["email"] ?></td>
                                            <td><?= $row["department"] ?></td>
                                            <td><?= $row["children"] ?></td>
                                            <td><?= $row["reason"] ?></td>

                                            <td>
                                                <a href="https://wa.me/234<?= ltrim($row['phone'], '0') ?>" target="_blank"
                                                    class="btn btn-success btn-sm mb-2">WhatsApp</a>

                                                <!-- <a href="complete_appointment.php?id=<?= $row['online_appointment_id'] ?>"
                                                    class="btn btn-primary btn-sm mb-2">Complete</a> -->

                                                <a href="delete_appointment.php?id=<?= $row['online_appointment_id'] ?>"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="btn btn-danger btn-sm mb-2">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- PAGINATION -->
                        <nav>
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                        <a class="page-link"
                                            href="?page=<?= $i ?>&search=<?= $search ?>&department=<?= $department ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>

        </div>

    </div>


</body>

</html>