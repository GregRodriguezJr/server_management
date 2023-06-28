<!-- Greg Rodriguez -->
<!-- Project -->
<?php 
    // get all products from data base
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
?>