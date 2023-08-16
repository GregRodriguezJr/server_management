<?php include '../view/header.php'; ?>
<main>
    <h1>Update Client</h1>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="update_client">
        <input type="hidden" name="client_ID" value="<?php echo $client['clientID'] ?>">

        <label>Company Name:</label>
        <input type="text" name="name" value="<?php echo $client['name'] ?>"><br>

        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo $client['firstName'] ?>"><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $client['lastName'] ?>"><br>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $client['email'] ?>"><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $client['phone'] ?>"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Client"><br>
    </form>
</main>
<?php include '../view/footer.php'; ?>