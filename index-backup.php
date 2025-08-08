<?php
include 'db.php';

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Apu Sharma's Porfolio</title>
</head>
<body>
<div class="container">
    <header>
        <h3>Apu Sharma</h3>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Skills</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Socials</a></li>
            </ul>
        </nav>
        <button class="admin-btn">Admin Panel</button>
    </header>

    <div class="intro-container">
        <div class="intro">
            <p>Hello, I'm Apu Sharma</p>
            <h1>Web <br>Developer</h1>
            <p>based in Bangladesh</p>
            <button id="btn-resume">Resume</button>
        </div>
        <div class="pic">
            <img src="uploads/profile.jpg" alt="profile">
        </div>
    </div>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p><strong>Tech Stack:</strong> " . htmlspecialchars($row['tech_stack']) . "</p>";
            echo "<p><strong>Type:</strong> " . htmlspecialchars($row['project_type']) . "</p>";
            echo "<img src='uploads/" . htmlspecialchars($row['image']) . "' alt='Project Image' width='200'>";
            echo "<p><a href='" . htmlspecialchars($row['link']) . "' target='_blank'>View Project</a></p>";
            echo "<hr>";
            echo "</div>";
        }
    } else {
        echo "<p>No projects found.</p>";
    }

    $conn->close();
    ?>

</div>



    <script src="script.js"></script>
</body>
</html>