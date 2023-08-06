<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php
require('../model/database.php');
require('../model/incident_db.php');
require('../model/technician_db.php');
require('../model/customer_db.php');

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
        // Check if the user is logged in
        if (isset($_SESSION['email'])) {
            // The user is logged in, end the session
            session_destroy();
        } 
        include('technician_login.php');
        break; 

    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        if($email === NULL) {
            $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
            $techEmail = $email;
            $technician = get_technician_by_email($email);
            $incidents = get_incidents_by_techID($technician['techID']);
            include('technician_incident.php');
        } else {
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
                // start session
                $_SESSION['email'] = $email;
                // get all incidents for tech
                $techEmail = $email;
                $incidents = get_incidents_by_techID($technician['techID']);
                include('technician_incident.php');
            }
        }
        break;

    case 'show_incident_display':
        $incidentID = filter_input(INPUT_POST, 'incident_ID');
        $incident = get_incident_by_ID($incidentID);
        include('incident_display.php');
        break;

    case 'update_incident':
        $incidentID = filter_input(INPUT_POST, 'incident_ID');
        $productCode = filter_input(INPUT_POST, 'product_code');
        $dateOpened = filter_input(INPUT_POST, 'date_opened');
        $dateClosed = filter_input(INPUT_POST, 'date_closed');
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $email = filter_input(INPUT_POST, 'email');
        // validate date
        $date_formats = array(
            'm/d/Y', 'd/m/Y', 'Y/m/d', 'Y/d/m',
            'm-d-Y', 'd-m-Y', 'Y-m-d', 'Y-d-m'
            );

        // variable to store the formatted date
        $formatted_date = '';

        // iterate over the date formats and attempt to parse the input
        foreach ($date_formats as $format) {
            $parsed_date = date_create_from_format($format, $dateClosed);
            if ($parsed_date !== false) {
                $formatted_date = $parsed_date->format('Y-m-d');
                break;
            }
        }

        // Check if a valid date was found
        if (!empty($formatted_date)) {
            $dateClosed = $formatted_date;
        } else {
            $error .= "Invalid date format, try again";
        }

        if(!empty($error)) {
            include('../errors/error.php');
        } else {
            update_incident($incidentID, $productCode, $dateOpened, $dateClosed, $title, $description);
            header("Location: .?action=login&email=$email");
            exit;
        }
        
        break;
    }
?>