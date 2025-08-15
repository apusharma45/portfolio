<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    die("Access Denied!");
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <a href="logout.php">Logout</a>
    <hr>
    <form method="POST" enctype="multipart/form-data">
        
    </form>
</body>
</html>
