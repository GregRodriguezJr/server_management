<!-- Greg Rodriguez -->
<!-- Project 6 -->
<?php include '../view/header.php'; ?>
    <main>
        <h1>View/Update Customer</h1>

        <!-- display error message for invalid inputs -->
        <?php if(isset($error_message)) : ?>
            <p class="error"><?php echo $error_message ?></p>
        <?php endif; ?>
        
        <!-- diplay success message -->
        <?php if(isset($success)) : ?>
            <p class="success"><?php echo $success_message ?></p>
        <?php endif; ?>

        <form 
            method="post"
            action="index.php"
            id="aligned"
        >
            <input
                type="hidden"
                name="action"
                value="update_customer"
            >
            <input
                type="hidden"
                name="customer_id"
                value="<?php echo $customer['customerID'] ?>"
            >
            <label>First Name:</label>
            <input 
                type="text" 
                name="first_name"
                value="<?php echo $customer['firstName']?>"
                required
            ><br>
            <label>Last Name:</label>
            <input 
                type="text" 
                name="last_name"
                value="<?php echo $customer['lastName']?>"
                required
            ><br>
            <label>Address:</label>
            <input 
                type="text" 
                name="address"
                value="<?php echo $customer['address']?>"
                required
                class="wide-input"
            ><br>
            <label>City:</label>
            <input 
                type="text" 
                name="city"
                value="<?php echo $customer['city']?>"
                required
            ><br>
            <label>State:</label>
            <input 
                type="text" 
                name="state"
                value="<?php echo $customer['state']?>"
                required
            ><br>
            <label>Postal Code:</label>
            <input 
                type="text" 
                name="postal_code"
                value="<?php echo $customer['postalCode']?>"
                required
            ><br>
            <label>Country Code:</label>
            <!-- added select element to loop through options and display all country codes -->
            <select 
                name="country_code"
                required
            >
                <?php foreach ($countries as $country) : ?>
                    <?php if ($country['countryCode'] === $customer['countryCode']) : ?>
                        <!-- dynamically set customer country code as default option -->
                        <option 
                            value="<?php echo $country['countryCode']; ?>" 
                            selected><?php echo $country['countryName']; ?>
                        </option>
                    <?php else : ?>
                        <option 
                            value="<?php echo $country['countryCode']; ?>">
                            <?php echo $country['countryName']; ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label>Phone:</label>
            <input 
                type="tel" 
                name="phone"
                value="<?php echo $customer['phone']?>"
                required
            ><br>
            <label>Email:</label>
            <input 
                type="email" 
                name="email"
                value="<?php echo $customer['email']?>"
                required
                class="wide-input"
            ><br>
            <label>Password:</label>
            <input 
                type="password" 
                name="password"
                value="<?php echo $customer['password']?>"
                required
            ><br>
            <label></label>
            <input 
                type="submit"
                name="submit" 
                value="Update Customer"
            >
        </form>
        <a href="index.php?action=customer_search_form">Search Customers</a>
    </main>
<?php include '../view/footer.php'; ?>