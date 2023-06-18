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
        $error_message = "";
        // validate last name input
        if(!is_string($last_name) || !preg_match('/^[a-zA-Z\s]+$/', $last_name)) {
            $error_message = "Last name must be letter characters";
        } else {
            $customers = get_searched_customers($last_name);
            // variable to check if no results
            $no_results = empty($customers);
        }
        include('customer_search.php');

      // action handles customer edit form  
    } else if ($action == "show_edit_form") {
        $customer_id = filter_input(INPUT_GET, 'customer_id');
        $customer = get_customer($customer_id);
        include('customer_edit.php');
    }
    if ($action == 'under_construction') {
        include('../under_construction.php');
    }
?>