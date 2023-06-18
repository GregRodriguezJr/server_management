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
            $action = 'customer_search_form';
        }
    }

    if($action == 'customer_search_form') {
        include('customer_search.php');
        // action to search for customers by lastname
    } else if ($action == 'search_customers') {
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $customers = get_searched_customers($last_name);
        include('customer_search.php');
    }

    if ($action == 'under_construction') {
        include('../under_construction.php');
    }
?>