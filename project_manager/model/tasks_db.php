<?php
function get_all_tasks() {
    global $db;
    $query = 'SELECT * FROM tasks
              ORDER BY name';
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

function get_tasks_by_employee($employee_ID) {
    global $db;
    $query = 
            'SELECT * 
            FROM tasks 
            WHERE employeeID = :employee_ID';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':employee_ID', $employee_ID);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_task_by_ID($task_ID) {
    global $db;
    $query = 
            'SELECT * 
            FROM tasks
            WHERE taskID = :task_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':task_ID', $task_ID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function delete_task($task_ID) {
    global $db;
    $query = 'DELETE FROM tasks
              WHERE taskID = :task_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':task_ID', $task_ID);
        $statement->execute();
        $row_count = $statement->rowCount();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_task($task_ID, $status, $hours) {
    global $db;
    $query = 'UPDATE tasks
              SET status = :status,
                  hours = :hours
              WHERE taskID = :task_ID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':task_ID', $task_ID);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':hours', $hours);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

?>