<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sperm Banking / Cryopreservation</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Sperm Banking / Cryopreservation</h1>
    </div>

  </section>



  <!-- body  -->

<div class="container my-5">

  <div class="accordion" id="spermBankAccordion">

    <!-- Sperm Collection -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="spermHeadingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collection" aria-expanded="true" aria-controls="collection">
          🧪 Sperm Collection and Testing
        </button>
      </h2>
      <div id="collection" class="accordion-collapse collapse show" aria-labelledby="spermHeadingOne" data-bs-parent="#spermBankAccordion">
        <div class="accordion-body">
          Semen is collected either in a clinic or at home, then analyzed for key parameters such as count, motility, and morphology before cryopreservation.
        </div>
      </div>
    </div>

    <!-- Cryopreservation Process -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="spermHeadingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#freezing" aria-expanded="false" aria-controls="freezing">
          ❄️ Cryopreservation Process
        </button>
      </h2>
      <div id="freezing" class="accordion-collapse collapse" aria-labelledby="spermHeadingTwo" data-bs-parent="#spermBankAccordion">
        <div class="accordion-body">
          The semen is combined with a protective solution and slowly frozen using specialized protocols before long-term storage in liquid nitrogen tanks.
        </div>
      </div>
    </div>

    <!-- Storage and Duration -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="spermHeadingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#storage" aria-expanded="false" aria-controls="storage">
          🗄️ Storage and Duration
        </button>
      </h2>
      <div id="storage" class="accordion-collapse collapse" aria-labelledby="spermHeadingThree" data-bs-parent="#spermBankAccordion">
        <div class="accordion-body">
          Frozen sperm can be stored for over a decade while maintaining its viability, giving patients flexibility for future family planning.
        </div>
      </div>
    </div>

    <!-- Indications for Banking -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="spermHeadingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#indications" aria-expanded="false" aria-controls="indications">
          🩺 Indications for Sperm Banking
        </button>
      </h2>
      <div id="indications" class="accordion-collapse collapse" aria-labelledby="spermHeadingFour" data-bs-parent="#spermBankAccordion">
        <div class="accordion-body">
          Ideal for men undergoing chemotherapy, radiation, surgery, or hormone therapy, as well as those in hazardous occupations or planning a vasectomy.
        </div>
      </div>
    </div>

    <!-- Usage in Treatment -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="spermHeadingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#usage" aria-expanded="false" aria-controls="usage">
          🧬 Usage in Future Treatments
        </button>
      </h2>
      <div id="usage" class="accordion-collapse collapse" aria-labelledby="spermHeadingFive" data-bs-parent="#spermBankAccordion">
        <div class="accordion-body">
          Banked sperm can be thawed and used in assisted reproductive procedures like IUI, IVF, or ICSI depending on fertility goals and medical indications.
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

