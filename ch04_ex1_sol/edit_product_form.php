<?php
    require('database.php');

    // Get all categories
    $query = 'SELECT *
              FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

    // Get single product
    $product_id = $_POST['product_id'];
    $queryProduct ='SELECT productCode, productName, listPrice, categoryID
                    FROM products
                    WHERE productID = :product_id';
    $statement2 = $db->prepare($queryProduct);
    $statement2->bindValue(':product_id', $product_id );
    $statement2->execute();
    $product = $statement2->fetch();
    $statement2->closeCursor();
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <form 
            action="edit_product.php" 
            method="post"
            id="add_product_form">

            <!-- edit category -->
            <label>Category:</label>
            <select name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <!-- set the default option dynamically based on product categoryID -->
                    <?php 
                        $selected = ($category['categoryID'] == $product['categoryID']) ? 'selected' : ''; 
                    ?>
                    <option 
                        value="<?php echo $category['categoryID']; ?>" 
                        <?php echo $selected; ?>
                    >
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Code:</label>
            <!-- Display placeholder of item -->
            <input 
                type="text" 
                name="code"
                placeholder="<?php echo $product['productCode']; ?>"
            >
            <br>

            <label>Name:</label>
            <!-- Display placeholder of item -->
            <input 
                type="text" 
                name="name"
                placeholder="<?php echo $product['productName']; ?>"
            ><br>

            <label>List Price:</label>
            <!-- Display placeholder of item -->
            <input 
                type="text" 
                name="price"
                placeholder="<?php echo $product['listPrice']; ?>"
            ><br>

            <label>&nbsp;</label>
            <input type="submit" value="Update Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>