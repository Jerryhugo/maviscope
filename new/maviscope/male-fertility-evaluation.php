<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fertility Evaluation (male)</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Fertility Evaluation and diagnosis</h1>
    </div>

  </section>

  <!-- Bootstrap CSS CDN -->


<div class="container my-5">
  <!-- <h2 class="mb-4">Fertility Evaluation & Diagnosis</h2> -->

  <div class="accordion" id="fertilityEvaluationAccordion">

    <!-- Semen Analysis -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#semenAnalysis" aria-expanded="true" aria-controls="semenAnalysis">
          🧪 Semen Analysis
        </button>
      </h2>
      <div id="semenAnalysis" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#fertilityEvaluationAccordion">
        <div class="accordion-body">
          This test examines sperm count, movement (motility), shape (morphology), and volume of semen. It’s essential for identifying low sperm count, poor motility, or abnormal sperm shapes.
        </div>
      </div>
    </div>

    <!-- Hormonal Testing -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hormonalTesting" aria-expanded="false" aria-controls="hormonalTesting">
          💉 Hormonal Testing
        </button>
      </h2>
      <div id="hormonalTesting" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#fertilityEvaluationAccordion">
        <div class="accordion-body">
          Blood tests evaluate levels of testosterone, FSH, LH, and other hormones. Imbalances can affect sperm production and sexual function, and are often treatable.
        </div>
      </div>
    </div>

    <!-- Physical Examination -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#physicalExam" aria-expanded="false" aria-controls="physicalExam">
          🩺 Physical Examination
        </button>
      </h2>
      <div id="physicalExam" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#fertilityEvaluationAccordion">
        <div class="accordion-body">
          The doctor examines the testicles, scrotum, and other physical features to detect issues like varicoceles or hormonal signs such as breast enlargement.
        </div>
      </div>
    </div>

    <!-- Scrotal Ultrasound -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#scrotalUltrasound" aria-expanded="false" aria-controls="scrotalUltrasound">
          📷 Scrotal Ultrasound
        </button>
      </h2>
      <div id="scrotalUltrasound" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#fertilityEvaluationAccordion">
        <div class="accordion-body">
          A painless imaging scan to detect blockages, varicoceles, or abnormal structures in the testicles or scrotum.
        </div>
      </div>
    </div>

    <!-- Genetic Testing -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#geneticTesting" aria-expanded="false" aria-controls="geneticTesting">
          🧬 Genetic Testing
        </button>
      </h2>
      <div id="geneticTesting" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#fertilityEvaluationAccordion">
        <div class="accordion-body">
          Recommended for very low sperm counts. It helps identify chromosomal or inherited issues and guides treatment or assisted reproduction decisions.
        </div>
      </div>
    </div>

    <!-- Testicular Biopsy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingSix">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#testicularBiopsy" aria-expanded="false" aria-controls="testicularBiopsy">
          🧫 Testicular Biopsy
        </button>
      </h2>
      <div id="testicularBiopsy" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#fertilityEvaluationAccordion">
        <div class="accordion-body">
          A small tissue sample is taken from the testicle to check for sperm production when sperm is absent in the ejaculate.
        </div>
      </div>
    </div>

    <!-- Urinalysis -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingSeven">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#urinalysis" aria-expanded="false" aria-controls="urinalysis">
          🚽 Urinalysis & Post-Ejaculatory Urine Test
        </button>
      </h2>
      <div id="urinalysis" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#fertilityEvaluationAccordion">
        <div class="accordion-body">
          These tests check for retrograde ejaculation or infections in the urinary or reproductive tract that can affect fertility.
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Bootstrap JS (for accordion functionality) -->

  <?php
  include "partials/footer.php";
  ?>



</body>


</html>

