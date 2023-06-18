<!-- Greg Rodriguez -->
<!-- Project 6 -->
<?php
    // return all customers from db
    function get_all_customers() {
        global $db;
        $query = 
            'SELECT * 
             FROM customers
             ORDER BY customerID';
        $statement = $db->prepare($query);
        $statement->execute();
        $customers = $statement->fetchAll();
        $statement->closeCursor();
        return $customers;
    }

    // return customers from search input
    function get_searched_customers($last_name) {
        global $db;
        $query = 'SELECT * 
                FROM customers
                WHERE lastName = :last_name
                ORDER BY customerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':last_name', $last_name);
        $statement->execute();
        $customers = $statement->fetchAll();
        $statement->closeCursor();
        return $customers;
    }
?>