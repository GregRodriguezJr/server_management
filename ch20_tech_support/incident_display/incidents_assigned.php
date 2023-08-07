<?php include '../view/header.php'; ?>
<main>
    <h2>Assigned Incidents</h2>
    <p><a href="?action=display_unassigned">View Unassigned Incidents</a></p>
    <table>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Technician</th>
            <th>Incident</th>
        </tr>
        <?php foreach ($incidents as $incident) :
            $timestamp = strtotime($incident['dateOpened']);
            $date_opened = date('n/j/Y', $timestamp);

            if (isset($incident['dateClosed'])) {
                $timestamp = strtotime($incident['dateClosed']);
                $date_closed = date('n/j/Y', $timestamp);
            } else {
                $date_closed = 'OPEN';
            }
        ?>
        <tr>
            <td>
                <?php echo $incident['customerFirstName'] . 
                        ' ' . $incident['customerLastName']; ?>
            </td>
            <td>
                <?php echo $incident['productName']; ?>
            </td>
            <td>
                <?php echo $incident['techFirstName'] . 
                        ' ' . $incident['techLastName']; ?>
            </td>
            <td>
                <table class="no_border">
                    <tr>
                        <td>ID:</td>
                        <td><?php echo $incident['incidentID']; ?></td>
                    </tr>
                    <tr>
                        <td>Opened:</td>
                        <td><?php echo $date_opened; ?></td>
                    </tr>
                    <tr>
                        <td>Closed:</td>
                        <td><?php echo $date_closed; ?></td>
                    </tr>
                    <tr>
                        <td>Title:</td>
                        <td><?php echo $incident['title']; ?></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><?php echo $incident['description']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php include '../view/footer.php'; ?>