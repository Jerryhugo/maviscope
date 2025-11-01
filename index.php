<?php



require "admin/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Capture form data
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $time = trim($_POST['time'] ?? '');
    $department = trim($_POST['department'] ?? '');
    $children = trim($_POST['children'] ?? '-');  // Default to '-' if children is not provided
    $reason = trim($_POST['reason'] ?? '');

    // SQL Insert Query
    $sql = "INSERT INTO specialties (firstname, lastname, phone, email, date, time, department, children, reason) 
    VALUES (:firstname, :lastname, :phone, :email, :date, :time, :department, :children, :reason)";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':children', $children);
        $stmt->bindParam(':reason', $reason);

        $stmt->execute();

        $to = $email; // Recipient email address
        $subject = "Appointment confirmation"; // Email subject
        $message = "We are please to inform you that your appointment has been scheduled on the " . " " . $date; // Email body
        $headers = "From: info@maviscopehospital.com"; // Sender email address

        // Send the email
        mail($to, $subject, $message, $headers);


        echo "<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: 'Success!',
        text: 'You have successfully scheduled an appointment. You will recieve an mail shortly.',
        icon: 'success',
        confirmButtonText: 'OK'
    })
});
</script>";
    } catch (PDOException $e) {
        echo "<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: 'Error!',
        text: '" . $e->getMessage() . "',
        icon: 'error',
        confirmButtonText: 'OK'
    });
});
</script>";
        // echo "Error inserting record: " . $e->getMessage();
    }



    // This block will only run if the form was submitted via POST
}

