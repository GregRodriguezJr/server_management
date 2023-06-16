<?php include '../view/header.php'; ?>
    <main>
        <h1>Edit Product</h1>
        <form
            action="index.php"
            method="post"
            id="add_product_form"
        >
            <input 
                type="hidden" 
                name="action" 
                value="update_product"
            >
            <input 
                type="hidden" 
                name="product_id" 
                value="<?php echo $product['productID']; ?>"
            >

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
            <input 
                type="text" 
                name="code" 
                value="<?php echo $product['productCode']; ?>"
            ><br>
            
            <label>Name:</label>
            <input 
                type="text" 
                name="name" 
                value="<?php echo $product['productName']; ?>"
            ><br>
            
            <label>Price:</label>
            <input 
                type="text" 
                name="price" 
                value="<?php echo $product['listPrice']; ?>"
            ><br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Update">
        </form>
        <p class="last_paragraph">
            <a href="index.php?action=list_products">View Product List</a>
        </p>
    </main>
<?php include '../view/footer.php'; ?>