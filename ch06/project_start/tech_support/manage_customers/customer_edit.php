<!-- Greg Rodriguez -->
<!-- Project 6 -->
<?php include '../view/header.php'; ?>
    <main>
        <h1>View/Update Customer</h1>
        <form 
            method="post"
            action=""
            id="aligned"
        >
            <input
                type="hidden"
                name="action"
                value=""
            >
            <label>First Name:</label>
            <input 
                type="text" 
                name="first_name"
                value="<?php echo $customer['firstName']?>"
            ><br>
            <label>Last Name:</label>
            <input 
                type="text" 
                name="last_name"
                value="<?php echo $customer['lastName']?>"
            ><br>
            <label>Address:</label>
            <input 
                type="text" 
                name="address"
                value="<?php echo $customer['address']?>"
                class="wide-input"
            ><br>
            <label>City:</label>
            <input 
                type="text" 
                name="city"
                value="<?php echo $customer['city']?>"
            ><br>
            <label>State:</label>
            <input 
                type="text" 
                name="state"
                value="<?php echo $customer['state']?>"
            ><br>
            <label>Postal Code:</label>
            <input 
                type="number" 
                name="postalCode"
                value="<?php echo $customer['postalCode']?>"
            ><br>
            <label>Country Code:</label>
            <input 
                type="text" 
                name="countryCode"
                value="<?php echo $customer['countryCode']?>"
            ><br>
            <label>Phone:</label>
            <input 
                type="tel" 
                name="phone"
                value="<?php echo $customer['phone']?>"
            ><br>
            <label>Email:</label>
            <input 
                type="email" 
                name="email"
                value="<?php echo $customer['email']?>"
                class="wide-input"
            ><br>
            <label>Password:</label>
            <input 
                type="password" 
                name="password"
                value="<?php echo $customer['password']?>"
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
