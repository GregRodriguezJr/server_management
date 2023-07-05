<!-- Greg Rodriguez -->
<!-- Project -->
<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_products';
    }
}

switch ($action) {

    // action to show product list page
    case 'show_products':
        $products = get_all_products();
        $delete_success = false;
        include('product_list.php');
        break;

    // action deletes prodcut and stays on products list page
    case 'delete_product':
        $product_code = filter_input(INPUT_POST, 'product_code');
        delete_product($product_code);
        // get all products after delete function
        $products = get_all_products();
        // set delete success variable and message
        $delete_success = true;
        $delete_success_message = "Product successfully deleted!";
        // show updated product list
        include('product_list.php'); 
        break;

    // action to show add product page
    case 'show_add_product':
        include('product_add.php');
        break;

    // action to add product to db
    case 'add_product':
        $product_code = filter_input(INPUT_POST, 'product_code');
        $name = filter_input(INPUT_POST, 'name');
        $version = filter_input(INPUT_POST, 'version');
        $release_date = filter_input(INPUT_POST, 'release_date');

        // set default error and success variable
        $error = '';
        $add_success = false;
        
        // validate inputs
        if(strlen($product_code) > 10) {
            $error .= "Product code cannot exceed 10 characters.<br>";
        }
        if(strlen($name) > 50) {
            $error .= "Name cannot exceed 50 characters.<br>";
        }
        if(!is_numeric($version) || $version <= 0) {
            $error .= "Version must be a numeric value greater than zero.<br>";
        }

        // validate date
        // hardcoded the date formats
        $date_formats = array(
            'm/d/Y', 'd/m/Y', 'Y/m/d', 'Y/d/m',
            'm-d-Y', 'd-m-Y', 'Y-m-d', 'Y-d-m'
            );

        // variable to store the formatted date
        $formatted_date = '';

        // iterate over the date formats and attempt to parse the input
        foreach ($date_formats as $format) {
            $parsed_date = date_create_from_format($format, $release_date);
            if ($parsed_date !== false) {
                $formatted_date = $parsed_date->format('Y-m-d');
                break;
            }
        }

        // Check if a valid date was found
        if (!empty($formatted_date)) {
            $release_date = $formatted_date;
        } else {
            $error .= "Invalid date format!";
        }

        // display error page
        if(!empty($error)) {
            include('../errors/error.php');
        } else {
            try {
                add_product($product_code, $name, $version, $release_date);
                $add_success = true;
                // pass the success variable param through the URL
                header("Location: .?action=show_products&add_success=true");
                exit;
            } catch (TypeError $e) {
                $error = "An error occurred while trying to add the product: " . $e->getMessage();
                include('../errors/error.php');
            }
        }
        break;
    default:
        include('../errors/error.php');
        break;
}

?>