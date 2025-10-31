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

  <section class="hero female-fertlity-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Female Fertility Services</h1>
    </div>

  </section>




  <section class="py-5">
    <div class="container">

      <div class="row g-4">
        <!-- Service Item -->
        <div class="col-md-4 col-6">
          <a href="female-fertility-evaluation.php">
            <div class="card h-100 p-3">
              <div class="service-icon mb-3">🧪</div>
              <h5>Fertility Evaluation and Diagnosis</h5>

            </div>
          </a>

        </div>
        <!-- Repeat for more services -->
        <div class="col-md-4 col-6">
          <a href="female-medical-treatment.php">
            <div class="card h-100  p-3">
              <div class="service-icon mb-3">💊</div>
              <h5>Medical Treatments</h5>

            </div>
          </a>

        </div>
        <div class="col-md-4 col-6">
          <a href="female-surgical-treatment.php">
            <div class="card h-100 p-3">
              <div class="service-icon mb-3">	🩺</div>
              <h5>Surgical Treatments</h5>

            </div>
          </a>

        </div>

        <div class="col-md-4 col-6">
          <a href="female-art.php">
            <div class="card h-100 p-3">
              <div class="service-icon mb-3">🧬</div>
              <h5>Assisted Reproductive Technologies (ART)</h5>

            </div>
          </a>

        </div>

        <div class="col-md-4 col-6">
          <a href="egg-freezing.php">
            <div class="card h-100 p-3">
              <div class="service-icon mb-3">❄️</div>
              <h5> Egg Freezing / Cryopreservation</h5>

            </div>
          </a>


        </div>
        <div class="col-md-4 col-6">
          <a href="female-lsm.php">
            <div class="card h-100 p-3">
              <div class="service-icon mb-3 fa-2x">🧘</div>
              <h5>Lifestyle and Counseling Support</h5>
            </div>
          </a>

        </div>

           <div class="col-md-4 col-6">
          <a href="female-ucm.php">
            <div class="card h-100 p-3">
              <div class="service-icon mb-3 fa-2x">🧫</div>
              <h5> Management of Underlying Conditions</h5>
            </div>
          </a>

        </div>

        <!-- Add more services as needed -->
      </div>
    </div>
  </section>



  <?php
  include "partials/footer.php";
  ?>



</body>


</html>