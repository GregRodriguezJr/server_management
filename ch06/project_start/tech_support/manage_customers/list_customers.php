<!-- Greg Rodriguez -->
<!-- Project 6 -->
<?php include '../view/header.php'; ?>
    <main>
        <h1>Customer List</h1>
        <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td><?php echo $customer['firstName']; ?></td>
                        <td><?php echo $customer['lastName']; ?></td>
                        <td><?php echo $customer['state']; ?></td>
                    </tr>
                <?php endforeach; ?>
    </main>
<?php include '../view/footer.php'; ?>
