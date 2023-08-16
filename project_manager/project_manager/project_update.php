<?php include '../view/header.php'; ?>
<main>
    <h1>Update Project</h1>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="update_project">
        <input type="hidden" name="project_ID" value="<?php echo $project['projectID'] ?>">

        <label>Company Name:</label>
        <select name="client_ID" required>
            <?php foreach ($clients as $client) { ?>
                <option value="<?php echo $client['clientID']; ?>" 
                    <?php if ($client['clientID'] == $project['clientID']) echo 'selected'; ?>>
                    <?php echo $client['name']; ?>
                </option>
            <?php } ?>
        </select>
        <br>

        <label>Project Name:</label>
        <input type="text" name="name" value="<?php echo $project['name'] ?>"><br>

        <label>Description:</label>
        <textarea name="description"><?php echo $project['description'] ?></textarea>
        <br>

        <label>Status</label>
        <input type="number" name="status" value="<?php echo $project['status'] ?>"><br>

        <label>Start Date:</label>
        <input type="text" name="start_date" value="<?php echo $project['startDate'] ?>"><br>

        <label>Due Date:</label>
        <input type="text" name="due_date" value="<?php echo $project['dueDate'] ?>"><br>

        <label>Employee ID:</label>
        <select name="employee_ID" required>
            <?php foreach ($employees as $employee) { ?>
                <option value="<?php echo $employee['employeeID']; ?>" 
                    <?php if ($employee['employeeID'] == $project['employeeID']) echo 'selected'; ?>>
                    <?php echo $employee['firstName'] . " " . $employee['lastName'];?>
                </option>
            <?php } ?>
        </select><br>
        <label></label>
        <input type="submit" value="Update Project"><br>
    </form>
</main>
<?php include '../view/footer.php'; ?>