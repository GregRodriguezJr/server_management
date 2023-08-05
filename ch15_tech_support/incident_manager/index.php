<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php
require('../model/database.php');
require('../model/incident_db.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_technician_login';
    }
}

switch ($action) {
    // show login page
    case 'show_technician_login':
        include('technician_login.php');
        break; 

    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $technician = get_technician_by_email($email);
        // validate email address
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid email format";
            include('technician_login.php');
        } elseif (!$technician) {
            $error_message = "User not found with the email: $email";
            include('technician_login.php');
        } else {
            // get all incidents for tech
            $incidents = get_incidents_by_techID($technician['techID']);
            include('technician_incident.php');
        }
        break;
    }
?>