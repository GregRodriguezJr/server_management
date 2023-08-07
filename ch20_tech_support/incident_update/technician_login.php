<?php include '../view/header.php'; ?>
<main>
    <h2>Technician Login</h2>
    <p>You must login before you can update an incident.</p>
    <!-- display a search form -->
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="display_incident_select">

        <label>Email:</label>
        <input 
            type="text" 
            name="email" 
            value="<?php echo htmlspecialchars($email); ?>" 
            size="35"
            required
        >
        <br>

        <label>Password:</label>
        <input 
            type="password" 
            name="password"  
            size="35"
            required
        >
        <br>

        <label></label>
        <input type="submit" value="Login">
    </form>
</main>
<?php include '../view/footer.php'; ?>