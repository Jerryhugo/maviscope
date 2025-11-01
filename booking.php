<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Booking</title>
    <?php include "partials/header.php"; ?>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body>

    <?php include "partials/navbar.php" ?>

    <section class="hero appointment-cover margin-adjust">
        <div class="hero-content col-lg-6">

            <h1>Book Appointment</h1>


        </div>

    </section>
    <section class="py-5">
        <div class="container">

            <div class="row g-4">
                <!-- Service Item -->
                <div class="col-6" data-aos="fade-up" data-aos-duration="500">
                    <a href="inperson-booking.php" class="text-secondary">
                        <div class=" p-3 shadow d-flex justify-content-between align-items-center">
                            <div>
                                <h5>In-person Appointment</h5>
                                <small>Book a clinic visit</small>
                            </div>

                            <div class="service-icon mb-3">🧑‍🦱</div>
                        </div>
                    </a>

                </div>
                <!-- Repeat for more services -->
                <div class="col-6" data-aos="fade-up" data-aos-duration="500">
                    <a href="online-booking.php" class="text-secondary">
                        <div class="  p-3 shadow d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Online appointment</h5>
                                <small>Talk to a doctor online</small>
                            </div>

                            <div class="service-icon mb-3">🗓️</div>


                        </div>
                    </a>

                </div>


                <!-- Add more services as needed -->
            </div>
        </div>
    </section>


    <?php
    include "partials/footer.php";
    ?>


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

</body>

</html>