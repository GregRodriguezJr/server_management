<!-- Greg Rodriguez -->
<!-- Ch. 21 Project -->

<?php 
require_once "../util/secure_conn.php";
require('../model/database.php');
require('../model/admin_db.php');

// Start session
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['admin'])) {    // Skip login if admin is in the session
            $action = 'display_admin_menu';
        } else {
            $action = 'display_login';
        }
    }
}

//instantiate variable(s)
$username = '';

switch($action) {
    case 'display_login':
        include('admin_login.php');
        break;
    
    case 'display_admin_menu':
        // Instantiate variable
        $admin = NULL;
        
        // Get admin from session
        if (isset($_SESSION['admin'])) {
            $admin = $_SESSION['admin'];  
        } else { // If admin is not in session, get it from database and set it in session
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');

            if (empty($username) || $username === FALSE) {
                $error = "Invalid username. Please try again.";
                include('../errors/error.php');
                exit();
            } 

            $admin = get_admin_by_username($username);
            if ($admin === NULL) {
                $error = "Admin username doesn't exist. Please try again.";
                include('../errors/error.php');
                exit();
                // verify the password is correct
            } else if ($admin['password'] != $password) {
                $error = "Invalid password. Please try again.";
                include('../errors/error.php');
                exit();
            }
            
            $_SESSION['admin'] = $admin;
        }    
        include('admin_menu.php');
        break;
        
    case 'logout':
        unset($_SESSION['admin']);
        include('admin_login.php');
        break;
}

?>