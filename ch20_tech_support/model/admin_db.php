<!-- Greg Rodriguez -->
<!-- Ch. 21 Project -->
<?php
function get_admin_by_username($username) {
    global $db;
    $query = 'SELECT * 
            FROM administrators
            WHERE username = :username';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        
        if ($result === FALSE) { // no username with this email in database
            return NULL;
        } else {
            return $result;
        }
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
?>