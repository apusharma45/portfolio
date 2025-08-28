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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image = trim($_POST['image'] ?? '');
    $link = trim($_POST['link'] ?? '');
    $tech_stack = trim($_POST['tech_stack'] ?? '');
    $project_type = trim($_POST['project_type'] ?? '');

    if (empty($title) || empty($description) || empty($image)) {
        header("Location: dashboard.php?msg=empty");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO projects (title, description, image, link, tech_stack, project_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $description, $image, $link, $tech_stack, $project_type);

    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=added");
        exit();
    } else {
        header("Location: dashboard.php?msg=error");
        exit();
    }

} else {
    header("Location: dashboard.php");
    exit();
}
?>
