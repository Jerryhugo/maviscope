<?php
require "admin/conn.php";
session_start();
if(!isset($_SESSION['agreement'])){
    header("location: online-booking-terms-and-condition.php");
    
}else {
    unset($_SESSION['agreement']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online appointment booking</title>

    <?php include "partials/header.php"; ?>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <script src="https://checkout.flutterwave.com/v3.js"></script>

</head>

<body>

    <?php include "partials/navbar.php" ?>

    <section class="hero appointment-cover margin-adjust">
        <div class="hero-content col-lg-6">

            <h1>Online Appointment booking</h1>


        </div>

    </section>

    <section class="my-5 p-4">
        <form class="booking-form" action="payment.php" method="POST">
            <h1 class="my-4">
                Book Online Appointment
            </h1>
            <div class="row">
                <div class="col-lg-6">
                    <label class="mt-2 " for="firstname"><b>First Name</b></label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>

                <div class="col-lg-6">
                    <label class="mt-2 " for="last-name"><b>Last Name</b></label>
                    <input type="text" name="lastname" id="firstname" required>
                </div>



            </div>


            <div class="row">
                <div class="col-lg-6">

                    <label class="mt-2" for="phone"><b>Phone</b></label>
                    <input type="text" name="phone" id="phone" required>
                </div>
                <div class="col-lg-6">
                    <label class="mt-2" for="email"><b>Email</b></label>
                    <input type="text" name="email" id="email" required>
                </div>

            </div>

            <!-- <div class="row">
                <div class="col-lg-6">
                    <label class="mt-2" for="date"><b>Preferred date</b></label>
                    <input type="date" name="date" id="date" required  min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col-lg-6">
                    <label class="mt-2" for="time"><b>Preferrd time</b></label>
                    <input type="time" name="time" id="time" value="09:00" min="9:00" max="16:00" required>
                </div>

            </div> -->

            <div class="row">
                <div class="col">
                    <label class="mt-2" for="department"><b>Select Department:</b></label>
                    <select id="department" name="department" required>
                        <option value="">-- Select --</option>
                        <option value="obgyn">Obstetric and Gynecology</option>
                        <option value="fertility">Fertility</option>
                        <option value="medicine">General Medicine</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="surgery">surgery</option>
                        <option value="ophthalmology">ophthalmology</option>
                        <option value="neurology">Neurology</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="neurology">physiotherapy</option>
                        <option value="radiology">Radiology</option>
                        <option value="urology">Urology</option>
                        <option value="gastroenterology">Gastroenterology</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div id="childrenField" style="display: none;">
                    <label class="mt-2" for="children"><b>Number of children</b></label>
                    <input type="text" name="children" id="children">
                </div>
            </div>




            <label class="mt-2" for="reasonForAppointment"><b>Reason for appointment</b></label>
            <textarea rows="5" name="reason" id="reasonForAppointment" required></textarea>

            <button class="btn btn-light-red" type="submit">Book appointment</button>
        </form>
    </section>


    <footer class="mt-5">
        <div>
            <h5 class="my-4">Location</h5>
            <!-- <div class="location-btn">

                <a class="btn active px-4 py-2" href="#">Benin 1</a>
                <a href="#" class="btn mx-4 px-4 py-2 inactive">Benin 2</a>
            </div> -->
        </div>
        <div class="row">

            <div class="col-lg-4">


                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126909.91038281855!2d5.551136052637858!3d6.272317564937927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x1040d147bc711c2f%3A0x4a3d5e4db4723c6c!2s2-5%20Oseghae%20Street%2C%20after%20Agip%20Junction%2C%20off%2C%20Km6%20Benin%20Sapele%20Rd%2C%20Oka%2C%20Benin%20City!3m2!1d6.272323999999999!2d5.633538!5e0!3m2!1sen!2sng!4v1741047499408!5m2!1sen!2sng"
                        width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="info">
                    <div class="address d-flex">
                        <i class="fas my-1 fa-map-marker-alt"></i>
                        <p>3/5, Simeon Osaghae Way, Off Sapele Road KM 6, Agip junction before Rain oil, Benin City, Edo
                            State, Nigeria</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 my-4">
                <h5>Contact</h5>
                <div class="email d-flex">
                    <i class="my-1 fas fa-envelope"></i>
                    <p>info@maviscopefertilityhospital.com</p>
                </div>
                <div class="phone d-flex">
                    <i class="my-1 fas fa-phone-alt"></i>
                    <p>+2347038538424, +2347026337952 </p>
                </div>
            </div>

            <div class="col-lg-2 my-4">
                <h5>Menu</h5>
                <div class="link"><i class="fas fa-chevron-right"></i><a href="#">Home</a></div>
                <div class="link"><i class="fas fa-chevron-right"></i><a href="#">About</a></div>
                <div class="link"><i class="fas fa-chevron-right"></i><a href="#">Services</a></div>
                <div class="link"><i class="fas fa-chevron-right"></i><a href="#">Team</a></div>
                <div class="link"><i class="fas fa-chevron-right"></i><a href="#">Forum</a></div>
                <div class="link"><i class="fas fa-chevron-right"></i><a href="#">Blog</a></div>
            </div>


            <div class="col-lg-3 my-4  ">
                <h5>Socials</h5>
                <div class="d-fle">
                    <a href="#" class="fab fa-2x fa-facebook-f"></a>
                    <a href="#" class="fab fa-2x mx-4 fa-youtube-square"></a>
                    <a href="#" class="fab fa-2x fa-instagram"></a>
                </div>



            </div>
        </div>


        <?php
        include "partials/footer.php";
        ?>

        <!-- <script src="js/payment.js"></script> -->


        <!-- <script>
            makePayment("okpujeremiah2@gmail.com");
        </script> -->

        <script>
            const specialtiesSelect = document.getElementById('department');




            const childrenField = document.getElementById('childrenField');

            specialtiesSelect.addEventListener('change', () => {
                const selectedOptions = Array.from(specialtiesSelect.selectedOptions).map(option => option.value);

                if (selectedOptions.includes('obgyn')) {
                    childrenField.style.display = 'block';
                } else {
                    childrenField.style.display = 'none';
                }
            });

            const btn = document.querySelectorAll(".complete-btn");

            btn.forEach(function (e) {
                e.addEventListener("click", function () {
                    alert("i got clicked");
                })
            })


            // document.addEventListener("DOMContentLoaded", function() {
            //     let timeInput = document.getElementById("time");

            //     timeInput.addEventListener("input", function() {
            //         let timeValue = this.value;
            //         let [hours, minutes] = timeValue.split(":").map(Number);

            // Check if selected time is outside 9 AM - 4 PM
            //     if (hours < 9 || hours > 16) {
            //         alert("Please select a time between 9 AM and 4 PM.");
            //         this.value = ""; // Reset invalid input
            //     }
            // });

            // Restrict selectable times dynamically
            //     timeInput.addEventListener("focus", function() {
            //         this.setAttribute("min", "09:00");
            //         this.setAttribute("max", "16:00");
            //     });
            // });
        </script>
        <!-- Flutterwave JS -->


</body>

</html>