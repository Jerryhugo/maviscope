<?php
require "admin/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Capture form data
    $fullname = trim($_POST['fullname'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $time = trim($_POST['time'] ?? '');
    $department = trim($_POST['department'] ?? '');
    $children = trim($_POST['children'] ?? '-');  // Default to '-' if children is not provided
    $reason = trim($_POST['reason'] ?? '');

    // SQL Insert Query
    $sql = "INSERT INTO specialties (fullname, phone, email, date, time, department, children, reason) 
        VALUES (:fullname, :phone, :email, :date, :time, :department, :children, :reason)";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':children', $children);
        $stmt->bindParam(':reason', $reason);

        $stmt->execute();

        $to = $email; // Recipient email address
        $subject = "Appointment confirmation"; // Email subject
        $message = "We are please to inform you that your appointment has been scheduled on the " . " " . $date; // Email body
        $headers = "From: info@maviscopehospital.com"; // Sender email address

        // Send the email
        mail($to, $subject, $message, $headers);


        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Success!',
            text: 'You have successfully schedule an appointment. You will recieve a mail shortly.',
            icon: 'success',
            confirmButtonText: 'OK'
        })
    });
  </script>";
    } catch (PDOException $e) {
        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error!',
            text: '" . $e->getMessage() . "',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
  </script>";
        // echo "Error inserting record: " . $e->getMessage();
    }



    // This block will only run if the form was submitted via POST
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Blog page</title>
    <?php include "partials/header.php"; ?>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body>

    <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

    <?php
    include "partials/navbar.php";

    ?>

  



    <section class="blog" id="blog">
        <?php
        require "admin/conn.php";
        $sql = "SELECT * FROM article ORDER BY article_id DESC LIMIT 3";
        $stmt = $pdo->query($sql);

        // Fetch articles
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($articles) { ?>
            <h1 class="my-4 pt-5">
                        Recent Blog Post
                    </h1>

            <div class="row g-5">
                <?php
                foreach ($articles as $article) {

                    $sql = "SELECT * FROM author WHERE author_id = :id";
                    $stmt = $pdo->prepare($sql);

                    // Bind the ID parameter securely
                    $stmt->bindParam(":id", $author_id, PDO::PARAM_INT);

                    // Set the ID value (12 in this case)
                    $author_id = $article["id_author"];

                    // Execute the query
                    $stmt->execute();

                    // Fetch the author details
                    $author = $stmt->fetch(PDO::FETCH_ASSOC); ?>

                    <div class="col-lg-4 col-md-6 ">
                        <div class="blog-item">
                            <img class="mb-3" src="img/article/<?= $article['article_image'] ?>" alt="blog post image">
                            <small> <?= date_format(date_create($article['article_created_time']), "F d, Y ") ?> | <?= $author['author_fullname']; ?></small>
                            <h4 class="mt-3"><?= $article["article_title"] ?></h4>

                            <a href="single_article.php?id=<?= $article['article_id'] ?>" class="btn btn-light-red">Read more</a>
                        </div>

                    </div>

                <?php    } ?>

                </div>

            <?php   } ?>
            




    </section>


    <!-- <section id="blog">
    
    <div class="row g-5">
        <div  class="col-lg-4 col-md-6 ">
            <div class="blog-item">
                <img class="mb-3" src="img/radiology.jpg" alt="blog post image">
                <small >Feb 12, 2025 | Jeremiah Ugo</small>
               <h4 class="mt-3">Recent Advancement in IVF</h4>
               <p>Recent advancements in IVF have significantly improved success rates, with innovations like genetic screening and embryo freezing enhancing outcomes</p>
               <a href="blog-page.html" class="btn btn-light-red">Read more</a>
            </div>
      
        </div>

        <div  class="col-lg-4 col-md-6 ">
            <div class="blog-item">
                <img class="mb-3" src="img/radiology.jpg" alt="blog post image">
                <small><span>Feb 12, 2025</span> | <span>Jeremiah Ugo</span></small>
               <h4 class="mt-3">Recent Advancement in IVF</h4>
               <p>Recent advancements in IVF have significantly improved success rates, with innovations like genetic screening and embryo freezing enhancing outcomes</p>
               <a href="blog-page.html" class="btn btn-light-red">Read more</a>
            </div>
         
        </div>

        <div  class="col-lg-4 col-md-6">
            <div class="blog-item">
                <img class="mb-3" src="img/radiology.jpg" alt="blog post image">
                <small><span>Feb 12, 2025</span> | <span>Jeremiah Ugo</span></small>
               <h4 class="mt-3">Recent Advancement in IVF</h4>
               <p>Recent advancements in IVF have significantly improved success rates, with innovations like genetic screening and embryo freezing enhancing outcomes</p>
               <a href="blog-page.html" class="btn btn-light-red">Read more</a>
            </div>
 
        </div>
        
    </div>
 </section> -->

    <?php
    include "partials/footer.php";
    ?>



</body>




<script>
    const specialtiesSelect = document.getElementById('department');




    const childrenField = document.getElementById('childrenField');

    specialtiesSelect.addEventListener('change', () => {
        const selectedOptions = Array.from(specialtiesSelect.selectedOptions).map(option => option.value);

        if (selectedOptions.includes('obgyn')) {
            childrenField.style.display = 'block';
        } else {
            childrenField.style.display = 'none';
        }
    });

    const btn = document.querySelectorAll(".complete-btn");

    btn.forEach(function(e) {
        e.addEventListener("click", function() {
            alert("i got clicked");
        })
    })
</script>



</html>