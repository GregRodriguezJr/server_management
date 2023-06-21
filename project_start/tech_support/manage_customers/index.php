<!-- Greg Rodriguez -->
<!-- Project 8 -->
<?php
    require('../model/database.php');
    require('../model/customer_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
            $action = 'customer_search_form';
        }
    }

    // updated actions to switch statment
    switch ($action) {

        // action to show customer search page
        case 'customer_search_form':
            include('customer_search.php');
            break;

        // action to search for customers by lastname
        case 'search_customers':
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
            break;

        // action handles showing customer edit form
        case 'show_edit_form':
            $customer_id = filter_input(INPUT_GET, 'customer_id');
            $customer = get_customer($customer_id);
            // added countries from db to edit form
            $countries = get_all_countries();
            include('customer_edit.php');
            break;

        case 'update_customer':
            $customer_id = filter_input(INPUT_POST, 'customer_id');
            $first_name = filter_input(INPUT_POST, 'first_name');
            $last_name = filter_input(INPUT_POST, 'last_name');
            $address = filter_input(INPUT_POST, 'address');
            $city = filter_input(INPUT_POST, 'city');
            $state = filter_input(INPUT_POST, 'state');
            $postal_code = filter_input(INPUT_POST, 'postal_code');
            $country_code = filter_input(INPUT_POST, 'country_code');
            $phone = filter_input(INPUT_POST, 'phone');
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            // Validate inputs
            if (
                // check if new imputs are strings and no special chars
                !is_string($first_name) || !preg_match('/^[a-zA-Z\s]+$/', $first_name) ||
                !is_string($last_name) || !preg_match('/^[a-zA-Z\s]+$/', $last_name) ||
                !is_string($city) || !preg_match('/^[a-zA-Z\s]+$/', $city) ||
                !is_string($state) || !preg_match('/^[a-zA-Z\s]+$/', $state)
                ) {
                $success = false;
                $error = "Invalid customer data. Check all fields and try again.";
                include('../errors/error.php');
            } else {
                try {
                    // call update function to update database
                    update_customer(
                        $customer_id, $first_name, $last_name, $address, $city,
                        $state, $postal_code, $country_code, $phone, $email, $password);
                    // get updated customer data
                    $customer = get_customer($customer_id);
                    // get updated countries from db
                    $countries = get_all_countries();
                    // set success variable and message
                    $success = true;
                    $success_message = "Customer information updated successfully!";
                    // display updated information on same page
                    include('customer_edit.php');
                } catch (Exception $e) {
                    $error = "An error occurred while updating the customer: " . $e->getMessage();
                    $success = false;
                    include('../errors/error.php');
                }
            }
            break;
    }
?>