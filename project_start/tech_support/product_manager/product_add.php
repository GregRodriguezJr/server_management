<?php include '../view/header.php'; ?>
    <main>
        <h1>Add Product</h1>

        <form
            action="index.php"
            method="post"
            id="aligned"
        >
            <input 
                type="hidden"
                name="action"
                value="add_product"
            >
            <label>Code:</label>
            <input
                type="text"
                name="product_code"
                required
            >
            <br>
            <label>Name:</label>
            <input
                type="text"
                name="name"
                required
            >
            <br>
            <label>Version:</label>
            <input
                type="text"
                name="version"
                required
            >
            <br>
            <label>Release Date:</label>
            <input
                type="text"
                name="release_date"
                style="margin-right: .75em;"
                required
            >
            <p style="margin-top: .25em;">
                Use 'yyy-mm-dd' format
            </p>
            <br>

            <label>&nbsp;</label>
            <input 
                type="submit" 
                value="Add Product" 
            />
            <br>
        </form>
        <p><a href="?action=show_products">View Product List</a></p>
    </main>
<?php include '../view/footer.php'; ?>