$stmt = $pdo->query("SELECT * FROM events WHERE event_state = 1 ORDER BY event_id DESC LIMIT 1");
$event = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Maviscope Hospital</title>
    <?php include "partials/header.php" ?>



    <style>
        .more-text {
            display: none;
            /* Hide extra text initially */
        }

        html {
            scroll-behavior: smooth;
        }

        /* Popup overlay */
        .popup-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: 0.4s ease;
            z-index: 1000;
        }

        .popup-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Popup box */
        .popup-box {
            background: #fff;
            /*border-radius: 16px;*/
            width: 90%;
            max-width: 420px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            animation: fadeIn 0.4s ease;
            position: relative;
        }

        @keyframes fadeIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .popup-box img {
            width: 100%;


            object-fit: cover;
        }

        .popup-content {
            padding: 18px;
            text-align: center;
        }

        .popup-content p {
            color: #555;
            font-size: 0.95rem;
            margin: 10px 0 15px;
        }

        .popup-content .hidden-details {
            display: none;
            text-align: left;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            margin-top: 8px;
            font-size: 0.9rem;
            color: #444;
        }

        .popup-content .hidden-details.active {
            display: block;
        }

        .popup-btn {
            background: linear-gradient(135deg, #007bff, #00b4d8);
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .popup-btn:hover {
            transform: scale(1.05);
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 22px;
            color: white;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 50%;
            width: 28px;
            height: 28px;
            line-height: 26px;
            text-align: center;
            cursor: pointer;
        }
    </style>



</head>

<body class="">

    <a class="btn  btn-booking fixed" href="booking.php">Book Appointment</a>

    <?php
    include "partials/navbar.php";

    ?>

    <section data-aos="fade-up" data-aos-duration="500" class="hero hero-cover">
        <div class="hero-content col-lg-6">


            <h1>Explore Fertility Solutions</h1>
            <p class="text-white">Your journey to parenthood starts here. Let's guide you through the process.</p>
            <a href="booking.php" class="btn btn-booking ">Book Appointment</a>
        </div>
        <!-- <div class="carousel-indicators">
            <span class="indicator activated" data-slide-to="0"></span>
            <span class="indicator" data-slide-to="1"></span>
            <span class="indicator" data-slide-to="2"></span>
        </div> -->

    </section>


    <section id="about" class="my-5" data-aos="fade-up" data-aos-duration="500">
        <div class="row">
            <div class="col-md-6">
                <img src="img/about-us-img.jpg" alt="About us image">
            </div>

            <div class="col-md-6">
                <img class="design" src="img/curved-right-down.svg" alt="curve dark">
                <h1>About</h1>
                <p class="mobile-text">At Maviscope Hospital and Fertility center, we are proud to be the best fertility
                    center in Benin City and one of the top fertility hospitals in Nigeria </p>

                <p class="desktop-text">At Maviscope Hospital and Fertility Centre, we are proud to be the best
                    fertility center in Benin City and one of the top fertility hospitals in Nigeria. We are committed
                    to helping individuals and couples achieve their dream of parenthood through world-class
                    reproductive treatments. <br> <br>

                    Our cutting-edge fertility services combine medical expertise with advanced technology to offer
                    personalized and effective care. The Best Fertility Services in Benin City and Nigeria... </p>
                <a href="about.php" class="btn btn-blue">Learn More</a>
            </div>


        </div>

    </section>


    <section id="fertility-features" class="mx-4 my-5 rounded p-5" data-aos="fade-up" data-aos-duration="500">
        <div class="row ">
            <h1 class="my-3 px-0 text-light">Explore Fertility Solutions</h1>
            <a href="male-fertility.php"
                class="col-lg-3 col-5 d-flex justify-content-between align-items-center hallow rounded p-4">
                <h5>Male </h5>
                <i class="fas fa-mars fa-2x"></i>
            </a>

            <a href="female-fertility.php"
                class="col-lg-3 mx-3 col-5 d-flex justify-content-between align-items-center hallow rounded p-4">
                <h5>Female </h5>
                <i class="fas fa-venus fa-2x"></i>
            </a>

        </div>
    </section>

    <section id="ivf" class="my-5" data-aos="fade-up" data-aos-duration="500">
        <h1 class="mobile">Are you <br> considering <br> IVF</h1>
        <h1 class="desktop">Are you considering IVF</h1>
        <a href="about-ivf.php" class="btn btn-light-red">Learn More</a>
    </section>

    <!-- <section id="fertility-services mt-5">
        <h1>Fertility Services</h1>
        <div class="row">
            <div class="male d-flex justify-content-between col-md-6 rounded">
                <p>Male fertility</p>
                <i class="fas fa-male fa-2x"></i>
            </div>
            <div class="female d-flex justify-content-between col-md-6 rounded">
                <p>Female Fertility</p>
                <i class="fas fa-female fa-2x"></i>
            </div>
        </div>

    </section> -->

    <section id="services" class="my-5">
        <h1>Our Services</h1>
        <!-- <img src="img/services.jpg" alt="Image representing service section">
        <p>
            We offer comprehensive healthcare for all ages. Your Health, Our Priority!
        </p>
        <p>
            From routine check-ups to specialized care, we offer healthcare solutions for every member of your familty
        </p>
        <p>
            Our dedicated team is here to support your health at every stage of life.
        </p> -->

        <div class="row">

            <div class="  col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500">
                <a href="#">
                    <div class="services-cover">
                        <a href="OnG-service.php">
                            <img src="img/ong.jpg" alt="Obstetrics and gynaecology">
                            <div class="d-flex  align-items-center">
                                <h5 class="services-text m-0">Obstetrics And gynaecology</h5>
                                <i class="mx-4 fas fa-chevron-right"></i>
                            </div>

                        </a>
                    </div>
                </a>



            </div>


            <div class="  col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500">
                <a href="surgery.php">
                    <div class="services-cover">
                        <img src="img/surgery-1.jpg" alt="surgery">
                        <div class="d-flex align-items-center">
                            <h5 class="services-text m-0">Surgery</h5>
                            <i class="mx-4 fas fa-chevron-right"></i>
                        </div>

                    </div>
                </a>


            </div>
            <div class=" col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500">
                <a href="medicine.php">
                    <div class="services-cover">
                        <img src="img/medicine.jpg" alt="Medicine">
                        <div class="d-flex align-items-center">
                            <h5 class="services-text m-0">General Medicine</h5>
                            <i class="mx-4 fas fa-chevron-right"></i>
                        </div>

                    </div>
                </a>


            </div>
            <div class=" col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500">
                <a href="pediatrics.php">
                    <div class="services-cover">
                        <img src="img/pediatrics.jpg" alt="Nicu">
                        <div class="d-flex align-items-center">
                            <h5 class="services-text m-0">Pediatrics</h5>
                            <i class="mx-4 fas fa-chevron-right"></i>
                        </div>

                    </div>
                </a>


            </div>
            <!-- <div  class="  col-md-6 col-lg-4">
                <a href="#">
                    <div class="services-cover">
                        <img src="img/pedo.jpg" alt="Pediatrics">
                        <div class="d-flex align-items-center">
                            <h5 class="services-text m-0">Pediatrics</h5>
                            <i class="mx-4 fas fa-chevron-right"></i>
                            
                        </div>
                        
                    </div>
                </a>
             
 
            </div>
             
            <div class=" col-md-6 col-lg-4">
                <div class="services-cover">
                    <img src="img/surgery.jpg" alt="Surgery">
                    <div class="d-flex align-items-center">
                        <h5 class="services-text m-0">Surgery</h5>
                        <i class="mx-4 fas fa-chevron-right"></i>
                    </div>
                   
                </div>
              
         
            </div>
         
            <div  class=" col-md-6 col-lg-4">
                <div class="services-cover">
                    <img src="img/radiology.jpg" alt="radiology">
                    <div class="d-flex align-items-center">
                        <h5 class="services-text m-0">radiology</h5>
                        <i class="mx-4 fas fa-chevron-right"></i>
                    </div>
                   
                </div>
             
            </div> -->

        </div>


        <a href="services.php" class="btn btn-light-red" data-aos="fade-up" data-aos-duration="500">View All
            services</a>
    </section>

    <section id="testimonial" class="my-5" data-aos="fade-up" data-aos-duration="500">
        <img id="balls" src="img/design balls.svg" alt="">
        <h1 class="text-white px-2 mt-4">What Our Patients Are Saying</h1>
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swipper swiper-wrapper my-4">
                <!-- Slides -->
                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2 rounded p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">My cousin and I have being there and God use MAVISCOPE HOSPITAL AND
                            FERTILITY CENTER to answer her prayers today she is a happy woman God bless you sir and your
                            team.</p>
                        <!-- <h6><b>Mrs. Stella Eboh</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i> 

                    </div>


                </div>

                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2 rounded p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">One of the best gynecological hospital in Edo state, guiding women through
                            safemother hood, reducing maternal and neonatal mortality. It should be your first choice
                            when it comes to health.</p>
                        <!-- <h6><b>Faith Omavuaye</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div>

                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2  rounded p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">The best hospital to run to while having any health issues... A place where
                            u can get d Best IVF and Endoscopic surgery in benin city</p>
                        <!-- <h6><b>Inu Winners</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div>

                <!-- <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white rounded p-4 text-center">

                        <img src="img/about-ivf-2.jpg" alt="img">
                        <p class="mt-3 mb-2">I am so grateful to DR EBOH IDEMUDIA and his team. if not for them, I would never been called a mother, I love the fact that DR EBOH and his staffs really keep an eye on you to make sure your pregnancy is progressing in the way it should be, I was pleased with the care and compassion that I received from their IVF hospital. I definitely will be returning when am ready for my second child. THERE IS NO BARRENNESS IN THE HOUSE OF MAVISCOPE</p>
                        <h6><b>Nasirat osamudiamen Azeez</b></h6>
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div> -->

                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2 rounded p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">Well done Dr Eboh and the entire IVF team..My wife and I really appreciate
                            the smile you have put on our face.</p>
                        <!-- <h6><b>Jerry Michael</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div>

                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2 rounded p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">I would say its the best fertility center in Edo state for IVF, IUI and OI
                            staffs are very polite and response to patients is very swift.</p>
                        <!-- <h6><b>Joy Balogun</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div>

                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2 rounded p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">The best amongst the best.. One hospital with Modern infrastructures,offers
                            Intensive health care services and Fertility treatment.</p>
                        <!-- <h6><b>Bibie Godwin</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div>

                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2 rounded p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">My experience was awesome. Nice nurses and great environment.</p>
                        <!-- <h6><b>Ehimen Otaigbe</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div>

                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2 rounded p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">It's the best Fertility center you can ever ask for and 100% customer
                            friendly.</p>
                        <!-- <h6><b>Moyin Omokhafe</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div>

                <div class="swiper-slide col-lg-4 col-md-6 my-4 h-100 ">
                    <div class="content bg-white mx-2 rounded mx-2 p-4 mx-3 text-center">

                        <!-- <img src="img/about-ivf-2.jpg" alt="img"> -->
                        <p class="mt-3 mb-2">An exceptional Fertility clinic with amazing results in IVF and other
                            aspects of health care</p>
                        <!-- <h6><b>Rachel Nwabuogor</b></h6> -->
                        <i class="fas fa-quote-right mt-3 fa-2x"></i>

                    </div>


                </div>


            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <!-- <div class="swiper-button-prev"></div> -->
            <!-- <div class="swiper-button-next"></div> -->

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
        </div>

        <!-- <div class="mt-4 swiper2"> -->
        <!-- <h4 class="p-4 text-white">Gallery</h4>
            <div id="babies" class=" swiper-wrapper">
                <div class="col-lg-4 col-md-6 swiper-slide">
                    <img src="img/baby1.jpg" alt="baby image">
                </div>
                <div class="col-lg-4 col-md-6 swiper-slide">
                    <img src="img/baby2.jpg" alt="baby image">
                </div>
                <div class="col-lg-4 col-md-6 swiper-slide">
                    <img src="img/baby3.jpg" alt="baby image">
                </div>
               
            </div>

        </div> -->

        <img id="graph" src="img/graph.svg" alt="">
    </section>


    <!-- <section id="testimonies">
        <h1>What Our Patients Are Saying</h1>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card-main bg-blue rounded">
                    <img class="curved-line" src="img/curved-line-light.svg" alt="curved line">
                    <img class="my-4 img" src="img/sleeping-baby.jpg" alt="user">
                    <p>My cousin and I have being there and God use MAVISCOPE HOSPITAL AND FERTILITY CENTER to answer her prayers today she is a happy woman God bless you sir and your team.</p>
                    <h4>Stella Eboh </h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card-main bg-blue rounded">
                    <img class="curved-line" src="img/curved-line-light.svg" alt="curved line">
                    <img class="my-4 img" src="img/sleeping-baby.jpg" alt="user">
                    <p>One of the best gynecological hospital in Edo state, guiding women through safemother hood, reducing maternal and neonatal mortality. It should be your first choice when it comes to health.</p>
                    <h4>Faith Omavuaye</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card-main bg-blue rounded">
                    <img class="curved-line" src="img/curved-line-light.svg" alt="curved line">
                    <img class="my-4 img" src="img/sleeping-baby.jpg" alt="user">
                    <p>I am so grateful to DR EBOH IDEMUDIA and his team. if not for them, I would never been called a mother, I love the fact that DR EBOH and his staffs really keep an eye on you to make sure your pregnancy is progressing in the....</p>
                    <h4>Nasirat osamudiamen Azeez</h4>
                </div>
            </div>


         

        </div>

        <a class="btn btn-light-red" href="testimonies.php">view more</a>

    </section> -->

    <!-- <section class="mt-5" id="form">
        <div class="row">
            <div class="col-lg-6">
                <form action="index.php" method="POST">
                    <h1 class="my-4">
                        Book Your Consultation
                    </h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="mt-2" for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname" required>
                        </div>


                        <div class="col-lg-6">
                            <label class="mt-2" for="lastname">Fullname</label>
                            <input type="text" name="lastname" id="lastname" required>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-lg-6">

                            <label class="mt-2" for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2" for="email">Email</label>
                            <input type="text" name="email" id="email" required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label class="mt-2" for="date">Preferred date</label>
                            <input type="date" name="date" id="date" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2" for="time">Preferrd time</label>
                            <input type="time" name="time" id="time" value="09:00" min="09:00" max="16:00" required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="mt-2" for="department">Select Department:</label>
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
                            <label class="mt-2" for="children">Number of children</label>
                            <input type="text" name="children" id="children">
                        </div>
                    </div>



                    <label class="mt-2" for="reasonForAppointment">Reason for appointment</label>
                    <textarea name="reason" id="reasonForAppointment" required></textarea>

                    <button class="btn btn-light-red" type="submit">Book appointment</button>
                </form>
            </div>
            <div class="col-lg-6 px-4">
                <img src="img/nurse.png" alt="appointment image">
            </div>
        </div>
    </section> -->

    <!-- <section id="all-team">
        <h1>Our Team</h1>
        <div class="row">
            <div class="team col-lg-4">

                <div class="team-inner">
                    <img class="decor" src="img/curved-line-light.svg" alt="curved line">
                
                    <div class="">
                        <h4>Dr. Jeremiah Asogun</h4>
                        <p>Consultant obstetric and gynecology</p>
                        <span class="more-text">
                            He specializes in backend development, database management, and API integration.
                            He has worked on multiple high-scale projects, contributing significantly to
                            architectural design and implementation.
                        </span>
                    </div>
                    <a href="#" class="color-red toggle-btn"><b>View More</b></a>
                </div>

            </div>
            <div class=" team col-lg-4">
                <div class="team-inner ">
                    <img class="decor" src="img/curved-line-light.svg" alt="curved line">
                
                    <div class="">
                        <h4>Dr. Jeremiah Asogun</h4>
                        <p>Consultant obstetric and gynecology</p>

                    </div>
                    <a href="#" class="color-red toggle-btn"><b>View More</b></a>
                </div>

            </div>
            <div class="team col-lg-4">
                <div class="team-inner">
                    <img class="decor" src="img/curved-line-light.svg" alt="curved line">
                
                    <div class="">
                        <h4>Dr. Jeremiah Asogun</h4>
                        <p>Consultant obstetric and gynecology</p>

                    </div>
                    <a href="#" class="color-red toggle-btn"><b>View More</b></a>
                </div>

            </div>


        </div>

        <div class="">
            <a class="btn btn-light-red btn-lg" href="team.php">View More Members</a>
        </div>

    </section> -->

    <section id="blog" class="my-5">
        <?php
        require "admin/conn.php";
        $sql = "SELECT * FROM article ORDER BY article_id DESC LIMIT 3";
        $stmt = $pdo->query($sql);

        // Fetch articles
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($articles) { ?>
            <h1 class="my-4">
                Recent Blog Post
            </h1>

            <div class="row g-5 my-4">
                <?php
                foreach ($articles as $article) {

                    $sql = "SELECT * FROM author WHERE author_id = :id";
                    $stmt = $pdo->prepare($sql);

                    // Bind the ID parameter securely
                    $stmt->bindParam(":id", $author_id, PDO::PARAM_INT);

                    // Set the ID value (12 in this case)
                    $author_id = $article["id_author"];

                    // Execute the query
                    $stmt->execute();

                    // Fetch the author details
                    $author = $stmt->fetch(PDO::FETCH_ASSOC); ?>

                    <div class="col-lg-4 col-md-6 mt-3" data-aos="fade-up" data-aos-duration="500">
                        <div class="blog-item">
                            <img class="mb-3" src="img/article/<?= $article['article_image'] ?>" alt="blog post image">
                            <small> <?= date_format(date_create($article['article_created_time']), "F d, Y ") ?> |
                                <?= $author['author_fullname']; ?></small>
                            <h6 class="mt-3"><?= $article["article_title"] ?></h6>

                            <a href="single_article.php?id=<?= $article['article_id'] ?>" class="btn btn-light-red">Read
                                more</a>
                        </div>

                    </div>

                <?php } ?>

            </div>

        <?php } ?>





    </section>


    <!-- <section id="blog">
    
    <div class="row g-5">
        <div  class="col-lg-4 col-md-6 ">
            <div class="blog-item">
                <img class="mb-3" src="img/radiology.jpg" alt="blog post image">
                <small >Feb 12, 2025 | Jeremiah Ugo</small>
               <h4 class="mt-3">Recent Advancement in IVF</h4>
               <p>Recent advancements in IVF have significantly improved success rates, with innovations like genetic screening and embryo freezing enhancing outcomes</p>
               <a href="blog-page.html" class="btn btn-light-red">Read more</a>
            </div>
      
        </div>

        <div  class="col-lg-4 col-md-6 ">
            <div class="blog-item">
                <img class="mb-3" src="img/radiology.jpg" alt="blog post image">
                <small><span>Feb 12, 2025</span> | <span>Jeremiah Ugo</span></small>
               <h4 class="mt-3">Recent Advancement in IVF</h4>
               <p>Recent advancements in IVF have significantly improved success rates, with innovations like genetic screening and embryo freezing enhancing outcomes</p>
               <a href="blog-page.html" class="btn btn-light-red">Read more</a>
            </div>
         
        </div>

        <div  class="col-lg-4 col-md-6">
            <div class="blog-item">
                <img class="mb-3" src="img/radiology.jpg" alt="blog post image">
                <small><span>Feb 12, 2025</span> | <span>Jeremiah Ugo</span></small>
               <h4 class="mt-3">Recent Advancement in IVF</h4>
               <p>Recent advancements in IVF have significantly improved success rates, with innovations like genetic screening and embryo freezing enhancing outcomes</p>
               <a href="blog-page.html" class="btn btn-light-red">Read more</a>
            </div>
 
        </div>
        
    </div>
 </section> -->

    <section data-aos="fade-up" data-aos-duration="500">
        <div class="faq-container">
            <h2 class="text-center my-4">Frequently Asked Questions</h2>

            <div class="faq-item">
                <h3 class="faq-question">What services does Maviscope Hospital and Fertility Centre offer?</h3>
                <p class="faq-answer">Maviscope Hospital specializes in comprehensive fertility treatments, including In
                    Vitro Fertilization (IVF), Intrauterine Insemination (IUI), egg donation, surrogacy, and fertility
                    preservation. We also provide obstetric and gynecological care, general healthcare, and neonatal
                    intensive care (NICU) services.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Do I need a referral to visit the fertility centre?</h3>
                <p class="faq-answer">No, you do not need a referral to visit us. You can book an appointment directly
                    with our specialists. However, if you have a referral from your doctor, you are welcome to bring it
                    along.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">How do I book an appointment?</h3>
                <p class="faq-answer">You can <a href="booking.php"><b>book an appointment</b></a> online through our
                    website, call us +2347038538424 or +234702 633 7952 or visit our hospital.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">How do I know if I need fertility treatment?</h3>
                <p class="faq-answer">If you have been trying to conceive for over a year (or six months if you are over
                    35) without success, we recommend booking a consultation with our fertility specialists. Other
                    signs, such as irregular menstrual cycles or previous reproductive health issues, may also indicate
                    the need for evaluation. <a href="booking.php"><b>Book a consultation now</b></a></p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">What fertility tests do you offer?</h3>
                <p class="faq-answer">We offer a wide range of diagnostic tests, including hormonal tests, semen
                    analysis, ovarian reserve testing, ultrasound scans, hysterosalpingography (HSG), and genetic
                    screenings to assess fertility health.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">What is the success rate of IVF at Maviscope Hospital?</h3>
                <p class="faq-answer">Success rates depend on factors such as age, medical history, and the cause of
                    infertility. At Maviscope, we maintain competitive success rates in line with international
                    fertility standards. Our specialists will assess your individual case and discuss realistic
                    expectations with you.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">How long does the IVF process take?</h3>
                <p class="faq-answer">A complete IVF cycle typically takes about 4 to 6 weeks, including ovarian
                    stimulation, egg retrieval, fertilization, and embryo transfer. However, the timeline may vary based
                    on individual treatment plans.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Is IVF painful?</h3>
                <p class="faq-answer">Most patients experience only mild discomfort during the ovarian stimulation and
                    egg retrieval procedures. Anesthesia is used during egg retrieval to ensure comfort. Any discomfort
                    after the procedure is usually mild and short-lived</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Can I choose the gender of my baby during IVF?</h3>
                <p class="faq-answer">Gender selection is possible through Preimplantation Genetic Testing (PGT), but it
                    is subject to legal and ethical considerations. Our specialists can provide more details based on
                    your needs.
                    We also offer pre Implantation genetic testing for genotype incompatibility </p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Do you offer egg donation services?</h3>
                <p class="faq-answer">Yes, we have a well-established egg donation program for individuals and couples
                    who need donor eggs to conceive. Our donors are rigorously screened for medical and genetic
                    conditions. <br>

                    You want to be an egg donor? <a href="https://wa.me/2347038538424"><b>Click here</b></a> </p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">How does surrogacy work at Maviscope Hospital?</h3>
                <p class="faq-answer">Our surrogacy program supports intended parents through every stage, from legal
                    agreements to matching with a surrogate and providing medical care throughout the pregnancy. Our
                    team will guide you through the entire process.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Who can be an egg donor or a surrogate?</h3>
                <p class="faq-answer">Egg donors are usually healthy women between 21-27 years with good ovarian
                    reserve. Surrogates must be in good health, have had at least one successful pregnancy, and meet
                    medical screening criteria. <a href="booking.php">Contact us here</a>
                </p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Do you offer antenatal and postnatal care?</h3>
                <p class="faq-answer">Yes, we provide comprehensive antenatal and postnatal care, including prenatal
                    screenings, ultrasounds, delivery services, and postpartum support.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">What delivery options do you offer?</h3>
                <p class="faq-answer">We provide vaginal deliveries, cesarean sections (C-sections), and high-risk
                    pregnancy management. Our NICU is available for specialized newborn care if needed.
                </p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">How much does IVF cost at Maviscope Hospital and Fertility Centre?</h3>
                <p class="faq-answer">The cost of IVF varies depending on the specific treatment plan. We provide
                    transparent pricing and offer payment plans to make fertility treatment more accessible. Please
                    contact us for a personalized quote.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Do you offer financing or installment payment plans for fertility treatments?
                </h3>
                <p class="faq-answer">Yes, we offer flexible payment plans to help make treatments more affordable.
                    Visit the hospital and after consultation you'd be directed to speak with our finance team for more
                    details on available options.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">What can I do to improve my fertility naturally?</h3>
                <p class="faq-answer">Maintaining a healthy weight, eating a balanced diet, reducing stress, avoiding
                    smoking and excessive alcohol consumption, and exercising regularly can help improve fertility.
                </p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Can stress affect my chances of getting pregnant?</h3>
                <p class="faq-answer">Yes, high-stress levels can impact ovulation and overall reproductive health. We
                    offer counseling and support services to help manage stress during fertility treatments.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Does age affect fertility in both men and women?</h3>
                <p class="faq-answer">Yes, fertility declines with age, especially for women after age 35. Men also
                    experience a gradual decline in sperm quality with age. Early fertility assessment and intervention
                    can improve success rates </p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">What should I do in case of a medical emergency related to pregnancy or
                    fertility treatment?</h3>
                <p class="faq-answer">If you experience severe abdominal pain, heavy bleeding, or any other concerning
                    symptoms, please call our emergency line at +2347026337952 or visit the hospital immediately.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">Can I get a second opinion at Maviscope Hospital?</h3>
                <p class="faq-answer">Yes, we encourage second opinions. If you have already undergone fertility
                    treatments elsewhere and need another expert’s perspective, our specialists are available to review
                    your case.</p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question">How can I stay updated with news and health tips from Maviscope Hospital?</h3>
                <p class="faq-answer">Follow us on our social media pages and subscribe to our newsletter for the latest
                    updates, fertility tips, and hospital announcements.</p>
            </div>


        </div>
    </section>

    <?php
    include "partials/footer.php";
    ?>

    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-box">
            <span class="close-popup" id="closePopup">&times;</span>
            <?php if ($event): ?>
                <a href="booking.php">
                    <img src="img/gallery/<?= htmlspecialchars($event['event_img']) ?>" alt="Event Image">
                </a>

                <!-- <div class="popup-content">
                    <h3><?= htmlspecialchars($event['event_title'] ?? 'Upcoming Event') ?></h3>
                    <p><?= nl2br(substr($event['event_description'], 0, 100)) ?>...</p>
                    <button class="popup-btn" id="viewDetailsBtn">View Details</button>
                    <div class="hidden-details" id="hiddenDetails">
                        <?= nl2br(htmlspecialchars($event['event_description'])) ?>
                    </div>
                </div> -->
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const popup = document.getElementById("popupOverlay");
                        const closeBtn = document.getElementById("closePopup");

                        // Show popup after 5 seconds
                        setTimeout(() => {
                            popup.classList.add("active");
                        }, 5000);

                        // Close popup on click or outside click
                        closeBtn.addEventListener("click", () => popup.classList.remove("active"));
                        popup.addEventListener("click", e => {
                            if (e.target === popup) popup.classList.remove("active");
                        });
                    });
                </script>
            <?php endif; ?>
        </div>
    </div>


</body>




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
    });




</script>



<script>
    var swiper = new Swiper(".swiper", {
        slidesPerView: 1,
        autoplay: {
            delay: 3000, // Slides every 3 seconds
            disableOnInteraction: false, // Keeps autoplay running even after user interaction
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            }, // Tablet: 2 slides
            1024: {
                slidesPerView: 3
            } // Desktop: 3 slides
        }
    });

    var swiper = new Swiper(".swiper2", {
        slidesPerView: 1,
        autoplay: {
            delay: 3000, // Slides every 3 seconds
            disableOnInteraction: false, // Keeps autoplay running even after user interaction
        },
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },
        breakpoints: {
            768: {
                slidesPerView: 2
            }, // Tablet: 2 slides
            1024: {
                slidesPerView: 3
            } // Desktop: 3 slides
        }
    });

    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('active');
            let answer = item.nextElementSibling;
            if (answer.style.display === 'block') {
                answer.style.display = 'none';
            } else {
                document.querySelectorAll('.faq-answer').forEach(ans => ans.style.display = 'none');
                answer.style.display = 'block';
            }
        });
    });
</script>



</html>