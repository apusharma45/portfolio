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
</body>
</html>