<!-- Greg Rodriguez -->
<!-- Ch. 20 Project -->

<?php include '../view/header.php'; ?>
    <main>
        <h1>Select Incident</h1>
        <!-- display refresh btn, run login logic again-->
        <?php if (empty($incidents)) : ?>
            <p>There are no open incidents.</p>
            <form action="index.php" method="post">
                <input
                    type="hidden"
                    name="action"
                    value="login"
                >
                <input
                    type="hidden"
                    name="email"
                    value="<?php echo $techEmail ?>"
                    required
                >
                <input
                    type="submit"
                    name="submit"
                    value="Refresh Incidents"
                >
            </form>
        <?php else : ?>
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
                        <td>
                            <?php echo $incident['firstName'] ?><br>
                            <?php echo $incident['lastName'] ?>
                        </td>
                        <td><?php echo $incident['productCode'] ?></td>
                        <!-- format date -->
                        <td><?php echo ltrim(date('n/j/Y', strtotime($incident['dateOpened'])), '0') ?></td>
                        <td><?php echo $incident['title'] ?></td>
                        <td><?php echo $incident['description'] ?></td>
                        <td>
                            <!-- form for select btn -->
                            <form action="index.php" method="post">
                                <input
                                    type="hidden"
                                    name="action"
                                    value="show_incident_display"
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
        <?php endif; ?>
        <p>You are logged in as <?php echo $technician['email'] ?> </p>
        <!-- link to return to login page -->
        <form action="." method="post">
            <input type="hidden" name="action" value="show_technician_login">
            <input type="submit" value="Logout">
        </form>
    </main>
<?php include '../view/footer.php'; ?>