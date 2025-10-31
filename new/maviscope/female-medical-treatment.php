<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Female medical fertility treatment</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>medical Treatment</h1>
    </div>

  </section>



  <!-- body  -->

<div class="container my-5">

  <div class="accordion" id="medicalTreatmentsAccordion">

    <!-- Ovulation Induction -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ovulationInduction" aria-expanded="true" aria-controls="ovulationInduction">
          💊 Ovulation Induction (Clomiphene, Letrozole)
        </button>
      </h2>
      <div id="ovulationInduction" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#medicalTreatmentsAccordion">
        <div class="accordion-body">
          Stimulates the ovaries to release eggs in women who are not ovulating regularly, improving chances of conception.
        </div>
      </div>
    </div>

    <!-- Hormonal Therapy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hormonalTherapy" aria-expanded="false" aria-controls="hormonalTherapy">
          🧬 Hormonal Therapy
        </button>
      </h2>
      <div id="hormonalTherapy" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#medicalTreatmentsAccordion">
        <div class="accordion-body">
          Helps regulate menstrual cycles, support ovulation, and prepare the uterine lining for implantation.
        </div>
      </div>
    </div>

    <!-- PCOS or Hyperprolactinemia Management -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pcosTreatment" aria-expanded="false" aria-controls="pcosTreatment">
          ⚖️ PCOS or Hyperprolactinemia Management
        </button>
      </h2>
      <div id="pcosTreatment" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#medicalTreatmentsAccordion">
        <div class="accordion-body">
          Involves the use of medications to manage hormonal imbalance, regulate cycles, and improve ovulation in affected women.
        </div>
      </div>
    </div>

    <!-- Endometriosis or Fibroid Treatment -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#endometriosisFibroids" aria-expanded="false" aria-controls="endometriosisFibroids">
          🌼 Endometriosis or Uterine Fibroids Treatment
        </button>
      </h2>
      <div id="endometriosisFibroids" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#medicalTreatmentsAccordion">
        <div class="accordion-body">
          Hormonal medications may be used to shrink fibroids or suppress endometriosis growth, improving reproductive function.
        </div>
      </div>
    </div>

    <!-- Antibiotics for Infections -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading5">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#antibiotics" aria-expanded="false" aria-controls="antibiotics">
          💉 Antibiotics for Reproductive Tract Infections
        </button>
      </h2>
      <div id="antibiotics" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#medicalTreatmentsAccordion">
        <div class="accordion-body">
          Treats bacterial infections like pelvic inflammatory disease, which can harm reproductive organs if left untreated.
        </div>
      </div>
    </div>

    <!-- Thyroid or Prolactin Treatment -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading6">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#thyroidProlactin" aria-expanded="false" aria-controls="thyroidProlactin">
          🔄 Thyroid or Prolactin Disorder Treatment
        </button>
      </h2>
      <div id="thyroidProlactin" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#medicalTreatmentsAccordion">
        <div class="accordion-body">
          Medications help normalize thyroid hormone or prolactin levels to restore proper menstrual and ovulatory function.
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

