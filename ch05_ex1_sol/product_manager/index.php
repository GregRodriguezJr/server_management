<!-- Greg Rodriguez -->
<!-- Lab Assignment 5-1 B -->
<?php
    require('../model/database.php');
    require('../model/product_db.php');
    require('../model/category_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_products';
        }
    }

    if ($action == 'list_products') {
        $category_id = filter_input(INPUT_GET, 'category_id', 
                FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == FALSE) {
            $category_id = 1;
        }
        $category_name = get_category_name($category_id);
        $categories = get_categories();
        $products = get_products_by_category($category_id);
        include('product_list.php');
    } else if ($action == 'delete_product') {
        $product_id = filter_input(INPUT_POST, 'product_id', 
                FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_POST, 'category_id', 
                FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == FALSE ||
                $product_id == NULL || $product_id == FALSE) {
            $error = "Missing or incorrect product id or category id.";
            include('../errors/error.php');
        } else { 
            delete_product($product_id);
            header("Location: .?category_id=$category_id");
        }
    } else if ($action == 'show_add_form') {
        $categories = get_categories();
        include('product_add.php');    
    } else if ($action == 'add_product') {
        $category_id = filter_input(INPUT_POST, 'category_id', 
                FILTER_VALIDATE_INT);
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price');
        if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
                $name == NULL || $price == NULL || $price == FALSE) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
        } else { 
            add_product($category_id, $code, $name, $price);
            header("Location: .?category_id=$category_id");
        }
    } else if ($action == 'list_categories') {
        $categories = get_categories();
        include('category_list.php');
    } else if ($action == 'add_category') {
        $name = filter_input(INPUT_POST, 'name');

        // Validate inputs
        if ($name == NULL) {
            $error = "Invalid category name. Check name and try again.";
            include('view/error.php');
        } else {
            add_category($name);
            header('Location: .?action=list_categories');  // display the Category List page
        }
    } else if ($action == 'delete_category') {
        $category_id = filter_input(INPUT_POST, 'category_id', 
                FILTER_VALIDATE_INT);
        delete_category($category_id);
        header('Location: .?action=list_categories');      // display the Category List page

    // handles the edit button to display product edit form for selected item
    } else if ($action == "show_edit_form") {
        $product_id = filter_input(INPUT_GET, 'product_id');
        $product = get_product($product_id);
        $categories = get_categories();
        include('product_edit.php');

      // handles the update of the selected item  
    } else if ($action == 'update_product') {
        $product_id = filter_input(INPUT_POST, 'product_id');
        $category_id = filter_input(INPUT_POST, 'category_id');
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        // Validate inputs
        if ($price <= 0 || $price == false || 
            // check if new imputs are strings and no special chars
            !is_string($code) || !preg_match('/^[a-zA-Z\s]+$/', $code) ||
            !is_string($name) || !preg_match('/^[a-zA-Z\s]+$/', $name)
            ) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
        } else {
            // call update product function to update database
            update_product($category_id, $code, $name, $price, $product_id);
            // displays the category page by category ID
            header("Location: .?category_id=$category_id");
        }
    }
?>