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
?>