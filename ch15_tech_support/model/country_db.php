<?php
    // Greg Rodriguez
    // Project 19
    
function get_countries() {
    global $db;
    try {
        $query = 'SELECT * FROM countries
                  ORDER BY countryName';
        $statement = $db->prepare($query);
        $statement->execute();
        $countries = $statement->fetchAll();
        $statement->closeCursor();
        return $countries;
    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
        include('../errors/error.php');
        exit();
    }
}
?>