<?php
session_start();
   if(!isset($_SESSION['ticket_id'])){
        header("location: online-booking.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consultation Access</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <?php include "partials/header.php"; ?>
  <style>
         .container {
        margin-top: 100px;
    }
   

    .chat-option-card {
      max-width: 450px;
      border-radius: 15px;
      padding: 30px;
      background: #fff;
      box-shadow: 0 0 15px rgba(0,0,0,0.07);
    }
    .option-btn {
      padding: 14px;
      border-radius: 10px;
      font-size: 16px;
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: center;
    }
    .id-box {
      background: #eef7ff;
      border-left: 4px solid #0d6efd;
      padding: 15px 15px 45px 15px; /* extra bottom padding for button */
      border-radius: 8px;
      margin-bottom: 20px;
      position: relative;
      text-align: left;
    }
    .copy-btn {
      position: absolute;
      bottom: 10px;
      right: 10px;
      background: #0d6efd;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 6px 12px;
      font-size: 14px;
      cursor: pointer;
    }

    @media screen and (max-width: 920px) {
      .container {
        margin-top: 80px !important;
      }
    }
  </style>
</head>

<body>
      <?php include "partials/navbar.php" ?>

<div class="container d-flex align-items-center justify-content-center min-vh-100">

  <div class="chat-option-card text-center">

    <h4 class="mb-3 text-success"><i class="bi bi-check-circle-fill"></i> Payment Successful</h4>

    <p class="text-muted mb-3">Your consultation access details are below:</p>

    <!-- ✅ ID Box -->
    <div class="id-box">
      <!-- <strong>Patient ID:</strong> <span id="patientId">PT-123456</span><br> -->
      <strong>Ticket ID:</strong> <span id="ticketId"><?= $_SESSION['ticket_id']; ?></span>

      <button class="copy-btn" onclick="copyIDs()">
        <i class="bi bi-copy"></i> Copy
      </button>
    </div>

    <p class="text-danger fw-semibold" style="font-size:14px;">
      Please copy or screenshot these IDs now.  
      You will be asked to provide them before your consultation begins.
    </p>

    <p class="text-muted" style="font-size:13px;">
      These IDs have also been sent to your email.
    </p>

    <hr class="my-4">

    <!-- WhatsApp Button -->
    <a id="waBtn" href="#" target="_blank" class="btn btn-success option-btn mb-3">
      <i class="bi bi-whatsapp"></i> Chat via WhatsApp
    </a>

    <!-- Web Chat Button -->
    <a id="webChatBtn" href="#" class="btn btn-primary option-btn">
      <i class="bi bi-chat-dots"></i> Continue Chat on the Web
    </a>

  </div>

</div>

<!-- ✅ JS -->
<script>
  function copyIDs() {
    // const patientId = document.getElementById("patientId").innerText;
    const ticketId = document.getElementById("ticketId").innerText;
    const textToCopy = `Ticket ID: ${ticketId}`;
    navigator.clipboard.writeText(textToCopy).then(() => alert("✅ IDs copied!"));
  }

  // const patientId = document.getElementById("patientId").innerText;
  const ticketId = document.getElementById("ticketId").innerText;

  document.getElementById("waBtn").href =
    `https://wa.me/2349038326257?text=Hello%20Doctor,%20my%20Ticket%20ID%20is%20${ticketId}.`;

  document.getElementById("webChatBtn").href =
    `web-chat.php?&ticket_id=${ticketId}`;
</script>

</body>
</html>
