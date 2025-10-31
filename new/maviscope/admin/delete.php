<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST["appointmentId"];
 
    $_SESSION['message'] = "Appointment deleted";

  if ($_POST['table'] == 'completed_appointments') {
    deleteAppointment($id, "completed_appointments");
   
    header("location: completed_appointments.php");

  } else {
    deleteAppointment($id, "specialties");
   
    header("location: appointments.php");
  }
  
 
    


}

function deleteAppointment($id, $table){
    require "conn.php";
    // session_start();
    $stmt = $pdo->prepare("DELETE FROM $table WHERE id = :id");
    $stmt->bindParam(':id', $id);


    // Execute the query
    $stmt->execute();
    

}



?>