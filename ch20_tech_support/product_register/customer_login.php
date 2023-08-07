<?php include '../view/header.php'; ?>
<main>

    <h2>Customer Login</h2>
    <p>You must login before you can register a product.</p>
    <!-- display a search form -->
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="display_register">

        <label>Email:</label>
        <input 
            type="text" 
            name="email" 
            value="<?php echo htmlspecialchars($email); ?>"
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