<!-- Greg Rodriguez -->
<!-- Ch14 Project -->
<?php 
    class Database {
        private $db;
    
        public function __construct($dsn, $username, $password) {
            try {
                $this->db = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
    
        public function getDB() {
            return $this->db;
        }
    }
    
    // Connection details
    $dsn = 'mysql:host=localhost;dbname=tech_support';
    $username = 'ts_user';
    $password = 'pa55word';
    
    // Create an instance of the Database class and establish the database connection
    $database = new Database($dsn, $username, $password);
    $db = $database->getDB();
?>