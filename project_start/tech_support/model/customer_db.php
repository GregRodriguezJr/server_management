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
        $query = 
                'SELECT * 
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

    // get single customer by ID
    function get_customer($customer_id) {
        global $db;
        $query = 
                'SELECT * 
                FROM customers
                WHERE customerID = :customer_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->execute();
        $customer = $statement->fetch();
        $statement->closeCursor();
        return $customer;
    }

    // updates customer fields
    function update_customer($customer_id, $first_name, $last_name, $address, $city,
    $state, $postal_code, $country_code, $phone, $email, $password) {
        global $db;
        $query = 
            'UPDATE customers
            SET customerID = :customer_id,
                firstName = :first_name,
                lastName = :last_name,
                address = :address,
                city = :city,
                state = :state,
                postalCode = :postal_code,
                countryCode =:country_code,
                phone = :phone,
                email = :email,
                password = :password
            WHERE customerID = :customer_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':postal_code', $postal_code);
        $statement->bindValue(':country_code', $country_code);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }

    // query to return all countries
    function get_all_countries() {
        global $db;
        $query = 
                'SELECT * 
                FROM countries
                ORDER BY countryName ASC';
        $statement = $db->prepare($query);
        $statement->execute();
        $countries = $statement->fetchAll();
        $statement->closeCursor();
        return $countries;
    }
?>