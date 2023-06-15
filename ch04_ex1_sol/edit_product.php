<?php
    // Get the product data
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $product_id = $_POST['product_id'];

    // Validate inputs
    if ($price <= 0 || $price == false || 
        // check if new imputs are strings and no special chars
        !is_string($code) || !preg_match('/^[a-zA-Z\s]+$/', $code) ||
        !is_string($name) || !preg_match('/^[a-zA-Z\s]+$/', $name)
        ) {
        $error = "Invalid product data. Check all fields and try again.";
        include('error.php');
    } else {
        // added try catch to test error handling
        try {
            require_once('database.php');
            // edit the product in the database  
            $query = 'UPDATE products
                      SET categoryID = :category_id,
                          productCode = :code,
                          productName = :name,
                          listPrice = :price
                      WHERE productID = :product_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->bindValue(':code', $code);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':product_id', $product_id);
            $statement->execute();
            $statement->closeCursor();
            // Display the Product List page
            include('index.php');
        } catch (Exception $ex) {
            $error = "An error occurred while updating the product.";
            include('error.php');
        }
    }
?>