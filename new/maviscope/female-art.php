<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Female ART</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Assisted Reproductive Technique</h1>
    </div>

  </section>



  <!-- body  -->

<div class="container my-5">

  <div class="accordion" id="artAccordion">

    <!-- IVF -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ivf" aria-expanded="true" aria-controls="ivf">
          🧪 In Vitro Fertilization (IVF)
        </button>
      </h2>
      <div id="ivf" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          Eggs are retrieved from the ovaries, fertilized in a lab, and transferred back into the uterus to achieve pregnancy.
        </div>
      </div>
    </div>

    <!-- IUI -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#iui" aria-expanded="false" aria-controls="iui">
          💉 Intrauterine Insemination (IUI)
        </button>
      </h2>
      <div id="iui" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          Sperm is specially prepared and directly inserted into the uterus during ovulation to enhance chances of fertilization.
        </div>
      </div>
    </div>

    <!-- ICSI -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#icsi" aria-expanded="false" aria-controls="icsi">
          🧫 Intracytoplasmic Sperm Injection (ICSI)
        </button>
      </h2>
      <div id="icsi" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          A highly specialized technique where a single sperm is injected directly into an egg to promote fertilization.
        </div>
      </div>
    </div>

    <!-- Egg Retrieval and Embryo Transfer -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#embryoTransfer" aria-expanded="false" aria-controls="embryoTransfer">
          🎯 Egg Retrieval and Embryo Transfer
        </button>
      </h2>
      <div id="embryoTransfer" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          Involves collecting mature eggs, fertilizing them, and transferring selected embryos into the uterus.
        </div>
      </div>
    </div>

    <!-- Embryo Freezing -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading5">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#embryoFreezing" aria-expanded="false" aria-controls="embryoFreezing">
          ❄️ Embryo Freezing (Cryopreservation)
        </button>
      </h2>
      <div id="embryoFreezing" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          High-quality embryos can be frozen and stored for future IVF cycles, offering flexibility and cost savings.
        </div>
      </div>
    </div>

    <!-- Egg Donation -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading6">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#eggDonation" aria-expanded="false" aria-controls="eggDonation">
          🥚 Oocyte (Egg) Donation and Recipient Cycles
        </button>
      </h2>
      <div id="eggDonation" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          Donor eggs are fertilized and transferred to recipients – an option for women with poor egg quality or premature ovarian failure.
        </div>
      </div>
    </div>

    <!-- Surrogacy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading7">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#surrogacy" aria-expanded="false" aria-controls="surrogacy">
          👶 Gestational Surrogacy Support
        </button>
      </h2>
      <div id="surrogacy" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          IVF embryos are implanted into a surrogate who carries the pregnancy, often used when the mother cannot carry a baby herself.
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

