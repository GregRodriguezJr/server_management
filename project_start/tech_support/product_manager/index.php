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
        include('product_list.php');
        break;
    
    default:
        include('../under_construction.php');
        break;
}

?>