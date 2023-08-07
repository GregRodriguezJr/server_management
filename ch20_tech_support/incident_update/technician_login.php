<?php include '../view/header.php'; ?>
<main>
    <h2>Technician Login</h2>
    <p>You must login before you can update an incident.</p>
    <!-- display a search form -->
    <form action="." method="post">
        <input type="hidden" name="action" value="display_incident_select">
        <label>Email:</label>
        <input type="input" name="email" value="<?php echo $email; ?>" size="35">
        <input type="submit" value="Login">
    </form>
</main>
<?php include '../view/footer.php'; ?>