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
        // action to show login page
        case 'show_login':
            include('customer_login.php');
            break;
        
        // action to try and login
        case 'login':
            $email = filter_input(INPUT_POST, 'email');
            $customer = get_customer_by_email($email);
            // validate email address
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_message = "Invalid email format";
                include('customer_login.php');
            } elseif (!$customer) {
                $error_message = "User not found with the email: $email";
                include('customer_login.php');
            } else {
                include('product_register_form.php');
            }
            break;

        // default error page
        default:
            include('../errors/error.php');
            break;
    }
?>