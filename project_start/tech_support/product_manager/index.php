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
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $release_date)) {
            $error .= 'Release date must be in the format yyyy-mm-dd.<br>';
        } 
        // Parse about any English textual datetime description into a Unix timestamp
        $release_date_timestamp = strtotime($release_date);
        if ($release_date === false || $release_date_timestamp === false) {
            $error .= 'Invalid release date.<br>';
        } 
        if ($release_date_timestamp > time()) {
            $error .= 'Release date cannot be in the future.<br>';
        }
        // display error page
        if(!empty($error)) {
            include('../errors/error.php');
        } else {
            add_product($product_code, $name, $version, $release_date);
            $add_success = true;
            // pass the success variable param through the URL
            header("Location: .?action=show_products&add_success=true");
            exit;
        }
        break;
    default:
        include('../errors/error.php');
        break;
}

?>