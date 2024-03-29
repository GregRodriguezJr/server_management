<?php
require_once "../util/secure_conn.php";
require('../model/database.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_technicians';
    }
}

switch ($action) {
    case 'list_technicians':
        // Get technician data
        $technicians = get_technicians();

        // Display the technician list
        include('technician_list.php');
        break;
    case 'delete_technician':
        $technician_id = filter_input(INPUT_POST, 'technician_id', FILTER_VALIDATE_INT);
        delete_technician($technician_id);
        header("Location: .");
        break;
    case 'show_add_form':
        include('technician_add.php');
        break;
    case 'add_technician':
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        // Validate the inputs
        if (empty($first_name) || empty($last_name) || empty($phone) || 
            empty($email) || $email === FALSE || empty($password)) {
                $error = "Invalid technician data. Check all fields and try again.";
                include('../errors/error.php');
        } else {
            add_technician($first_name, $last_name, $email, $phone, $password);
            header("Location: .");
        }
        break;
}
?>