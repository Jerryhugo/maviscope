<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Egg freezing</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Egg Freezing/Cryopreservation</h1>
    </div>

  </section>



  <!-- body  -->

<div class="container my-5">

  <div class="accordion" id="cryopreservationAccordion">

    <!-- Egg Freezing -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#eggFreezing" aria-expanded="true" aria-controls="eggFreezing">
          🧊 Egg Freezing for Fertility Preservation
        </button>
      </h2>
      <div id="eggFreezing" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#cryopreservationAccordion">
        <div class="accordion-body">
          A procedure that retrieves and freezes a woman’s unfertilized eggs for use in the future. Common among women who wish to delay childbearing or are undergoing treatments like chemotherapy.
        </div>
      </div>
    </div>

    <!-- Embryo Freezing -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#embryoFreezing" aria-expanded="false" aria-controls="embryoFreezing">
          ❄️ Embryo Freezing for Future IVF
        </button>
      </h2>
      <div id="embryoFreezing" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#cryopreservationAccordion">
        <div class="accordion-body">
          Fertilized embryos from an IVF cycle are frozen and preserved for later use. This reduces the need for repeat IVF cycles and allows family planning flexibility.
        </div>
      </div>
    </div>

    <!-- Ovarian Tissue Preservation -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ovarianTissue" aria-expanded="false" aria-controls="ovarianTissue">
          🧬 Ovarian Tissue Preservation
        </button>
      </h2>
      <div id="ovarianTissue" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#cryopreservationAccordion">
        <div class="accordion-body">
          Involves removing and freezing ovarian tissue for future use. It's an experimental but promising option for preserving fertility, especially in young girls or cancer patients.
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

