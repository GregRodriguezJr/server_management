<?php
class TechnicianDB {

    public static function getTechnicians() {
        $db = Database::getDB();

        try {
            $query = 'SELECT * FROM technicians
                      ORDER BY lastName';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $technicians = array();
            foreach($rows as $row) {
                $t = new Technician(
                        $row['firstName'], $row['lastName'],
                        $row['email'], $row['phone'], $row['password']);
                $t->setID($row['techID']);
                $technicians[] = $t;
            }
            return $technicians;
        } catch (PDOException $e) {
            $error = "Database Error: " . $e->getMessage();
            include('../errors/error.php');
            exit();
        }
    }

    public static function deleteTechnician($technician_id) {
        $db = Database::getDB();

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

    public static function addTechnician($t) {
        $db = Database::getDB();
        
        try {
            $query = 'INSERT INTO technicians
                         (firstName, lastName, phone, email, password)
                      VALUES
                         (:first_name, :last_name, :phone, :email, :password)';
            $statement = $db->prepare($query);
            $statement->bindValue(':first_name', $t->getFirstName());
            $statement->bindValue(':last_name', $t->getLastName());
            $statement->bindValue(':phone', $t->getPhone());
            $statement->bindValue(':email', $t->getEmail());
            $statement->bindValue(':password', $t->getPassword());
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error = "Database Error: " . $e->getMessage();
            include('../errors/error.php');
            exit();
        }
    }
}
?>