<?php
session_start();
require 'db.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

    if (isset($_COOKIE['username'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $_COOKIE['username'];
    } else {
        header("Location: login.php");
        exit();
    }
}

$sql = "SELECT * FROM projects ORDER BY id";
$result = $conn->query($sql);

$skills_sql = "SELECT * FROM skills ORDER BY id";
$skills_result = $conn->query($skills_sql);

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
    <div style="height: 10px"></div>
        <div class="dashboard-header">
            <h3>All Projects</h3>
            <button class="btn btn-add" onclick="openAddModal()">Add Project</button>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Project Title</th>
                <th>Actions</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td>
                            <button class="btn btn-update" onclick="openUpdateModal(
                                <?php echo $row['id']; ?>,
                                '<?php echo addslashes($row['title']); ?>',
                                '<?php echo addslashes($row['description']); ?>',
                                '<?php echo addslashes($row['image']); ?>',
                                '<?php echo addslashes($row['link']); ?>',
                                '<?php echo addslashes($row['tech_stack']); ?>',
                                '<?php echo addslashes($row['project_type']); ?>'
                                )">
                                Update
                            </button>
                            <button class="btn btn-delete" onclick="openModal(<?php echo $row['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center;">No projects found.</td>
                </tr>
            <?php endif; ?>
        </table>

        <div style="height: 80px"></div>

        <div class="dashboard-header">
            <h3>All Skills</h3>
            <button class="btn btn-add" onclick="openAddSkillModal()">Add Skill</button>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Skill Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            <?php if ($skills_result->num_rows > 0): ?>
                <?php while ($skill = $skills_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $skill['id']; ?></td>
                        <td><?php echo htmlspecialchars($skill['name']); ?></td>
                        <td><?php echo htmlspecialchars($skill['category']); ?></td>
                        <td>
                            <button class="btn btn-update" onclick="openUpdateSkillModal(
                                    <?php echo $skill['id']; ?>,
                                    '<?php echo addslashes($skill['category']); ?>',
                                    '<?php echo addslashes($skill['name']); ?>',
                                    '<?php echo addslashes($skill['icon_type']); ?>',
                                    '<?php echo addslashes($skill['icon_value']); ?>',
                                    '<?php echo $skill['percentage']; ?>'
                                    )">Update
                            </button>

                            <button class="btn btn-delete"
                                onclick="openDeleteSkillModal(<?php echo $skill['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">No skills found.</td>
                </tr>
            <?php endif; ?>
        </table>

    </main>



    <div class="modal" id="updateModal">
        <div class="modal-content">
            <h3>Update Project</h3>
            <form method="POST" action="update_project.php">
                <input type="hidden" name="id" id="updateId">

                <label>Title:</label>
                <input type="text" name="title" id="updateTitle" required><br><br>

                <label>Description:</label>
                <textarea name="description" id="updateDescription" rows="4" required></textarea><br><br>

                <label>Image (filename):</label>
                <input type="text" name="image" id="updateImage" required><br><br>

                <label>Link:</label>
                <input type="url" name="link" id="updateLink"><br><br>

                <label>Tech Stack:</label>
                <input type="text" name="tech_stack" id="updateTechStack"><br><br>

                <label>Project Type:</label>
                <input type="text" name="project_type" id="updateProjectType"><br><br>

                <div class="modal-actions">
                    <button type="button" class="btn btn-cancel" onclick="closeUpdateModal()">Cancel</button>
                    <button type="submit" class="btn btn-update">Update</button>
                </div>
            </form>
        </div>
    </div>



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

    <div class="modal" id="addSkillModal">
        <div class="modal-content">
            <h3>Add New Skill</h3>
            <form id="addSkillForm" method="POST" action="add_skill.php">
                <label class="dropdown">Category:</label>
                <select name="category" required>
                    <option value="Languages">Languages</option>
                    <option value="Frameworks">Frameworks</option>
                </select><br><br>

                <label>Skill Name:</label>
                <input type="text" name="name" required><br><br>

                <label class="dropdown">Icon Type:</label>
                <select name="icon_type" required>
                    <option value="fa">Font Awesome</option>
                    <option value="img">Image</option>
                </select><br><br>

                <label>Icon Value:</label>
                <input type="text" name="icon_value" required><br><br>

                <label>Percentage:</label>
                <input type="number" name="percentage" min="0" max="100" required><br><br>


                <div class="modal-actions">
                    <button type="button" class="btn btn-cancel" onclick="closeAddSkillModal()">Cancel</button>
                    <button type="submit" class="btn btn-update">Add Skill</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="updateSkillModal">
        <div class="modal-content">
            <h3>Update Skill</h3>
            <form method="POST" action="update_skill.php">
                <input type="hidden" name="id" id="updateSkillId">
                <label class="dropdown">Category:</label>
                <select name="category" id="updateSkillCategory" required>
                    <option value="Languages">Languages</option>
                    <option value="Frameworks">Frameworks</option>
                </select><br><br>

                <label>Skill Name:</label>
                <input type="text" name="name" id="updateSkillName" required><br><br>

                <label class="dropdown">Icon Type:</label>
                <select name="icon_type" id="updateSkillType" required>
                    <option value="fa">Font Awesome</option>
                    <option value="img">Image</option>
                </select><br><br>

                <label>Icon Value:</label>
                <input type="text" name="icon_value" id="updateSkillIconValue" required><br><br>

                <label>Percentage:</label>
                <input type="number" name="percentage" id="updateSkillPercentage" min="0" max="100" required><br><br>

                <div class="modal-actions">
                    <button type="button" class="btn btn-cancel" onclick="closeUpdateSkillModal()">Cancel</button>
                    <button type="submit" class="btn btn-update">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Skill Modal -->
    <div class="modal" id="deleteSkillModal">
        <div class="modal-content">
            <h3>Confirm Deletion</h3>
            <p>Are you sure you want to delete this skill?</p>
            <div class="modal-actions">
                <button class="btn btn-cancel" onclick="closeDeleteSkillModal()">Cancel</button>
                <form id="deleteSkillForm" method="POST" action="delete_skill.php" style="display:inline;">
                    <input type="hidden" name="id" id="deleteSkillId" value="">
                    <button type="submit" class="btn btn-delete">Delete</button>
                </form>
            </div>
        </div>
    </div>


    <script src="scripts/dashboard_script.js"></script>
</body>

</html>