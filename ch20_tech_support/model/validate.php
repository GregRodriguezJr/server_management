<?php
class Validate {
    private $fields;

    public function __construct() {
        $this->fields = new Fields();
    }

    public function getFields() {
        return $this->fields;
    }

    // Validate a generic text field and return the Field object
    public function text($name, $value, $min = 1, $max = 255) {  

        // Get Field object and set its value
        $field = $this->fields->getField($name);
        $field->setValue($value);
        
        // Check field and set or clear error message
        if ($field->isRequired() && $field->isEmpty()) {
            $field->setErrorMessage('Required.');
        } else if (strlen($value) < $min && !$field->isEmpty()) {
            $field->setErrorMessage('Too short.');
        } else if (strlen($value) > $max) {
            $field->setErrorMessage('Too long.');
        } else {
            $field->clearErrorMessage();
        }
        
        return $field;
    }

    // Validate a field with a generic pattern
    public function pattern($name, $value, $pattern, $message) {
        // Get Field object and do text field check
        $field = $this->text($name, $value);

        // if OK after text field check, move on to pattern check
        if (!$field->hasError() && !$field->isEmpty()) {
            $match = preg_match($pattern, $value);
            if ($match === FALSE) {
                $field->setErrorMessage('Error testing field.');
            } else if ( $match != 1 ) {
                $field->setErrorMessage($message);
            } else {
                $field->clearErrorMessage();
            }
        }
    }
    
    public function phone($name, $value) {
        // Get Field object and do text field check
        $field = $this->text($name, $value);

        // if OK after text field check, move on to phone check
        if (!$field->hasError() && !$field->isEmpty()) {
            // Call the pattern method to validate a phone number in the (999) 999-9999 format
            $pattern = '/^\([[:digit:]]{3}\) [[:digit:]]{3}-[[:digit:]]{4}$/';
            $message = 'Use (999) 999-9999 format.';
            $this->pattern($name, $value, $pattern, $message);
        }
    }

    public function email($name, $value) {
        // Get Field object and do text field check
        $field = $this->text($name, $value);

        // if OK after text field check, move on to email check
        if (!$field->hasError() && !$field->isEmpty()) {
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $field->clearErrorMessage();
            } else {
                $field->setErrorMessage("Invalid email address.");
            }
        }
    }
}
?>