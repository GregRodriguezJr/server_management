<?php     
    require_once 'technician.php';

    class TechnicianDB {
        // method get all technicians from database
        public function get_all_technicians() {
            global $db;
            $query = 
                'SELECT *
                FROM technicians
                ORDER BY firstName';
            $statement = $db->prepare($query);
            $statement->execute();
            $techniciansInfo = $statement->fetchAll();
            $statement->closeCursor();

            // store technicians in an array using Technician class
            $technicians = [];
            foreach ($techniciansInfo as $technicianInfo) {
                $technicians[] = new Technician(
                    $technicianInfo['firstName'],
                    $technicianInfo['lastName'],
                    $technicianInfo['techID'],
                    $technicianInfo['email'],
                    $technicianInfo['phone'],
                    $technicianInfo['password']
                );
            }
            return $technicians;
        }
    }
?>