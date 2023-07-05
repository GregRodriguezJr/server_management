<?php 
    declare(strict_types=1);
    
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

    // add product to db
    function add_product(string $product_code, string $name, float $version, string $release_date): void {
        global $db;
        $query = 'INSERT INTO products
                    (productCode, name, version, releaseDate)
                VALUES
                    (:product_code, :name, :version, :release_date)';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_code', $product_code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':version', $version);
        $statement->bindValue(':release_date', $release_date);
        $statement->execute();
        $statement->closeCursor();
    }
?>