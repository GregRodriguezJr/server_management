<?php include '../view/header.php'; ?>
<main>
    <h1>Add Client</h1>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="add_client">

        <label>Company Name:</label>
        <input type="text" name="name" required><br>

        <label>First Name:</label>
        <input type="text" name="first_name" required><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label>Email:</label>
        <input type="text" name="email" required><br>

        <label>Phone:</label>
        <input type="text" name="phone" required><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Client"><br>
    </form>
</main>
<?php include '../view/footer.php'; ?>