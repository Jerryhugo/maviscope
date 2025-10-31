<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fertility Services (female)</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Fertility Services</h1>
    </div>

  </section>


    <section id="fertility-features" class="mx-4 my-5 rounded p-5" data-aos="fade-up" data-aos-duration="500">
        <div class="row ">
            <h1 class="my-3 px-0 text-light">Explore Fertility Solutions</h1>
            <a href="male-fertility.php" class="col-lg-3 col-5 d-flex justify-content-between align-items-center hallow rounded p-4">
                <h5>Male </h5>
                <i class="fas fa-mars fa-2x"></i>
            </a>

            <a href="female-fertility.php" class="col-lg-3 mx-3 col-5 d-flex justify-content-between align-items-center hallow rounded p-4">
                <h5>Female </h5>
                <i class="fas fa-venus fa-2x"></i>
            </a>
          
        </div>
    </section>





  <?php
  include "partials/footer.php";
  ?>



</body>


</html>