<?php 
    require('../model/database_oo.php');
    require('../model/technicians_db_oo.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
            $action = 'show_technician_list';
        }
    }

    // Instantiate the TechnicianDB object
    $TechnicianDB = new TechnicianDB();

    switch ($action) {
        case 'show_technician_list':
            $technicians = $TechnicianDB->get_all_technicians();
            include('technician_list.php');
            break;

        // action deletes technician from db and loads tech list
        case 'delete_technician':
            $tech_ID = filter_input(INPUT_POST, 'tech_ID');
            $TechnicianDB->delete_technician($tech_ID);
            // update tech list after delete method called
            $technicians = $TechnicianDB->get_all_technicians();
            // set delete success variable and message
            $delete_success = true;
            $delete_success_message = "Technician successfully deleted!";
            include('technician_list.php');
            break;

        // action shows add form
        case 'show_add_tech_form':
            include('technician_add.php');
            break;

        // action to add technician to db
        case 'add_technician':
            break;

        default:
            include('../errors/error.php');
            break;
    }
?>