<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php

function add_incident($customer_id, $product_code, $title, $description) {
    global $db;
    try {
        $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
        $query =
            'INSERT INTO incidents
                (customerID, productCode, dateOpened, title, description)
            VALUES (
                   :customer_id, :product_code, :date_opened,
                   :title, :description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':product_code', $product_code);
        $statement->bindValue(':date_opened', $date_opened);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}

function get_incidents_by_techID($techID) {
    global $db;
    try {
        $query = 'SELECT incidents.*, customers.firstName, customers.lastName 
                FROM incidents 
                INNER JOIN customers ON incidents.customerID = customers.customerID
                WHERE techID = :techID';
        $statement = $db->prepare($query);
        $statement->bindValue(':techID', $techID);
        $statement->execute();
        $incidents = $statement->fetchAll();
        $statement->closeCursor();
        return $incidents;
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}



?>