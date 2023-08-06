<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php include '../view/header.php'; ?>
    <main>
        <h1>Update Incident</h1>
        <form action="index.php" method="post" id="aligned">

            <label>Incident ID:</label>
            <input type="hidden" name="incident_ID" value="<?php echo $incidentID ?>">
            <p style="padding-top: .25em;"><?php echo $incidentID ?></p>

            <label>Product Code:</label>
            <input type="hidden" name="product_code" value="<?php echo $incident['productCode'] ?>">
            <p style="padding-top: .25em;"><?php echo $incident['productCode'] ?></p>

            <label>Date Opened:</label>
            <input type="hidden" name="date_opened" value="<?php echo $incident['dateOpened'] ?>">
            <p 
                style="padding-top: .25em;">
                <?php echo ltrim(date('n/j/Y', strtotime($incident['dateOpened'])), '0') ?>
            </p>

            <label>Date Closed:</label>
            <input type="text" name="date_closed">
            <br>

            <label style="padding-top: .25em;">Title:</label>
            <input type="hidden" name="title" value="<?php echo $incident['title'] ?>">
            <p ><?php echo $incident['title'] ?></p>

            <label>Description:</label>
            <textarea name="description" rows="6" cols="50"><?php echo $incident['description'] ?></textarea>
            <br>
            <input type="hidden" name="action" value="update_incident">
            <input type="hidden" name="email" value="<?php echo $incident['email'] ?>">
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