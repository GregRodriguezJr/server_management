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
            $error_message = '';

            if(!preg_match('/^\d{3}-\d{3}-\d{4}$/', $this->phone)) {
                $error_message .= "Invalid phone format, must be 555-555-5555. <br>";
            }
            if(!ctype_alpha($this->first_name)) {
                $error_message .= "First name must be letter characters. <br>";
            }
            if(!ctype_alpha($this->last_name)) {
                $error_message .= "Last name must be letter characters. <br>";
            }
            if (!preg_match('/\.com$/', $this->email)) {
                $error_message .= "Invalid email format, must end with '.com'. <br>";
            }
            
            return $error_message;
        }
    }
?>