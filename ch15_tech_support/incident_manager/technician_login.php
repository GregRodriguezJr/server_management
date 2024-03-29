<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php include '../view/header.php'; ?>
    <main>
        <h2>Technician Login</h2>
        <p>You must login before you can update an incident.</p>
        <form action="index.php" method="post">
            <label>Email:</label>
            <input
                type="hidden"
                name="action"
                value="login"
            >
            <input
                type="email"
                placeholder="example@gmail.com"
                name="email"
                required
            >
            <input
                type="submit"
                name="submit"
                value="Login"
            >
        </form>

        <!-- display error message for invalid email -->
        <?php if(isset($error_message)) : ?>
            <p class="error"><?php echo $error_message ?></p>
        <?php endif; ?>
    </main>
<?php include '../view/footer.php'; ?>