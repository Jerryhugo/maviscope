<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Female fertility evaluation</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Fertility Evaluation and Diagnosis</h1>
    </div>

  </section>



  <!-- body  -->

<div class="container my-5">

  <div class="accordion" id="femaleFertilityAccordion">

    <!-- Pelvic Ultrasound -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pelvicUltrasound" aria-expanded="true" aria-controls="pelvicUltrasound">
          🩻 Pelvic Ultrasound
        </button>
      </h2>
      <div id="pelvicUltrasound" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#femaleFertilityAccordion">
        <div class="accordion-body">
          Used to assess uterine and ovarian structure, detect fibroids, cysts, or abnormal growths.
        </div>
      </div>
    </div>

    <!-- Transvaginal Ultrasound -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transvaginalUltrasound" aria-expanded="false" aria-controls="transvaginalUltrasound">
          🧿 Transvaginal Ultrasound
        </button>
      </h2>
      <div id="transvaginalUltrasound" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#femaleFertilityAccordion">
        <div class="accordion-body">
          Offers high-resolution images of the ovaries and endometrium to evaluate follicles and lining thickness.
        </div>
      </div>
    </div>

    <!-- Hormonal Tests -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hormonalTests" aria-expanded="false" aria-controls="hormonalTests">
          💉 Hormonal Blood Tests
        </button>
      </h2>
      <div id="hormonalTests" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#femaleFertilityAccordion">
        <div class="accordion-body">
          Tests such as FSH, LH, AMH, prolactin, and thyroid hormones give insights into ovulation and ovarian reserve.
        </div>
      </div>
    </div>

    <!-- HSG -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hsg" aria-expanded="false" aria-controls="hsg">
          🌈 Hysterosalpingography (HSG)
        </button>
      </h2>
      <div id="hsg" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#femaleFertilityAccordion">
        <div class="accordion-body">
          A dye-based X-ray used to check for blockages in fallopian tubes and uterine abnormalities.
        </div>
      </div>
    </div>

    <!-- Sonohysterography -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading5">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sonohysterography" aria-expanded="false" aria-controls="sonohysterography">
          🌀 Sonohysterography
        </button>
      </h2>
      <div id="sonohysterography" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#femaleFertilityAccordion">
        <div class="accordion-body">
          A saline-infusion ultrasound that provides a clearer view of the uterine cavity, useful for detecting polyps or fibroids.
        </div>
      </div>
    </div>

    <!-- Endometrial Biopsy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading6">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#biopsy" aria-expanded="false" aria-controls="biopsy">
          🔬 Endometrial Biopsy
        </button>
      </h2>
      <div id="biopsy" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#femaleFertilityAccordion">
        <div class="accordion-body">
          A small tissue sample is taken from the uterine lining to evaluate inflammation or hormonal responsiveness.
        </div>
      </div>
    </div>

    <!-- Ovulation Tracking -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading7">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ovulationTracking" aria-expanded="false" aria-controls="ovulationTracking">
          📈 Ovulation Tracking & Predictor Tests
        </button>
      </h2>
      <div id="ovulationTracking" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#femaleFertilityAccordion">
        <div class="accordion-body">
          Uses tools like ovulation kits and progesterone tests to confirm if and when ovulation occurs.
        </div>
      </div>
    </div>

    <!-- Laparoscopy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading8">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#laparoscopy" aria-expanded="false" aria-controls="laparoscopy">
          🔍 Diagnostic Laparoscopy
        </button>
      </h2>
      <div id="laparoscopy" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#femaleFertilityAccordion">
        <div class="accordion-body">
          A keyhole procedure used to visually inspect pelvic organs for conditions like endometriosis or adhesions.
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

