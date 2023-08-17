<?php include '../view/header.php'; ?>
    <main>
        <h1>Edit Task Status/Hours</h1>
        <form action="" method="post" id="aligned">
            <label>Task Name:</label>
            <label style="width: 500px;"><?php echo $task['name']; ?></label>
            <br>

            <label>Task Description:</label>
            <label style="width: 500px;"><?php echo $task['description']; ?></label>
            <br>

            <label>Status:</label>
            <input type="number" name="status" value="<?php echo $task['status']; ?>">
            <br>

            <label>Hours:</label>
            <input type="number" name="hours" value="<?php echo $task['hours']; ?>">
            <br>

            <label></label>
            <input type="hidden" name="action" value="update_task">
            <input type="hidden" name="task_ID" value="<?php echo ($task['taskID']); ?>">
            <input type="submit" value="Update task">
        </form>
        <p>You are logged in as <?php echo htmlspecialchars($employee['email']); ?></p>
        <form action="" method="post">
            <input type="hidden" name="action" value="logout">
            <input type="submit" value="Logout">
        </form>
    </main>
<?php include '../view/footer.php'; ?>