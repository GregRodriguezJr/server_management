<?php include '../view/header.php'; ?>
    <main>
        <h1>Technician List</h1>
        <!-- display all technicians -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th></th>
            </tr>
            <?php foreach ($technicians as $technician) : ?>
                <tr>
                    <td><?php echo $technician->getFullName(); ?></td>
                    <td><?php echo $technician->email; ?></td>
                    <td><?php echo $technician->phone; ?></td>
                    <td><?php echo $technician->password; ?></td>
                    <td>
                        <!-- form for delete btn -->
                        <form action="index.php" method="post">
                            <input
                                type="hidden"
                                name="action"
                                value="delete_technician"
                            >
                            <input
                                type="hidden"
                                name="tech_ID"
                                value="<?php echo $technician->techID; ?>"
                            >
                            <input
                                type="submit"
                                value="Delete"
                                onclick="return confirmSubmit()"
                            >
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="index.php?action=#">Add Technician</a></p>
    </main>
<?php include '../view/footer.php'; ?>
<!-- JS alert to confirm delete btn submission -->
<?php
    echo'<script type="text/Javascript">
            const confirmSubmit = () => {
                let agree = confirm("Are you sure you want to delete?");
                if(agree){
                    return true;
                } else {
                    return false;
                }
            }
        </script>'
?>