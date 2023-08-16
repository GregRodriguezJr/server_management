<?php 
function get_all_projects() {
    global $db;
    $query = 'SELECT projects.*, employee.firstName, employee.lastName
                FROM projects
                JOIN employee 
                ON projects.employeeID = employee.employeeID
                ORDER BY projects.status';
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
?>