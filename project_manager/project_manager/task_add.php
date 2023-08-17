<?php include '../view/header.php'; ?>
<main>
    <h1>Add Task</h1>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="add_task">

        <label>Project Name:</label>
        <select name="project_ID" required>
            <?php foreach ($projects as $project) { ?>
                <option value="<?php echo $project['projectID']; ?>">
                    <?php echo $project['name'] . " (" . $project['clientName'] . ")"; ?>
                </option>
            <?php } ?>
        </select>
        <br>

        <label>Task Name:</label>
        <input name="name" required><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        
        <label>Status:</label>
        <input type="number" name="status" required><br>

        <label>Start Date:</label>
        <input type="text" name="start_date" required><br>

        <label>Due Date:</label>
        <input type="text" name="due_date" required><br>

        <label>Employee ID:</label>
        <select name="employee_ID" required>
            <?php foreach ($employees as $employee) { ?>
                <option value="<?php echo $employee['employeeID']; ?>">
                    <?php echo $employee['firstName'] . " " . $employee['lastName'];?>
                </option>
            <?php } ?>
        </select><br>

        <label>Hours:</label>
        <input type="number" name="hours" required><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Task"><br>
    </form>
</main>
<?php include '../view/footer.php'; ?>