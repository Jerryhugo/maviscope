<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Blog</title>
<?php include "partials/header.php" ?>

  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>

</head>

<?php require "admin/conn.php" ?>
<?php

// Get Latest articles
$stmt = $pdo->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT 9");
$stmt->execute();
$articles = $stmt->fetchAll();

// Get Categories
$stmt = $pdo->prepare("SELECT *,COUNT(*) as article_count FROM `article` INNER JOIN category ON id_categorie=category_id GROUP BY id_categorie");
$stmt->execute();
$categories = $stmt->fetchAll();

// Get Most Read Articles
$stmt = $pdo->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id order by RAND() LIMIT 4");
$stmt->execute();
$most_read_articles = $stmt->fetchAll();

?>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>


  <?php
  include "partials/navbar.php";
  ?>
  <!-- <section class="construction mb-4">
    <div class=" jumbotron">
        <div class="text-center  py-5">
            <h1 class=" text-primary">🚧 Our Medical Blog is Under Construction 🚧</h1>
            <p class="lead mt-3">
              We’re working hard to bring you a wealth of trusted medical insights, health tips, and expert advice. 
              Our team is meticulously crafting content to ensure you receive the most accurate and up-to-date information.
            </p>
            <p class="mt-3">
              <strong>Stay tuned!</strong> Something amazing is coming soon to help you take charge of your health and well-being.
            </p>
            <div class="mt-4">
              <p class="text-muted">
                In the meantime, feel free to reach out to us at <a href="mailto:info@yourmedicalblog.com">info@maviscope.com</a> 
                or follow us on social media for updates.
              </p>
            </div>
            <a class="btn mt-4 btn-primary btn-lg" href="index.php" role="button">Home Page</a>

            <div class="d-flex mt-4 socials justify-content-center">
                <a href="#" class="fab fa-2x fa-facebook-f"></a>
                <a href="#" class="fab fa-2x mx-4 fa-youtube-square"></a>
                <a href="#" class="fab fa-2x fa-instagram"></a>
            </div>
          </div>
         
        </p>
      </div>
</section> -->


  <section class="blog" id="blog">
    <h1 class="my-5">Latest Blog Post</h1>
    <div class="row g-5">


      <?php foreach ($articles as $article) : ?>

        <div class="col-lg-4 col-md-6 my-4 d-flex article-container">
          <div class="blog-item">
            <img class="mb-3" src="img/article/<?= $article['article_image'] ?>" alt="blog post image">
            <small><span> <?= date_format(date_create($article['article_created_time']), "F d, Y ") ?></span> | <span>Jeremiah Ugo</span></small>
            <h4 class="mt-3"><?= $article['article_title'] ?></h4>

            <a href="single_article.php?id=<?= $article['article_id'] ?>" class="btn btn-light-red">Read more</a>
          </div>

        </div>

      <?php endforeach;  ?>

    </div>
  </section>







</body>

</html>