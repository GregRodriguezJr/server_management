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

    switch ($action) {
        case 'show_technician_list':
            $technicianDB = new TechnicianDB();
            $technicians = $technicianDB->get_all_technicians();
            include('technician_list.php');
            break;
        
        default:
            include('../errors/error.php');
            break;
    }
?>