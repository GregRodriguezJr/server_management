<?php
require_once "../util/secure_conn.php";
require('../model/database.php');
require('../model/employee_db.php');

// Start session
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['employee'])) {    // Skip login if customer is in the session
            $action = 'display_tasks';
        } else {
            $action = 'display_login';
        }
    }
}
//instantiate variable(s)
$email = '';

switch ($action) {
    case 'display_login':
        include('developer_login.php');
        break;
    case 'display_tasks':
        // Instantiate variable
        $developer = NULL;
        
        // Get developer from session
        if (isset($_SESSION['developer'])) {
            $developer = $_SESSION['developer'];  
        } else { // If developer is not in session, get it from database and set it in session
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');

            if (empty($email) || $email === FALSE) {
                $error = "Invalid email. Please try again.";
                include('../errors/error.php');
                exit();
            } 

            $developer = get_employee_by_email($email);
            if ($developer === NULL) {
                $error = "developer doesn't exist. Please try again.";
                include('../errors/error.php');
                exit();
                // verify the password is correct
            } else if ($developer['password'] != $password) {
                $error = "Invalid password. Please try again.";
                include('../errors/error.php');
                exit();
            }
            
            $_SESSION['developer'] = $developer;
        }

        // $products = get_products();
        include('developer_tasks.php');
        break;

    case 'register_product':
        $developer = $_SESSION['developer'];
        $product_code = filter_input(INPUT_POST, 'product_code');

        $registration = get_registration($developer['developerID'], $product_code);
        if ($registration === NULL) {
            add_registration($developer['developerID'], $product_code);
            header("Location: .?action=success&product_code=$product_code");
        } else {
            $error = "Product ($product_code) is already registered. Please try again.";
            include('../errors/error.php');
        }
        break;
    case 'success':
        $developer = $_SESSION['developer'];
        $product_code = filter_input(INPUT_GET, 'product_code');
        $message = "Product ($product_code) was registered successfully.";
        include('product_register.php');
        break;
    case 'logout':
        unset($_SESSION['developer']);
        include('developer_login.php');
        break;
}
?>