<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Management of Underlying Conditions</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Management of Underlying Conditions</h1>
    </div>

  </section>



  <!-- body  -->
<div class="container my-5">

  <div class="accordion" id="underlyingConditionsAccordion">

    <!-- PCOS -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pcos" aria-expanded="true" aria-controls="pcos">
          🧬 Polycystic Ovary Syndrome (PCOS)
        </button>
      </h2>
      <div id="pcos" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#underlyingConditionsAccordion">
        <div class="accordion-body">
          PCOS is a hormonal condition that affects ovulation and can cause irregular periods. Treatment may involve lifestyle changes, medications like metformin, and ovulation induction.
        </div>
      </div>
    </div>

    <!-- Endometriosis -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#endometriosis" aria-expanded="false" aria-controls="endometriosis">
          🔥 Endometriosis
        </button>
      </h2>
      <div id="endometriosis" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#underlyingConditionsAccordion">
        <div class="accordion-body">
          Endometriosis is treated with hormonal therapy, pain relief, or surgery depending on the severity and fertility goals.
        </div>
      </div>
    </div>

    <!-- Fibroids & Adenomyosis -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fibroids" aria-expanded="false" aria-controls="fibroids">
          🌿 Fibroids and Adenomyosis
        </button>
      </h2>
      <div id="fibroids" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#underlyingConditionsAccordion">
        <div class="accordion-body">
          These benign uterine growths can interfere with implantation or pregnancy. Treatment may include medical therapy, myomectomy, or uterine-sparing surgery.
        </div>
      </div>
    </div>

    <!-- Autoimmune Disorders -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#autoimmune" aria-expanded="false" aria-controls="autoimmune">
          🧪 Autoimmune or Genetic Disorders
        </button>
      </h2>
      <div id="autoimmune" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#underlyingConditionsAccordion">
        <div class="accordion-body">
          Includes conditions like thyroid autoimmunity or lupus that may impact fertility or pregnancy. Requires multidisciplinary care.
        </div>
      </div>
    </div>

    <!-- Menstrual Disorders -->
    <div class=





  <?php
  include "partials/footer.php";
  ?>



</body>


</html>

