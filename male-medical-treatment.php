<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Medical treatment for Male infertility</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero male-fertlity-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Medical Treatment</h1>
    </div>

  </section>



  <!-- body  -->
<div class="container my-5">


  <div class="accordion" id="medicalTreatmentAccordion">

    <!-- Hormonal Therapy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="medHeadingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#hormonalTherapy" aria-expanded="true" aria-controls="hormonalTherapy">
          💉 Hormonal Therapy
        </button>
      </h2>
      <div id="hormonalTherapy" class="accordion-collapse collapse show" aria-labelledby="medHeadingOne" data-bs-parent="#medicalTreatmentAccordion">
        <div class="accordion-body">
          Hormonal therapy is used to treat imbalances in testosterone, FSH, LH, or prolactin that affect sperm production and sexual health. It can stimulate the body to produce more sperm naturally.
        </div>
      </div>
    </div>

    <!-- Erectile Dysfunction or Ejaculatory Disorders -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="medHeadingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#edTreatment" aria-expanded="false" aria-controls="edTreatment">
          🧠 Erectile or Ejaculatory Disorder Treatment
        </button>
      </h2>
      <div id="edTreatment" class="accordion-collapse collapse" aria-labelledby="medHeadingTwo" data-bs-parent="#medicalTreatmentAccordion">
        <div class="accordion-body">
          Conditions like erectile dysfunction, premature ejaculation, and retrograde ejaculation can be treated with medication or behavioral therapy to restore normal sexual function.
        </div>
      </div>
    </div>

    <!-- Antibiotic Therapy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="medHeadingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#antibioticTherapy" aria-expanded="false" aria-controls="antibioticTherapy">
          💊 Antibiotic Therapy
        </button>
      </h2>
      <div id="antibioticTherapy" class="accordion-collapse collapse" aria-labelledby="medHeadingThree" data-bs-parent="#medicalTreatmentAccordion">
        <div class="accordion-body">
          If an infection is present in the prostate, testicles, or other parts of the reproductive system, antibiotics can help eliminate it and improve fertility outcomes.
        </div>
      </div>
    </div>

    <!-- Antioxidant Therapy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="medHeadingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#antioxidantTherapy" aria-expanded="false" aria-controls="antioxidantTherapy">
          🍊 Antioxidant Therapy
        </button>
      </h2>
      <div id="antioxidantTherapy" class="accordion-collapse collapse" aria-labelledby="medHeadingFour" data-bs-parent="#medicalTreatmentAccordion">
        <div class="accordion-body">
          Antioxidants such as Vitamin C, Vitamin E, and zinc are used to reduce oxidative stress, which can damage sperm and lower fertility. These supplements may improve sperm quality over time.
        </div>
      </div>
    </div>

    <!-- Varicocele-Related Medication -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="medHeadingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#varicoceleMed" aria-expanded="false" aria-controls="varicoceleMed">
          🩺 Medication for Varicocele-related Sperm Issues
        </button>
      </h2>
      <div id="varicoceleMed" class="accordion-collapse collapse" aria-labelledby="medHeadingFive" data-bs-parent="#medicalTreatmentAccordion">
        <div class="accordion-body">
          In some cases, medications are used to support sperm quality before or after surgical correction of varicoceles, which are enlarged veins that impair testicular function.
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

