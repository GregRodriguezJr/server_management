<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php include '../view/header.php'; ?>
    <main>
        <h1>Update Incident</h1>
        <p>This incident was updated</p>
        <form action="." method="post">
            <input type="hidden" name="action" value="login">
            <button 
                type="submit"
                style="background: none; border:none; color: blue; 
                text-decoration: underline; cursor:pointer; padding:0; margin:0;
                font-size: 18px"
            >
                Select Another Incident
            </button>
        </form>
        <p>You are logged in as <?php echo $_SESSION['email'] ?></p>
        <form action="." method="post">
            <input type="hidden" name="action" value="show_technician_login">
            <input type="submit" value="Logout">
        </form>
    </main>
<?php include '../view/footer.php'; ?>