<?php
session_start();
require 'db.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    die("Access Denied!");
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("Invalid project ID.");
}

$project_id = intval($_POST['id']);

$stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
$stmt->bind_param("i", $project_id);

if ($stmt->execute()) {
    header("Location: dashboard.php?msg=deleted");
    exit();
} else {
    header("Location: dashboard.php?msg=error");
    exit();
}
?>
