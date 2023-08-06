<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php include '../view/header.php'; ?>
    <main>
        <h1>Update Incident</h1>
        <form id="aligned">
            <label>Incident ID:</label>
            <p style="padding-top: .25em;"><?php echo $incidentID ?></p>
            <label>Product Code:</label>
            <p style="padding-top: .25em;"><?php echo $incident['productCode'] ?></p>
            <label>Date Opened:</label>
            <p 
                style="padding-top: .25em;">
                <?php echo ltrim(date('n/j/Y', strtotime($incident['dateOpened'])), '0') ?>
            </p>
            <label>Date Closed:</label>
            <input type="text">
            <br>
            <label style="padding-top: .25em;">Title:</label>
            <p ><?php echo $incident['title'] ?></p>
            <label>Description:</label>
            <textarea name="description" rows="6" cols="50"><?php echo $incident['description'] ?></textarea>
            <br>
            <input type="submit" value="Update Incident">
        </form>

        <p>You are logged in as <?php echo $incident['email'] ?> </p>
        <!-- link to return to login page -->
        <form action="." method="post">
            <input type="hidden" name="action" value="show_technician_login">
            <input type="submit" value="Logout">
        </form>
    </main>
<?php include '../view/footer.php'; ?>