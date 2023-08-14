<?php include '../view/header.php'; ?>
<main>

    <h2>Unassigned Incidents</h2>
    <p><a href="?action=display_assigned">View Assigned Incidents</a></p>
    <table>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Incident</th>
        </tr>
        <?php foreach ($incidents as $incident) :
            $timestamp = strtotime($incident['dateOpened']);
            $date_opened = date('n/j/Y', $timestamp);
        ?>
        <tr>
            <td>
                <?php echo $incident['firstName'] . 
                        ' ' . $incident['lastName']; ?>
            </td>
            <td>
                <?php echo $incident['productName']; ?>
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