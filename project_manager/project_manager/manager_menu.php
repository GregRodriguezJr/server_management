<?php include '../view/header.php'; ?>
    <main>
        <h1>Project Manager Menu</h1>
        <h2><a href="../project_manager_reports/">Reports</a></h2>
        <form action="" method="post" style="padding: .5em 0;">
            <input type="hidden" name="action" value="show_client_add">
            <input type="submit" value="Add Client">
        </form>
        <form action="" method="post" style="padding: .5em 0;">
            <input type="hidden" name="action" value="show_project_add">
            <input type="submit" value="Add Project">
        </form>
        <form action="" method="post" style="padding: .5em 0;">
            <input type="hidden" name="action" value="show_task_add">
            <input type="submit" value="Add Task">
        </form>
        <h2>All Clients</h2>
        <table>
            <tr>
                <th>Client ID</th>
                <th>Company Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>&nbsp;</th>
            </tr> <?php foreach ($clients as $client) : ?> <tr>
                <td><?php echo htmlspecialchars($client['clientID']); ?></td>
                <td><?php echo htmlspecialchars($client['name']); ?></td>
                <td><?php echo htmlspecialchars($client['firstName']); ?></td>
                <td><?php echo htmlspecialchars($client['lastName']); ?></td>
                <td><?php echo htmlspecialchars($client['email']); ?></td>
                <td><?php echo htmlspecialchars($client['phone']); ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="edit_client_form">
                        <input type="hidden" name="client_ID" value="<?php echo $client['clientID']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <h2>All Projects</h2>
        <table>
            <tr>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Employee</th>
                <th>Hours</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($projects as $project) : ?>
                <?php $fullName = $project['firstName'] . " " . $project['lastName'] ; ?>
            <tr>
                <td><?php echo htmlspecialchars($project['projectID']); ?></td>
                <td><?php echo htmlspecialchars($project['name']); ?></td>
                <td><?php echo htmlspecialchars($project['description']); ?></td>
                <td><?php echo htmlspecialchars($project['startDate']); ?></td>
                <td><?php echo htmlspecialchars($project['dueDate']); ?></td>
                <td><?php echo htmlspecialchars($project['status']); ?>%</td>
                <td><?php echo htmlspecialchars($fullName); ?></td>
                <td><?php echo htmlspecialchars($project['hours']); ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="edit_project_form">
                        <input type="hidden" name="project_ID" value="<?php echo $project['projectID']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <h2>All Task</h2>
        <table>
            <tr>
                <th>Project ID</th>
                <th>Task Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Employee</th>
                <th>Hours</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($tasks as $task) : ?>
                <?php $fullName = $task['firstName'] . " " . $task['lastName'] ; ?>
            <tr>
                <td><?php echo htmlspecialchars($task['projectID']); ?></td>
                <td><?php echo htmlspecialchars($task['name']); ?></td>
                <td><?php echo htmlspecialchars($task['description']); ?></td>
                <td><?php echo htmlspecialchars($task['startDate']); ?></td>
                <td><?php echo htmlspecialchars($task['dueDate']); ?></td>
                <td><?php echo htmlspecialchars($task['status']); ?>%</td>
                <td><?php echo htmlspecialchars($fullName); ?></td>
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