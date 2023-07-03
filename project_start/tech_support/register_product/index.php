<!-- Greg Rodriguez -->
<!-- Project -->
<?php
    require('../model/database.php');
    require('../model/customer_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
            $action = 'show_login';
        }
    }

    switch ($action) {
        case 'show_login':
            include('product_register.php');
            break;
        
        default:
            include('../errors/error.php');
            break;
    }
?>