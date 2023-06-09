<!-- Greg Rodriguez -->
<!-- Project -->
<?php include '../view/header.php'; ?>
    <main>
        <h1>Product List</h1>

        <!-- diplay delete success message -->
        <?php if(isset($delete_success)) : ?>
            <p class="success"><?php echo $delete_success_message ?></p>
        <?php endif; ?>
        
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
                    <!-- format date -->
                    <td><?php echo ltrim(date('n-j-Y', strtotime($product['releaseDate'])), '0') ?></td>
                    <td>
                        <!-- form for delete btn -->
                        <form action="index.php" method="post">
                            <input
                                type="hidden"
                                name="action"
                                value="delete_product"
                            >
                            <input
                                type="hidden"
                                name="product_code"
                                value="<?php echo $product['productCode'] ?>"
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
        <p><a href="index.php?action=show_add_product">Add Product</a></p>
    </main>
<?php include '../view/footer.php'; ?>
<!-- Experimenting with client side JavaScript -->
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
<!-- JS alert to confirm the add product was complete -->
<?php if(isset($_GET['add_success'])) : ?>
    <script type="text/Javascript">
        alert("Product add was successful");
    </script>
<?php endif; ?>