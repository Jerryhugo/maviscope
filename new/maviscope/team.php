<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Our Team</title>
        <?php include "partials/header.php"; ?>

  <style>
        
        html {
          scroll-behavior: smooth;
        }
    </style>
        
</head>
    <body>
        <a data-aos="fade-up" data-aos-duration="2000" class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>
<?php
include "partials/navbar.php";
?>

<section    class="hero team-cover margin-adjust">
    <div  class="hero-content col-lg-6">
        
            <h1 >Our Team</h1>
           
       
    </div>
 
</section>

<section  id="all-team">
    <h1 >Our Team</h1>
    <div  class="row">
        <div  class="team col-lg-4">
           
            <div  class="team-inner">
                <img class="decor" src="img/curved-line-light.svg" alt="curved line">
                <!-- <img class="member" src="img/sleeping-baby.jpg" alt="team image"> -->
                <div class="">
                    <h4>Dr. Jeremiah Asogun</h4>
                    <p>Consultant obstetric and gynecology</p>
                    
                </div>
               <a href="#" class="color-red"><b>Read More</b></a>
            
            </div>
       
        </div>
        <div  class=" team col-lg-4">
            <div  class="team-inner ">
                <img class="decor" src="img/curved-line-light.svg" alt="curved line">
                <!-- <img class="member" src="img/sleeping-baby.jpg" alt="team image"> -->
                <div class="">
                    <h4>Dr. John Doe</h4>
                    <p>Consultant Respiratologist</p>
                    
                </div>
                <a href="#" class="color-red"><b>Read More</b></a>
            </div>
         
        </div>
        <div  class="team col-lg-4">
            <div  class="team-inner">
                <img class="decor" src="img/curved-line-light.svg" alt="curved line">
                <!-- <img class="member" src="img/sleeping-baby.jpg" alt="team image"> -->
                <div class="">
                    <h4>Dr. Abel Daniel</h4>
                    <p>Consultant Cardiologist</p>
                    
                </div>
                <a href="#" class="color-red"><b>Read More</b></a>
            </div>
         
        </div>
    </div>
   
 </section>
    
<?php
include "partials/footer.php";
?>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow.min.js"></script>
  <script src="lib/easing.min.js"></script>
  <script src="lib/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/parallax.min.js"></script>
<script src="js/navControl.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
        AOS.init();
      </script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
        
    </body>

    </html>