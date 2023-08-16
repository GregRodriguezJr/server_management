<?php
function get_all_employees() {
    global $db;
    $query = 'SELECT * FROM employees
              ORDER BY lastName';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_employee_by_last_name($last_name) {
    global $db;
    $query = 'SELECT * FROM employees
              WHERE lastName = :last_name
              ORDER BY lastName';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':last_name', $last_name);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_employee_by_ID($employee_id) {
    global $db;
    $query = 'SELECT * FROM employees
              WHERE employeeID = :employee_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':employee_id', $employee_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_employee_by_email($email) {
    global $db;
    $query = 'SELECT * FROM employees
              WHERE email = :email';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        
        if ($result === FALSE) { // no employee with this email in database
            return NULL;
        } else {
            return $result;
        }
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function delete_employee($employee_id) {
    global $db;
    $query = 'DELETE FROM employees
              WHERE employeeID = :employee_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':employee_id', $employee_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function add_employee($first_name, $last_name, 
        $address, $city, $state, $postal_code, $country_code,
        $phone, $email, $password) {
    global $db;
    $query = 'INSERT INTO employees
                 (firstName, lastName,
                  address, city, state, postalCode, countryCode,
                  phone, email, password)
              VALUES
                 (:first_name, :last_name,
                  :address, :city, :state, :postal_code, :country_code,
                  :phone, :email, :password)';
    try {
        $statement = $db->prepare($query);
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

        // Get the last product ID that was automatically generated
        $id = $db->lastInsertId();
        return $id;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_employee($employee_id, $first_name, $last_name,
        $address, $city, $state, $postal_code, $country_code,
        $phone, $email, $password) {
    global $db;
    $query = 'UPDATE employees
              SET firstName = :first_name,
                  lastName = :last_name,
                  address = :address,
                  city = :city,
                  state = :state,
                  postalCode = :postal_code,
                  countryCode = :country_code,
                  phone = :phone,
                  email = :email,
                  password = :password
              WHERE employeeID = :employee_id';
    try {
        $statement = $db->prepare($query);
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
        $statement->bindValue(':employee_id', $employee_id);
        $statement->execute();
        $row_count = $statement->rowCount();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
?>