<?php 
function get_all_projects() {
    global $db;
    $query = 'SELECT projects.*, employees.firstName, employees.lastName, clients.name AS clientName
                FROM projects
                JOIN employees ON projects.employeeID = employees.employeeID
                JOIN clients ON projects.clientID = clients.clientID
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

function get_project_by_id($project_id) {
    global $db;
    $query = 'SELECT * 
              FROM projects
              WHERE projectID = :project_id';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':project_id', $project_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function add_project($client_ID, $name, $description, $status, $start_date, $due_date, $employee_ID){
    global $db;
    $query = 'INSERT INTO projects
        (clientID, name, description, status, startDate, dueDate, employeeID)
        VALUES (:client_id, :name, :description, :status, :start_date, :due_date, :employee_id)';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':client_id', $client_ID);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':start_date', $start_date);
        $statement->bindValue(':due_date', $due_date);
        $statement->bindValue(':employee_id', $employee_ID);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_project($project_id, $client_ID, $name, $description, $status, $start_date, $due_date, $employee_ID) {
    global $db;
    $query = 'UPDATE projects
            SET name = :name,
            clientID = :client_ID,
            description = :description,
            status = :status,
            startDate = :start_date,
            dueDate = :due_date,
            employeeID = :employee_id
            WHERE projectID = :project_id';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':project_id', $project_id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':client_ID', $client_ID);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':start_date', $start_date);
        $statement->bindValue(':due_date', $due_date);
        $statement->bindValue(':employee_id', $employee_ID);
        $statement->execute();
        $statement->closeCursor();

    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
?>