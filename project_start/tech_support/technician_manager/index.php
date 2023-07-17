<!-- Greg Rodriguez -->
<!-- Ch14 Project -->
<?php 
    require('../model/database_oo.php');
    require('../model/technicians_db_oo.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
            $action = 'show_technician_list';
        }
    }

    // Instantiate the TechnicianDB object
    $TechnicianDB = new TechnicianDB();

    switch ($action) {
        case 'show_technician_list':
            $technicians = $TechnicianDB->get_all_technicians();
            include('technician_list.php');
            break;

        // action deletes technician from db and loads tech list
        case 'delete_technician':
            $tech_ID = filter_input(INPUT_POST, 'tech_ID');
            $TechnicianDB->delete_technician($tech_ID);
            // update tech list after delete method called
            $technicians = $TechnicianDB->get_all_technicians();
            // set delete success variable and message
            $delete_success = true;
            $delete_success_message = "Technician successfully deleted!";
            include('technician_list.php');
            break;

        // action shows add form
        case 'show_add_tech_form':
            include('technician_add.php');
            break;

        // action to add technician to db
        case 'add_technician':
            $first_name = filter_input(INPUT_POST, 'first_name');
            $last_name = filter_input(INPUT_POST, 'last_name');
            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
            $password = filter_input(INPUT_POST, 'password');
            // constructor for Technician class expects an ID, can not overload constructor
            // used null as placeholder since db will assign new ID
            $tech_ID = null;

            // set default success variable
            $add_success = false;

            // Instantiate the Technician object
            $newTechnician = new Technician($first_name, $last_name, $tech_ID, $email, $phone, $password);

            // method to check for errors
            $error = $newTechnician->validateInput();

            // display error page
            if(!empty($error)) {
                include('../errors/error.php');
            } else {
                $TechnicianDB->add_technician(
                    $newTechnician->first_name, 
                    $newTechnician->last_name, 
                    $newTechnician->email, 
                    $newTechnician->phone, 
                    $newTechnician->password
                );            
                $add_success = true;
                header("Location: .?action=show_technician_list&add_success=true");
                exit;
            }
            break;

        default:
            include('../errors/error.php');
            break;
    }
?>