<!-- Greg Rodriguez -->
<!-- Project -->
<?php include '../view/header.php'; ?>
    <main>
        <h1>Register Product</h1>

        <form id="aligned" method="post" action="index.php">
            <input
                type="hidden"
                name="action"
                value="register_product"
            >

            <label>Customer: </label>
            <?php echo $customer['firstName'] ?>
            <span>&nbsp;<?php echo $customer['lastName'] ?></span>
            <input 
                type="hidden"
                name="customer_id"
                value="<?php echo $customer['customerID'] ?>"
            >
            <br>

            <label>Product:</label>
            <select style="width: 16em;" name="product_code">
                <?php foreach ($products as $product) : ?>
                    <!-- loop through products to display options -->
                    <option value="<?php echo $product['productCode']; ?>" >
                        <?php echo $product['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label></label>
            <input 
                type="submit"
                name="submit"
                value="Register Product"
            >
        </form>
            
    </main>
<?php include '../view/footer.php'; ?>