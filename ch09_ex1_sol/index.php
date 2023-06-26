<!-- Greg Rodriguez -->
<!-- Lab Assignment 9-1B -->
<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';
// set new variable values
$middle_name = '';
$last_name = '';
$area_code = '';
$phone_number = '';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        // trim the spaces from the start and end of all data
        $name = trim($name);
        $email = trim($email);
        $phone = trim($phone);

        // validate name
        if (empty($name)) {
            $message = 'You must enter a name.';
            break;
        }

        // capitalize the first letters only
        $name = strtolower($name);
        $name = ucwords($name);

        // get first name from complete name
        $i = strpos($name, ' ');
        if ($i === FALSE) {
            $first_name = $name;
        } else {
            $first_name = substr($name, 0, $i);
        }

        // split up name variable into an array to check for multiple names
        $full_name = explode(' ', $name);

        // get middle name from complete name if 3 names are entered
        if(count($full_name) >= 3) {
            $middle_name = $full_name[1];
        } else {
            $middle_name = '';
        }

        // get last name from complete name if 2 names are entered
        if(count($full_name) >= 2) {
            $last_name = $full_name[count($full_name) - 1];
        } else {
            $last_name = '';
        }

        // validate email
        if (empty($email)) {
            $message = 'You must enter an email address.';
            break;
        } else if(!str_contains($email, '@')) {
            $message = 'The email address must contain an @ sign.';
            break;
        } else if(!str_contains($email, '.')) {
            $message = 'The email address must contain a dot character.';
            break;
        }

        // remove common formatting characters from the phone number
        $phone = str_replace('-', '', $phone);
        $phone = str_replace('(', '', $phone);
        $phone = str_replace(')', '', $phone);
        $phone = str_replace(' ', '', $phone);

        // validate the phone number
        if (strlen($phone) < 7) {
            $message = 'The phone number must contain at least seven digits.';
            break;
        }

        // format the phone number
        if (strlen($phone) == 7) {
            $part1 = substr($phone, 0, 3);
            $part2 = substr($phone, 3);
            $phone = $part1 . '-' . $part2;
            // variable for phone number
            $phone_number = $phone;
        } else {
            $part1 = substr($phone, 0, 3);
            $part2 = substr($phone, 3, 3);
            $part3 = substr($phone, 6);
            $phone = $part1 . '-' . $part2 . '-' . $part3;
            // variable for phone number and area code
            $area_code = $part1;
            $phone_number = $part2 . '-' . $part3;
        }

        // format the message
        $message =
            "Hello $first_name,\n\n" .
            "Thank you for entering this data:\n\n" .
            // display first name
            "First Name: $first_name\n" .
            // display middle name
            "Midde Name: $middle_name\n" .
            // display last name
            "Last Name: $last_name\n" .
            "Email: $email\n" .
            // display area code and phone number seperatly
            "Area Code: $area_code\n" .
            "Phone Number: $phone_number\n";

        break;
}
include 'string_tester.php';

?>