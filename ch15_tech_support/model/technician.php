<?php
class Technician {
    private int $id;

    public function __construct(
        private string $first_name = '',
        private string $last_name = '',
        private string $email = '',
        private string $phone = '',
        private string $password = '',
    ) { }

    public function getID() {
        return $this->id;
    }
    public function setID($value) {
        $this->id = $value;
    }

    public function getFirstName() {
        return $this->first_name;
    }
    public function setFirstName($value) {
        $this->first_name = $value;
    }

    public function getLastName() {
        return $this->last_name;
    }
    public function setLastName($value) {
        $this->last_name = $value;
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($value) {
        $this->email = $value;
    }

    public function getPhone() {
        return $this->phone;
    }
    public function setPhone($value) {
        $this->phone = $value;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($value) {
        $this->password = $value;
    }
}
?>