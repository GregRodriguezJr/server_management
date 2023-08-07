<?php include '../view/header.php'; ?>
<main>

    <h2>Select Incident</h2>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
        <p><a href="">Refresh List of Incidents</a></p>
    <?php else : ?>
    <table>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Date&nbsp;Opened</th>
            <th>Title</th>
            <th>Description</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($incidents as $incident) : 
            $timestamp = strtotime($incident['dateOpened']);
            $date_opened = date('n/j/Y', $timestamp);
        ?>
        <tr>
            <td><?php echo $incident['firstName'] . ' ' . $incident['lastName']; ?></td>
            <td><?php echo $incident['productCode']; ?></td>
            <td><?php echo $date_opened; ?></td>
            <td><?php echo $incident['title']; ?></td>
            <td><?php echo $incident['description']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action" value="select_incident">
                <input type="hidden" name="incident_id"
                       value="<?php echo $incident['incidentID']; ?>">
                <input type="submit" value="Select">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <p>You are logged in as <?php echo $_SESSION['technician']['email']; ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout" />
        <input type="submit" value="Logout" />
    </form>
</main>
<?php include '../view/footer.php'; ?>