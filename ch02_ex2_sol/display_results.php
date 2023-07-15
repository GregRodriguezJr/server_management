<!--Greg Rodriguez-->
<!--Lab Assignment 14-1B-->

<?php
    // include the FutureValue class
    require_once 'FutureValue.php';

    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment',
        FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate',
        FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years',
        FILTER_VALIDATE_INT);

    // create an instance of the FutureValue class
    $futureValueObj = new FutureValue();

    // set values
    $futureValueObj->setInvestment($investment);
    $futureValueObj->setInterestRate($interest_rate);
    $futureValueObj->setYears($years);

    // validate values
    $error_message = $futureValueObj->validateValues();
    
    // if an error message exists, display errors with form
    if ($error_message != '') {
        include('index.php');
        exit();
      // added else statement to continue script if no errors exist
    } else {
        // calculate the future value
        $future_value = $futureValueObj->calculateFutureValue();
        // apply currency and percent formatting
        $yearly_rate_f = $futureValueObj->formatPercent($interest_rate);
        $investment_f = $futureValueObj->formatCurrency($investment);
        $future_value_f = $futureValueObj->formatCurrency($future_value);
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