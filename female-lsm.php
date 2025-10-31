<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Lifestyle & Counseling Support</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero female-fertlity-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Lifestyle & Counseling Support</h1>
    </div>

  </section>



  <!-- body  -->
<div class="container my-5">

  <div class="accordion" id="lifestyleAccordion">

    <!-- Nutrition -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nutrition" aria-expanded="true" aria-controls="nutrition">
          🥗 Nutrition and Weight Counseling
        </button>
      </h2>
      <div id="nutrition" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Provides guidance on healthy eating and maintaining an ideal body weight, which can enhance fertility and balance hormones.
        </div>
      </div>
    </div>

    <!-- Psychological Counseling -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#psychological" aria-expanded="false" aria-controls="psychological">
          🧠 Fertility-Focused Psychological Counseling
        </button>
      </h2>
      <div id="psychological" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Offers emotional support and coping strategies for individuals and couples dealing with infertility and treatment-related stress.
        </div>
      </div>
    </div>

    <!-- Stress Management -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stress" aria-expanded="false" aria-controls="stress">
          🧘‍♀️ Stress Management Techniques
        </button>
      </h2>
      <div id="stress" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Incorporates mindfulness, meditation, yoga, and other techniques that may improve ovulatory function and emotional wellbeing.
        </div>
      </div>
    </div>

    <!-- Couples Therapy -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#couplesTherapy" aria-expanded="false" aria-controls="couplesTherapy">
          ❤️ Couples Therapy
        </button>
      </h2>
      <div id="couplesTherapy" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Helps couples strengthen communication, navigate infertility challenges, and maintain intimacy during the fertility journey.
        </div>
      </div>
    </div>

    <!-- Sexual Health Counseling -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading5">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sexualHealth" aria-expanded="false" aria-controls="sexualHealth">
          🌸 Sexual Health Counseling
        </button>
      </h2>
      <div id="sexualHealth" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Supports women and couples dealing with sexual dysfunction, pain, or psychological blocks that may affect conception.
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

