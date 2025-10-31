<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Lifestle and Nutritional Counseling</title>
  <?php include "partials/header.php";  ?>
</head>

<body>
  <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

  <?php
  include "partials/navbar.php";
  ?>

  <section class="hero cardiology-cover margin-adjust">
    <div class="hero-content col-lg-6">

      <h1>Lifestle and Nutritional Counseling</h1>
    </div>

  </section>



  <!-- body  -->

<div class="container my-5">

  <div class="accordion" id="lifestyleAccordion">

    <!-- Diet and Nutrition -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="lifeHeadingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nutrition" aria-expanded="true" aria-controls="nutrition">
          🥦 Diet and Nutrition Planning
        </button>
      </h2>
      <div id="nutrition" class="accordion-collapse collapse show" aria-labelledby="lifeHeadingOne" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Tailored meal plans focused on antioxidant-rich foods and fertility-supportive nutrients like zinc, folate, and omega-3 fatty acids.
        </div>
      </div>
    </div>

    <!-- Weight Management -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="lifeHeadingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#weight" aria-expanded="false" aria-controls="weight">
          ⚖️ Weight Management
        </button>
      </h2>
      <div id="weight" class="accordion-collapse collapse" aria-labelledby="lifeHeadingTwo" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Maintaining a healthy weight helps regulate hormones like testosterone and improves overall sperm function.
        </div>
      </div>
    </div>

    <!-- Exercise Guidance -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="lifeHeadingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#exercise" aria-expanded="false" aria-controls="exercise">
          🏃 Exercise Guidance
        </button>
      </h2>
      <div id="exercise" class="accordion-collapse collapse" aria-labelledby="lifeHeadingThree" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Safe and effective exercise routines that support fertility without causing hormonal imbalance or oxidative stress.
        </div>
      </div>
    </div>

    <!-- Substance Abuse Counseling -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="lifeHeadingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#substance" aria-expanded="false" aria-controls="substance">
          🚭 Substance Abuse Counseling
        </button>
      </h2>
      <div id="substance" class="accordion-collapse collapse" aria-labelledby="lifeHeadingFour" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Guidance to eliminate smoking, alcohol, or drug use—all of which are proven to impair sperm health and reproductive function.
        </div>
      </div>
    </div>

    <!-- Stress Reduction -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="lifeHeadingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stress" aria-expanded="false" aria-controls="stress">
          🧘 Stress Reduction Techniques
        </button>
      </h2>
      <div id="stress" class="accordion-collapse collapse" aria-labelledby="lifeHeadingFive" data-bs-parent="#lifestyleAccordion">
        <div class="accordion-body">
          Tools like mindfulness, therapy, and lifestyle coaching to reduce stress and improve reproductive hormone regulation.
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

