<?php 
    class Technician {
        public $firstName;
        public $lastName;
        public $techID;
        public $email;
        public $phone;
        public $password;

        public function __construct($firstName, $lastName, $techID, $email, $phone, $password) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->techID = $techID;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = $password;
        }

        public function getFullName() {
            return $this->firstName . ' ' . $this->lastName;
        }
    }
?>