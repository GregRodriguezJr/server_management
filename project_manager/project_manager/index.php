<?php
require_once "../util/secure_conn.php";
require('../model/database.php');
require('../model/employee_db.php');
require('../model/tasks_db.php');
require('../model/projects_db.php');

// Start session
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['employee'])) {    // Skip login if customer is in the session
            $action = 'display_manager_menu';
        } else {
            $action = 'display_login';
        }
    }
}

switch ($action) {
    case 'display_login':
        include('manager_login.php');
        break;

    case 'display_manager_menu':
        // Instantiate variable
        $employee = NULL;
        
        // Get developer from session
        if (isset($_SESSION['employee'])) {
            $employee = $_SESSION['employee'];  
        } else { // If employee is not in session, get it from database and set it in session
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');

            if (empty($email) || $email === FALSE) {
                $error = "Invalid email. Please try again.";
                include('../errors/error.php');
                exit();
            } 

            $employee = get_employee_by_email($email);
            if ($employee === NULL) {
                $error = "employee doesn't exist. Please try again.";
                include('../errors/error.php');
                exit();
                // verify the password is correct
            } else if ($employee['password'] != $password) {
                $error = "Invalid password. Please try again.";
                include('../errors/error.php');
                exit();
            } else if ($employee['title'] != "Project Manager") {
                $error = "Project Manager access only. Please try again.";
                include('../errors/error.php');
                exit();
            }
            
            $_SESSION['employee'] = $employee;
        }
        $tasks = get_all_tasks();
        $projects = get_all_projects();
        include('manager_menu.php');
        break;

    case 'edit_task_form':
        $employee = $_SESSION['employee'];
        $task_ID = filter_input(INPUT_POST, 'task_ID');
        $task = get_task_by_ID($task_ID);

        include('edit_task_form.php');
        break;

    case 'update_task':
        $employee = $_SESSION['employee'];
        $task_ID = filter_input(INPUT_POST, 'task_ID');
        $status = filter_input(INPUT_POST, 'status');
        $hours = filter_input(INPUT_POST, 'hours');

        if ($status < 0 || $hours < 0) {
            $error .= "No negative numbers. Please try again.";
            include('../errors/error.php');
            exit();
        } 

        update_task($task_ID, $status, $hours);

        header("Location: .?action=display_tasks");
        break;

    case 'logout':
        unset($_SESSION['employee']);
        include('manager_login.php');
        break;
}
?>