<?php include '../view/header.php'; ?>
<main>
    <h2>Select Technician</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Open Incidents</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($technicians as $technician) : ?>
        <tr>
            <td><?php echo $technician['firstName'] . ' ' . $technician['lastName']; ?></td>
            <td><?php echo $technician['openIncidentCount']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action" value="select_technician">
                <input type="hidden" name="technician_id"
                       value="<?php echo $technician['techID']; ?>">
                <input type="submit" value="Select">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php include '../view/footer.php'; ?>