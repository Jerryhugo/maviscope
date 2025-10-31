<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ART for male infertility</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero male-fertlity-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Assisted Reproductive Techniques (ARTs)</h1>
    </div>

  </section>



  <!-- body  -->

<div class="container my-5">
  

  <div class="accordion" id="artAccordion">

    <!-- IVF -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="artHeadingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ivf" aria-expanded="true" aria-controls="ivf">
          🧫 In Vitro Fertilization (IVF)
        </button>
      </h2>
      <div id="ivf" class="accordion-collapse collapse show" aria-labelledby="artHeadingOne" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          IVF involves combining sperm and egg in a laboratory to form an embryo. The embryo is then transferred into the uterus to initiate pregnancy.
        </div>
      </div>
    </div>

    <!-- ICSI -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="artHeadingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#icsi" aria-expanded="false" aria-controls="icsi">
          🧬 Intracytoplasmic Sperm Injection (ICSI)
        </button>
      </h2>
      <div id="icsi" class="accordion-collapse collapse" aria-labelledby="artHeadingTwo" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          ICSI is a highly specialized technique where a single sperm is injected directly into an egg to achieve fertilization. Often used in severe male factor infertility.
        </div>
      </div>
    </div>

    <!-- IUI -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="artHeadingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#iui" aria-expanded="false" aria-controls="iui">
          🧻 Intrauterine Insemination (IUI)
        </button>
      </h2>
      <div id="iui" class="accordion-collapse collapse" aria-labelledby="artHeadingThree" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          IUI involves placing washed and concentrated sperm directly into the uterus during ovulation to increase the chance of fertilization.
        </div>
      </div>
    </div>

    <!-- Sperm Freezing -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="artHeadingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spermFreezing" aria-expanded="false" aria-controls="spermFreezing">
          ❄️ Sperm Freezing (Cryopreservation)
        </button>
      </h2>
      <div id="spermFreezing" class="accordion-collapse collapse" aria-labelledby="artHeadingFour" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          Sperm freezing allows men to preserve their fertility by storing sperm long-term, typically used before surgeries or treatments like chemotherapy.
        </div>
      </div>
    </div>

    <!-- Donor Sperm -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="artHeadingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#donorSperm" aria-expanded="false" aria-controls="donorSperm">
          👤 Donor Sperm Use
        </button>
      </h2>
      <div id="donorSperm" class="accordion-collapse collapse" aria-labelledby="artHeadingFive" data-bs-parent="#artAccordion">
        <div class="accordion-body">
          When a man's sperm is unavailable or non-viable, donor sperm can be used for conception via IVF or IUI, ensuring safe and successful pregnancy outcomes.
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

