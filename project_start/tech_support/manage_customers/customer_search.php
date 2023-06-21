<!-- Greg Rodriguez -->
<!-- Project -->
<?php include '../view/header.php'; ?>
    <main>
        <h1>Customer Search</h1>
        <form 
            method="post"
            action="index.php?action=search_customers"
        >
            <input
                type="hidden"
                name="action"
                value="search_customers"
            >
            <label>Last Name:</label>
            <input 
                type="text" 
                name="last_name"
                required>
            <input 
                type="submit"
                name="submit" 
                value="Search"
            >
        </form>

        <!-- display error message for invalid inputs -->
        <?php if(isset($error_message)) : ?>
            <p class="error"><?php echo $error_message ?></p>
        <?php endif; ?>

        <!-- display search results -->
        <h1>Results</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>City</th>
                <th></th>
            </tr>
            <?php foreach ($customers as $customer) : ?>
                <tr>
                    <td><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></td>
                    <td><?php echo $customer['email']; ?></td>
                    <td><?php echo $customer['city']; ?></td>
                    <td>
                        <!-- select btn for each customer to edit/view page -->
                        <form action="index.php" method="get">
                            <input 
                                type="hidden" 
                                name="action"
                                value="show_edit_form"
                            >
                            <input 
                                type="hidden" 
                                name="customer_id"
                                value="<?php echo $customer['customerID']; ?>"
                            >
                            <input 
                                type="submit" 
                                value="Select"
                            >
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- Display to user if no results found -->
        <?php if($no_results) : ?>
            <p>No customers found with the last name  <?php echo $last_name ?> </p>
        <?php endif; ?>
    </main>
<?php include '../view/footer.php'; ?>
