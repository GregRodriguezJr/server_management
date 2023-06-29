<?php include '../view/header.php'; ?>
    <main>
        <h1>Product List</h1>
        <!-- display all products -->
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
                <th></th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['productCode'] ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['version'] ?></td>
                    <td><?php echo $product['releaseDate'] ?></td>
                    <td>
                        <!-- form for delete btn -->
                        <form action="index.php" method="#">
                            <input
                                type="hidden"
                                name="action"
                                value="delete_product"
                            >
                            <input
                                type="hidden"
                                name="action"
                                value="<?php echo $product['productCode'] ?>"
                            >
                            <input
                                type="submit"
                                value="Delete"
                            >
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
<?php include '../view/footer.php'; ?>