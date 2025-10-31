<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Female surgical fertility treatment</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero female-fertlity-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Surgical Treatment</h1>
    </div>

  </section>



  <!-- body  -->
<div class="container my-5">

  <div class="accordion" id="surgicalTreatmentsAccordion">

    <!-- Laparoscopic Surgery -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#laparoscopy" aria-expanded="true" aria-controls="laparoscopy">
          🛠️ Laparoscopic Surgery
        </button>
      </h2>
      <div id="laparoscopy" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#surgicalTreatmentsAccordion">
        <div class="accordion-body">
          A minimally invasive surgery that allows treatment of endometriosis, adhesions, and fibroids through small abdominal incisions using a camera and surgical instruments.
        </div>
      </div>
    </div>

    <!-- Hysteroscopic Surgery -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hysteroscopy" aria-expanded="false" aria-controls="hysteroscopy">
          👁️ Hysteroscopic Surgery
        </button>
      </h2>
      <div id="hysteroscopy" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#surgicalTreatmentsAccordion">
        <div class="accordion-body">
          Performed through the vagina and cervix to treat intrauterine abnormalities like fibroids, polyps, or uterine septum without abdominal incisions.
        </div>
      </div>
    </div>

    <!-- Tubal Surgery -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tubalSurgery" aria-expanded="false" aria-controls="tubalSurgery">
          🔧 Tubal Surgery
        </button>
      </h2>
      <div id="tubalSurgery" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#surgicalTreatmentsAccordion">
        <div class="accordion-body">
          Used to correct or unblock fallopian tubes through tubal cannulation or reverse tubal ligation to restore natural fertility.
        </div>
      </div>
    </div>

    <!-- Ovarian Drilling -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ovarianDrilling" aria-expanded="false" aria-controls="ovarianDrilling">
          🔨 Ovarian Drilling (for PCOS)
        </button>
      </h2>
      <div id="ovarianDrilling" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#surgicalTreatmentsAccordion">
        <div class="accordion-body">
          A surgical procedure done via laparoscopy to puncture the ovaries and stimulate ovulation in women with PCOS who are resistant to medication.
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

