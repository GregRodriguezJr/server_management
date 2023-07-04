<!--Greg Rodriguez-->
<!--Lab Assignment 13-1-->

<?php
    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment',
        FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate',
        FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years',
        FILTER_VALIDATE_INT);

    // functions
    function calc_future_value($investment, $years, $interest_rate) {
        for ($i = 1; $i <= $years; $i++) {
            $investment += $investment * $interest_rate *.01;
        }
        return $investment;
    };

    function currency_format($num) {
        return '$'.number_format($num, 2);
    };

    function percent_format($num) {
        return $num.'%';
    };

    // set default error message of empty string
    $error_message = '';
    
    // validate investment
    if ($investment === FALSE ) {
        $error_message .= 'Investment must be a valid number.<br>'; 
    } else if ( $investment <= 0 ) {
        $error_message .= 'Investment must be greater than zero.<br>'; 
    } 
    
    // validate interest rate
    if ( $interest_rate === FALSE )  {
        $error_message .= 'Interest rate must be a valid number.<br>'; 
    } else if ( $interest_rate <= 0 ) {
        $error_message .= 'Interest rate must be greater than zero.<br>'; 
    } else if ( $interest_rate > 15 ) {
        $error_message .= 'Interest rate must be less than or equal to 15.<br>';
    }
    
    // validate years
    if ( $years === FALSE ) {
        $error_message .= 'Years must be a valid whole number.<br>';
    } else if ( $years <= 0 ) {
        $error_message .= 'Years must be greater than zero.<br>';
    } else if ( $years > 30 ) {
        $error_message .= 'Years must be less than 31.<br>';
    } 

    // if an error message exists, display errors with form
    if ($error_message != '') {
        include('index.php');
        exit();
      // added else statement to continue script if no errors exist
    } else {
        // calculate the future value
        $future_value = calc_future_value($investment, $years, $interest_rate);
        // apply currency and percent formatting
        $yearly_rate_f = percent_format($interest_rate);
        $investment_f = currency_format($investment);
        $future_value_f = currency_format($future_value);
        // create extra $years variable, original is cleared from input
        $year_f = $years;
        // include the original form from index.php file
        include('index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
    <main>
        <!--removed duplicate title-->

        <label>Investment Amount:</label>
        <span><?php echo htmlspecialchars($investment_f); ?></span><br />

        <label>Yearly Interest Rate:</label>
        <span><?php echo htmlspecialchars($yearly_rate_f); ?></span><br />

        <label>Number of Years:</label>
        <span><?php echo htmlspecialchars($year_f); ?></span><br />

        <label>Future Value:</label>
        <span><?php echo htmlspecialchars($future_value_f); ?></span><br />

        <p>This calculation was done on <?php echo date('m/d/Y'); ?>.</p>
    </main>
</body>
</html>