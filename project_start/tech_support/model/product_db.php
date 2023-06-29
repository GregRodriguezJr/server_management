<!-- Greg Rodriguez -->
<!-- Project -->
<?php 
    // get all products from database
    function get_all_products() {
        global $db;
        $query = 
            'SELECT *
            FROM products
            ORDER BY name';
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }

    // delete product from database
    function delete_product($product_code) {
        global $db;
        $query = 
            'DELETE
            FROM products
            WHERE productCode = :product_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_code', $product_code);
        $statement->execute();
        $statement->closeCursor();
    }
?>