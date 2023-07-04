<!-- Greg Rodriguez -->
<!-- Project -->
<?php
    // add new registration
    function new_registration($customer_id, $product_code, $registrationDate) {
        global $db;
        $query = 'INSERT INTO registrations
                    (customerID, productCode, registrationDate)
                VALUES
                    (:customer_id, :product_code, :registrationDate)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':product_code', $product_code);
        $statement->bindValue(':registrationDate', $registrationDate);
        $statement->execute();
        $statement->closeCursor();
    }
?>