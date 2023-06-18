<!-- Greg Rodriguez -->
<!-- Project 6 -->
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
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
<?php include '../view/footer.php'; ?>
