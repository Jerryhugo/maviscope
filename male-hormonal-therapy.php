<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Hormonal Therapy</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero male-fertlity-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Hormonal Therapy</h1>
    </div>

  </section>



  <!-- body  -->

<div class="container my-5">

  <div class="accordion" id="hormoneAccordion">

    <!-- Testosterone Regulation -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="hormoneHeadingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#testosterone" aria-expanded="true" aria-controls="testosterone">
          💉 Testosterone Regulation Therapy
        </button>
      </h2>
      <div id="testosterone" class="accordion-collapse collapse show" aria-labelledby="hormoneHeadingOne" data-bs-parent="#hormoneAccordion">
        <div class="accordion-body">
          Therapy focuses on optimizing testosterone levels through medications like Clomid or hCG that do not suppress sperm production, unlike direct testosterone replacement.
        </div>
      </div>
    </div>

    <!-- Hypogonadism -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="hormoneHeadingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hypogonadism" aria-expanded="false" aria-controls="hypogonadism">
          🧬 Treatment for Hypogonadism
        </button>
      </h2>
      <div id="hypogonadism" class="accordion-collapse collapse" aria-labelledby="hormoneHeadingTwo" data-bs-parent="#hormoneAccordion">
        <div class="accordion-body">
          Men with hypogonadism receive hormone therapy to stimulate testosterone and sperm production, helping restore fertility and sexual function.
        </div>
      </div>
    </div>

    <!-- Gonadotropin Therapy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="hormoneHeadingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gonadotropin" aria-expanded="false" aria-controls="gonadotropin">
          💊 Gonadotropin Therapy (hCG and FSH)
        </button>
      </h2>
      <div id="gonadotropin" class="accordion-collapse collapse" aria-labelledby="hormoneHeadingThree" data-bs-parent="#hormoneAccordion">
        <div class="accordion-body">
          Regular injections of hCG and FSH mimic the body's natural hormones to stimulate sperm production in men with pituitary or hypothalamic disorders.
        </div>
      </div>
    </div>

    <!-- Anti-Estrogen Medications -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="hormoneHeadingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#antiEstrogen" aria-expanded="false" aria-controls="antiEstrogen">
          🚫 Anti-Estrogen Medications
        </button>
      </h2>
      <div id="antiEstrogen" class="accordion-collapse collapse" aria-labelledby="hormoneHeadingFour" data-bs-parent="#hormoneAccordion">
        <div class="accordion-body">
          Drugs like Clomiphene block estrogen’s negative feedback on the brain, leading to increased LH and FSH production which enhances testosterone and sperm production.
        </div>
      </div>
    </div>

  </div>
</div>



  <?php
  include "partials/footer.php";
  ?>



</body>


</html>

