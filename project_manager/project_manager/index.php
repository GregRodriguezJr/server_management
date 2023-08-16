<?php
require_once "../util/secure_conn.php";
require('../model/database.php');
require('../model/employee_db.php');
require('../model/tasks_db.php');
require('../model/projects_db.php');
require('../model/clients_db.php');

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
        $clients = get_all_clients();
        $projects = get_all_projects();
        $tasks = get_all_tasks();
        include('manager_menu.php');
        break;

    case 'show_client_add':
        include('client_add.php');
        break;

    case 'add_client':
        $employee = $_SESSION['employee'];
        $name = filter_input(INPUT_POST, 'name');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        add_client($name, $first_name, $last_name, $email, $phone);
        header('Location: .?action=display_manager_menu');
        break;

    case 'edit_client_form':
        $employee = $_SESSION['employee'];
        $client_id = filter_input(INPUT_POST, 'client_ID');
        $client = get_client_by_id($client_id);
        include('client_update.php');
        break;

    case 'update_client':
        $employee = $_SESSION['employee'];
        $client_ID = filter_input(INPUT_POST, 'client_ID');
        $name = filter_input(INPUT_POST, 'name');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        update_client($client_ID, $name, $first_name, $last_name, $email, $phone);
        header('Location: .?action=display_manager_menu');
        break;

    case 'show_project_add':
        include('project_add.php');
        break;

    case 'show_task_add':
        include('task_add.php');
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