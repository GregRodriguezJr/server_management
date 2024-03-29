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
                WHERE techID = :techID AND dateClosed IS NULL';
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

function get_incident_by_ID($incidentID) {
    global $db;
    try {
        $query = 'SELECT incidents.*, technicians.email
                FROM incidents 
                INNER JOIN technicians ON incidents.techID = technicians.techID
                WHERE incidentID = :incidentID';
        $statement = $db->prepare($query);
        $statement->bindValue(':incidentID', $incidentID);
        $statement->execute();
        $incident = $statement->fetch();
        $statement->closeCursor();
        return $incident;
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}

function update_incident($incidentID, $productCode, $dateOpened, $dateClosed, $title, $description) {
    global $db;
    try {
        $query = 'UPDATE incidents 
                SET dateClosed = :dateClosed, 
                title = :title, 
                description = :description, 
                productCode = :productCode, 
                dateOpened = :dateOpened 
                WHERE incidentID = :incidentID';
        $statement = $db->prepare($query);
        $statement->bindValue(':dateClosed', $dateClosed);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':productCode', $productCode);
        $statement->bindValue(':dateOpened', $dateOpened);
        $statement->bindValue(':incidentID', $incidentID);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}

?>