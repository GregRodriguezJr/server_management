<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php include '../view/header.php'; ?>
    <main>
        <h1>Select Incident</h1>
         <!-- display all Incidents -->
         <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Date Opened</th>
                <th>Title</th>
                <th>Description</th>
                <th></th>
            </tr>
            <?php foreach ($incidents as $incident) : ?>
                <tr>
                    <td><?php echo $incident['customerID'] ?></td>
                    <td><?php echo $incident['productCode'] ?></td>
                    <!-- format date -->
                    <td><?php echo ltrim(date('n/j/Y', strtotime($incident['dateOpened'])), '0') ?></td>
                    <td><?php echo $incident['title'] ?></td>
                    <td><?php echo $incident['description'] ?></td>
                    <td>
                        <!-- form for delete btn -->
                        <form action="index.php" method="post">
                            <input
                                type="hidden"
                                name="action"
                                value="show_incident_edit"
                            >
                            <input
                                type="hidden"
                                name="incident_ID"
                                value="<?php echo $incident['incidentID'] ?>"
                            >
                            <input
                                type="submit"
                                value="Select"
                            >
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>You are logged in as <?php echo $technician['email'] ?> </p>
    </main>
<?php include '../view/footer.php'; ?>