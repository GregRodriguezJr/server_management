<?php 
    class Technician {
        public $first_name;
        public $last_name;
        public $tech_ID;
        public $email;
        public $phone;
        public $password;

        public function __construct($first_name, $last_name, $tech_ID, $email, $phone, $password) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->tech_ID = $tech_ID;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = $password;
        }

        public function getFullName() {
            return $this->first_name . ' ' . $this->last_name;
        }

        public function validateInput() {
            
            return '';
        }
    }
?>