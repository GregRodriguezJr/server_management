<?php
require_once "../util/secure_conn.php";
require('../model/database.php');
require('../model/customer_db.php');
require('../model/technician_db.php');
require('../model/incident_db.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['technician'])) {    // Skip login if technician is in the session
            $action = 'display_incident_select';
        } else {
            $action = 'display_login';
        }
    }
}

//instantiate variable(s)
$email = '';

switch ($action) {
    case 'display_login':
        include('technician_login.php');
        break;
    case 'display_incident_select':
        // Instantiate variable
        $technician = NULL;
        
        // Get customer from session
        if (isset($_SESSION['technician'])) {
            $technician = $_SESSION['technician'];  
        } else { // If technician is not in session, get it from database and set it in session
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if (empty($email) || $email === FALSE) {
                $error = "Invalid email. Please try again.";
                include('../errors/error.php');
                exit();
            } 

            $technician = get_technician_by_email($email);
            if ($technician === NULL) {
                $error = "Technician doesn't exist. Please try again.";
                include('../errors/error.php');
                exit();
            }
            
            $_SESSION['technician'] = $technician;
        }
        
        $incidents = get_incidents_by_technician($technician['techID']);
        if (count($incidents) === 0) {
            $message = 'There are no open incidents for this technician.';
        }
        include('incident_select.php');
        break;
    case 'select_incident':
        // Set incident in session
        $incident_id = filter_input(INPUT_POST, 'incident_id', FILTER_VALIDATE_INT);
        $_SESSION['incident_id'] = $incident_id;

        $incident = get_incident($incident_id);
        include('incident_update.php');
        break;
    case 'update_incident':
        $date_closed = filter_input(INPUT_POST, 'date_closed');
        $description = filter_input(INPUT_POST, 'description');

        $incident_id = $_SESSION['incident_id'];

        // convert date to correct format
        if (empty($date_closed)) {
            $date_closed_converted = NULL;
        } else {
            $timestamp = strtotime($date_closed);
            if ($timestamp === FALSE) {
                $date_closed_converted = NULL;
            } else {
                $date_closed_converted = date('Y-m-d', $timestamp);
            }
        }

        $result = update_incident($incident_id, $date_closed_converted, $description);
        if ($result === FALSE) {
            $message = "An error occurred while attempting to update the database.";
        } else if ($result === 0) {
            $message = "No changes to this incident.";
        } else {
            $message = "This incident was updated.";
        }
        include('incident_update.php');
        break;
    case 'logout':
        unset($_SESSION['technician']);
        include('technician_login.php');
        break;
}
?>