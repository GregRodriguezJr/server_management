<?php

// Greg Rodriguez
// Project 19

function get_technicians() {
    global $db;
    try {
        $query = 'SELECT * FROM technicians
                  ORDER BY lastName';
        $statement = $db->prepare($query);
        $statement->execute();
        $technicians = $statement->fetchAll();
        $statement->closeCursor();   
        return $technicians;
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}

function delete_technician($technician_id) {
    global $db;
    try {
        $query = 'DELETE FROM technicians
                  WHERE techID = :technician_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':technician_id', $technician_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}

function add_technician($first_name, $last_name, $email, $phone, $password) {
    global $db;
    try {
        $query = 'INSERT INTO technicians
                     (firstName, lastName, phone, email, password)
                  VALUES
                     (:first_name, :last_name, :phone, :email, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}

function update_technician($technician_id, $first_name, $last_name, $email, $phone, $password) {
    global $db;
    try {
        $query = 'UPDATE technicians
                  SET firstName = :first_name,
                      lastName = :last_name,
                      phone = :phone,
                      email = :email,
                      password = :password
                  WHERE technicianID = :technician_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':technician_id', $technician_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}

?>