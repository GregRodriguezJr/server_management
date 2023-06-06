<!--Greg Rodriguez-->
<!--Assignment 2-1-->

<?php
	$product_description = filter_input(INPUT_POST, 'product_description');
	$list_price = filter_input(INPUT_POST, 'list_price');
	$discount_percent = filter_input(INPUT_POST, 'discount_percent');
	
        $discount = $list_price * $discount_percent * .01;
        $discount_price = $list_price - $discount;

        // sales tax rate
        $salesTaxRate = .08;
        // Sales tax calculation
        $salesTax = $discount_price * $salesTaxRate;
        // Post tax price
        $postTaxPrice = $discount_price - $salesTax;
        
        $list_price_f = "$".number_format($list_price, 2);
        $discount_percent_f = $discount_percent."%";
        $discount_f = "$".number_format($discount, 2);
        $discount_price_f = "$".number_format($discount_price, 2);
        // format sales tax rate
        $salesTaxRate_f = ($salesTaxRate * 100)."%";
        // format sales tax amount
        $salesTax_f = "$".number_format($salesTax, 2);
        // format post tax price
        $postTaxPrice_f = "$".number_format($postTaxPrice,2)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>
        <hr>
        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo $list_price_f; ?></span><br>

        <label>Discount Percent:</label>
        <span><?php echo $discount_percent_f; ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_f; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_f; ?></span><br>

        <!--render results-->
        <label>Sales Tax Rate:</label>
        <span><?php echo $salesTaxRate_f; ?></span><br>

        <label>Sales Tax Amount:</label>
        <span><?php echo $salesTax_f; ?></span><br>

        <label>Total Price:</label>
        <span><?php echo $postTaxPrice_f; ?></span><br>

    </main>
</body>
</html>