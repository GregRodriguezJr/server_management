<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

// Start session
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['customer'])) {    // Skip login if customer is in session
            $action = 'display_register';
        } else {
            $action = 'display_login';
        }
    }
}
//instantiate variable(s)
$email = '';

switch ($action) {
    case 'display_login':
        include('customer_login.php');
        break;
    case 'display_register':
        // Instantiate variable
        $customer = NULL;
        
        // Get customer from session
        if (isset($_SESSION['customer'])) {
            $customer = $_SESSION['customer'];  
        } else { // If customer is not in session, get it from database and set it in session
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if (empty($email) || $email === FALSE) {
                $error = "Invalid email. Please try again.";
                include('../errors/error.php');
                exit();
            } 

            $customer = get_customer_by_email($email);
            if ($customer === NULL) {
                $error = "Customer doesn't exist. Please try again.";
                include('../errors/error.php');
                exit();
            }
            
            $_SESSION['customer'] = $customer;
        }

        $products = get_products();
        include('product_register.php');
        break;
    case 'register_product':
        $customer = $_SESSION['customer'];
        $product_code = filter_input(INPUT_POST, 'product_code');

        // only add if not already registered
        $registration = get_registration($customer['customerID'], $product_code);
        if ($registration === NULL) {
            add_registration($customer['customerID'], $product_code);
            header("Location: .?action=success&product_code=$product_code");
        } else {
            $error = "Product ($product_code) is already registered. Please try again.";
            include('../errors/error.php');
        }
        break;
    case 'success':
        $customer = $_SESSION['customer'];
        $product_code = filter_input(INPUT_GET, 'product_code');
        $message = "Product ($product_code) was registered successfully.";
        include('product_register.php');
        break;
    case 'logout':
        unset($_SESSION['customer']);
        include('customer_login.php');
        break;
}
?>