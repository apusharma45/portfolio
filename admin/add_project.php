<?php
session_start();
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    die("Access Denied!");
}

// Process POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect and sanitize inputs
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image = trim($_POST['image'] ?? '');
    $link = trim($_POST['link'] ?? '');
    $tech_stack = trim($_POST['tech_stack'] ?? '');
    $project_type = trim($_POST['project_type'] ?? '');

    // Basic validation
    if (empty($title) || empty($description) || empty($image)) {
        header("Location: dashboard.php?msg=empty");
        exit();
    }

    // Prepare SQL to insert project
    $stmt = $conn->prepare("INSERT INTO projects (title, description, image, link, tech_stack, project_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $description, $image, $link, $tech_stack, $project_type);

    if ($stmt->execute()) {
        // Success
        header("Location: dashboard.php?msg=added");
        exit();
    } else {
        // Error
        header("Location: dashboard.php?msg=error");
        exit();
    }

} else {
    // Invalid request
    header("Location: dashboard.php");
    exit();
}
?>
