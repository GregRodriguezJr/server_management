<!-- Greg Rodriguez -->
<!-- Project 6 -->
<?php
    require('../model/database.php');
    require('../model/customer_db.php');

    // set default to get all customers
    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
            $action = 'list_customers';
        }
    }

    if($action == 'list_customers') {
        $customers = get_all_customers();
        include('list_customers.php');
    }

    if ($action == 'under_construction') {
        include('../under_construction.php');
    }
?>