<?php 
    require('../model/database_oo.php');
    require('../model/technicians_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
            $action = 'show_technician_list';
        }
    }

    switch ($action) {
        case 'show_technician_list':
            $technicians = get_all_technicians();
            include('technician_list.php');
            break;
        
        default:
            include('../errors/error.php');
            break;
    }
?>