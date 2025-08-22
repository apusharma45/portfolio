<?php
session_start();
require 'db.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    die("Access Denied!");
}

$sql = "SELECT id, title FROM projects ORDER BY id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles/dashboard_style.css">
</head>
<body>
    <header>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <a href="logout.php">Logout</a>
    </header>

    <main>
        <!-- Header with Add Project Button -->
        <div class="dashboard-header">
            <h3>All Projects</h3>
            <button class="btn btn-add" onclick="openAddModal()">Add Project</button>
        </div>

        <!-- Projects Table -->
        <table>
            <tr>
                <th>ID</th>
                <th>Project Title</th>
                <th>Actions</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td>
                            <a href="update_project.php?id=<?php echo $row['id']; ?>" class="btn btn-update">Update</a>
                            <button class="btn btn-delete" onclick="openModal(<?php echo $row['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="3" style="text-align:center;">No projects found.</td></tr>
            <?php endif; ?>
        </table>
    </main>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <h3>Confirm Deletion</h3>
            <p>Are you sure you want to delete this project?</p>
            <div class="modal-actions">
                <button class="btn btn-cancel" onclick="closeModal()">Cancel</button>
                <form id="deleteForm" method="POST" action="delete_project.php" style="display:inline;">
                    <input type="hidden" name="id" id="deleteProjectId" value="">
                    <button type="submit" class="btn btn-delete">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <h3>Add New Project</h3>
            <form id="addForm" method="POST" action="add_project.php" enctype="multipart/form-data">
                <label>Title:</label>
                <input type="text" name="title" required><br><br>

                <label>Description:</label>
                <textarea name="description" rows="4" required></textarea><br><br>

                <label>Image (filename):</label>
                <input type="text" name="image" required><br><br>

                <label>Link:</label>
                <input type="url" name="link"><br><br>

                <label>Tech Stack:</label>
                <input type="text" name="tech_stack"><br><br>

                <label>Project Type:</label>
                <input type="text" name="project_type"><br><br>

                <div class="modal-actions">
                    <button type="button" class="btn btn-cancel" onclick="closeAddModal()">Cancel</button>
                    <button type="submit" class="btn btn-update">Add Project</button>
                </div>
            </form>
        </div>
    </div>

    <script src="scripts/dashboard_script.js"></script>
</body>
</html>
