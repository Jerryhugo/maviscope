<?php
session_start();
    if(isset($_POST['agreement'])){
      $_SESSION['agreement'] = $_POST['agreement'];
        header("location: online-booking.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maviscope e-Consultation – Terms & Conditions</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
 <?php include "partials/header.php"; ?>
  <style>
      .container {
        margin-top: 150px;
    }
    .terms-card {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      border-radius: 12px;
      background-color: #ffffff;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .terms-card h2 {
      color: #2c3e50;
      margin-bottom: 20px;
    }
    .terms-card h5 {
      margin-top: 20px;
      color: #34495e;
    }
    .terms-card p, .terms-card li {
      font-size: 15px;
      line-height: 1.6;
      color: #555555;
    }
    .btn-proceed {
      background-color: #004080;
      border: none;
    }
    .btn-proceed:hover {
      background-color: #003060;
    }
  </style>
</head>
<body>
<?php include "partials/navbar.php" ?>
<div class="container">
  <div class="terms-card">
    
    <h2>Maviscope e-Consultation</h2>
    <p>Our e-consultation service is designed for <strong>non-emergency outpatient care</strong>. By proceeding, you agree to the terms below.</p>

    <h5>Requirements</h5>
    <ul>
      <li>Smartphone or computer with stable internet connection</li>
      <li>WhatsApp installed (for voice/video consultation)</li>
      <li>Proof of payment before appointment confirmation</li>
    </ul>

    <h5>How It Works</h5>
    <ul>
      <li>Send a message (either via whatsApp or on the web) to the doctor immediately after payment</li>
      <li>Each session lasts approximately 20 minutes, depending on clinical needs.</li>
      <li>Appointment may be rescheduled depending on the availability of the physician</li>
    </ul>

    <h5>Important Notes</h5>
    <ul>
      <li>This service <strong>does not replace</strong> physical examinations. You may be advised to visit the hospital for further evaluation or tests.</li>
      <li>Consultations may be documented for professional quality assurance. Your information remains confidential.</li>
      <li>Medications can be prescribed and arranged for delivery within 24–48 hours upon request.</li>
      <li>Consultation fees are <strong>non-refundable</strong> once paid.</li>
      <li>Missed appointments may be rescheduled, subject to availability.</li>
      <li>Follow-up within 14 days is included when clinically appropriate.</li>
    </ul>

    <h5>Disclaimer</h5>
    <p>Maviscope e-consultation is intended to support care where physical examination is not immediately required. The hospital is not liable for complications arising from delayed in-person evaluation when advised.</p>

    <form action="online-booking-terms-and-condition.php" method="POST" class="mt-4">
      <div class="form-check mb-3">
        <input name="agreement" class="form-check-input" type="checkbox" id="agree" required>
        <label class="form-check-label" for="agree">
          I agree to the Terms & Conditions
        </label>
      </div>
      <button type="submit" class="btn btn-proceed w-100 text-white">Continue to Appointment Booking</button>
    </form>

  </div>
</div>

</body>
</html>
