<!-- Greg Rodriguez -->
<!-- Ch. 21 Project -->
<?php include '../view/header.php'; ?>
    <main>
        <h2>Admin Login</h2>
        <p>You must login before you can register a product.</p>
        <!-- display a search form -->
        <form action="." method="post" id="aligned">
            <input type="hidden" name="action" value="display_admin_menu">

            <label>Username:</label>
            <input 
                type="text" 
                name="username" 
                value="<?php echo htmlspecialchars($username); ?>"
                required
            >
            <br>

            <label>Password:</label>
            <input 
                type="password" 
                name="password"
                required
            >
            <br>

            <label></label>
            <input 
                type="submit" 
                value="Login"
            >
        </form>
    </main>
<?php include '../view/footer.php'; ?>