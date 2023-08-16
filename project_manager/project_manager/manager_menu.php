<?php include '../view/header.php'; ?>
    <main>
        <h1>Project Manager Menu</h1>
        <p>You are logged in as <?php echo htmlspecialchars($employee['email']); ?></p>
        <form action="" method="post">
            <input type="hidden" name="action" value="logout">
            <input type="submit" value="Logout">
        </form>
    </main>
<?php include '../view/footer.php'; ?>