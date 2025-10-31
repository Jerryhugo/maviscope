<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Surgical treatment for male infertility</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero male-fertlity-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Surgical Treatment</h1>
    </div>

  </section>



  <!-- body  -->
<div class="container my-5">
 

  <div class="accordion" id="surgicalTreatmentAccordion">

    <!-- Varicocele Repair -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="surgHeadingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#varicoceleRepair" aria-expanded="true" aria-controls="varicoceleRepair">
          🩻 Varicocele Repair
        </button>
      </h2>
      <div id="varicoceleRepair" class="accordion-collapse collapse show" aria-labelledby="surgHeadingOne" data-bs-parent="#surgicalTreatmentAccordion">
        <div class="accordion-body">
          A surgical procedure to treat varicoceles—enlarged veins in the scrotum. This helps improve blood flow, reduce heat, and boost sperm production.
        </div>
      </div>
    </div>

    <!-- Vasectomy Reversal -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="surgHeadingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vasectomyReversal" aria-expanded="false" aria-controls="vasectomyReversal">
          🔄 Vasectomy Reversal (Vasovasostomy)
        </button>
      </h2>
      <div id="vasectomyReversal" class="accordion-collapse collapse" aria-labelledby="surgHeadingTwo" data-bs-parent="#surgicalTreatmentAccordion">
        <div class="accordion-body">
          This reconnects the vas deferens to restore sperm flow into the semen, allowing natural conception after a previous vasectomy.
        </div>
      </div>
    </div>

    <!-- Sperm Retrieval -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="surgHeadingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spermRetrieval" aria-expanded="false" aria-controls="spermRetrieval">
          🧫 Sperm Retrieval Techniques (TESA, PESA, MESA, Micro-TESE)
        </button>
      </h2>
      <div id="spermRetrieval" class="accordion-collapse collapse" aria-labelledby="surgHeadingThree" data-bs-parent="#surgicalTreatmentAccordion">
        <div class="accordion-body">
          These are minor procedures used to extract sperm directly from the testes or epididymis in men with no sperm in their semen. Sperm is then used for assisted reproduction.
        </div>
      </div>
    </div>

    <!-- Ejaculatory Duct Resection -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="surgHeadingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ductResection" aria-expanded="false" aria-controls="ductResection">
          ✂️ Ejaculatory Duct Resection
        </button>
      </h2>
      <div id="ductResection" class="accordion-collapse collapse" aria-labelledby="surgHeadingFour" data-bs-parent="#surgicalTreatmentAccordion">
        <div class="accordion-body">
          This procedure removes blockages in the ejaculatory ducts to allow semen and sperm to be properly ejaculated. It may restore fertility in certain cases of obstruction.
        </div>
      </div>
    </div>

    <!-- Urethral or Vas Deferens Reconstruction -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="surgHeadingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#reconstruction" aria-expanded="false" aria-controls="reconstruction">
          🛠️ Urethral or Vas Deferens Reconstruction
        </button>
      </h2>
      <div id="reconstruction" class="accordion-collapse collapse" aria-labelledby="surgHeadingFive" data-bs-parent="#surgicalTreatmentAccordion">
        <div class="accordion-body">
          Surgical reconstruction of blocked or damaged sperm pathways, often due to infections or trauma. It aims to restore natural sperm flow.
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

