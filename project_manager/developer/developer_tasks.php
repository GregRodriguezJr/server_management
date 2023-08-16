<?php include '../view/header.php'; ?>
    <main>
        <h1>Developer Tasks</h1>
        <table>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Hours</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?php echo htmlspecialchars($task['name']); ?></td>
                <td><?php echo htmlspecialchars($task['description']); ?></td>
                <td><?php echo htmlspecialchars($task['startDate']); ?></td>
                <td><?php echo htmlspecialchars($task['dueDate']); ?></td>
                <td><?php echo htmlspecialchars($task['status']); ?>%</td>
                <td><?php echo htmlspecialchars($task['hours']); ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="edit_task_form">
                        <input type="hidden" name="task_ID" value="<?php echo $task['taskID']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p>You are logged in as <?php echo htmlspecialchars($employee['email']); ?></p>
        <form action="" method="post">
            <input type="hidden" name="action" value="logout">
            <input type="submit" value="Logout">
        </form>
    </main>
<?php include '../view/footer.php'; ?>