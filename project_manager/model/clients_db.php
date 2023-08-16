<?php
function get_all_clients() {
    global $db;
    $query = '  SELECT * 
                FROM clients
                ORDER BY clientID';
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

function get_client_by_id($client_id) {
    global $db;
    $query = 'SELECT * 
              FROM clients
              WHERE clientID = :client_id';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':client_id', $client_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function add_client($name, $first_name, $last_name, $email, $phone){
    global $db;
    $query = 'INSERT INTO clients
              (name, firstName, lastName, email, phone)
              VALUES (:name, :first_name, :last_name, :email, :phone)';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_client($client_id, $name, $first_name, $last_name, $email, $phone) {
    global $db;
    $query = 'UPDATE clients
              SET name = :name,
                  firstName = :first_name,
                  lastName = :last_name,
                  email = :email,
                  phone = :phone
              WHERE clientID = :client_id';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':client_id', $client_id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
?>