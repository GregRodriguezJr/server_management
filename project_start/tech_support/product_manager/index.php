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
    case 'show_add_product':
        include('product_add.php');
        break;
    default:
        include('../under_construction.php');
        break;
}

?>