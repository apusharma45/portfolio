<?php
session_start();
require 'db.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $image = trim($_POST['image']);
    $link = trim($_POST['link']);
    $tech_stack = trim($_POST['tech_stack']);
    $project_type = trim($_POST['project_type']);

    $stmt = $conn->prepare("UPDATE projects SET title=?, description=?, image=?, link=?, tech_stack=?, project_type=? WHERE id=?");
    $stmt->bind_param("ssssssi", $title, $description, $image, $link, $tech_stack, $project_type, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating project: " . $conn->error;
    }
}
?>
