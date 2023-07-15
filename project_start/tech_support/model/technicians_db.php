<?php     
    // get all technicians from database
    function get_all_technicians() {
        global $db;
        $query = 
            'SELECT *
            FROM technicians
            ORDER BY firstName';
        $statement = $db->prepare($query);
        $statement->execute();
        $techicians = $statement->fetchAll();
        $statement->closeCursor();
        return $techicians;
    }
?>