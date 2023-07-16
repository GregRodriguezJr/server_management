<?php include '../view/header.php'; ?>
    <main>
        <h1>Add Technician</h1>
        <form
            action="index.php"
            method="post"
            id="aligned"
        >
            <input 
                type="hidden"
                name="action"
                value="add_technician"
            >
            <label>First Name:</label>
            <input
                type="text"
                name="first_name"
                required
            >
            <br>
            <label>Last Name:</label>
            <input
                type="text"
                name="last_name"
                required
            >
            <br>
            <label>Email:</label>
            <input
                type="email"
                name="email"
                required
            >
            <br>
            <label>Phone:</label>
            <input
                type="tel"
                name="phone"
                required
            >
            <br>
            <label>Password:</label>
            <input
                type="text"
                name="password"
                required
            >
            <br>

            <label>&nbsp;</label>
            <input 
                type="submit" 
                value="Add Technician" 
            />
            <br>
        </form>
        <p><a href="?action=show_technician_list">View Product List</a></p>
    </main>
<?php include '../view/footer.php'; ?>
