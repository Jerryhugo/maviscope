<?php
require "conn.php";

$rows = $pdo->query("SELECT * FROM online_appointments ORDER BY online_appointment_id DESC")->fetchAll(PDO::FETCH_ASSOC);

$html = "<h2>Maviscope Online Appointments</h2>";
$html .= "<table border='1' cellpadding='5' cellspacing='0'>";
$html .= "<tr>
            <th>Online ID</th>
            <th>Ticket ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Department</th>
            <th>Children</th>
            <th>Reason</th>
         </tr>";

foreach ($rows as $r) {
    $html .= "<tr>
                <td>{$r['online_appointment_id']}</td>
                <td>{$r['ticket_id']}</td>
                <td>{$r['firstname']}</td>
                <td>{$r['lastname']}</td>
                <td>{$r['phone']}</td>
                <td>{$r['email']}</td>
                <td>{$r['department']}</td>
                <td>{$r['children']}</td>
                <td>{$r['reason']}</td>
              </tr>";
}

$html .= "</table>";

echo $html;
