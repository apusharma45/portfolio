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

    $category = trim($_POST['category'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $icon_type = trim($_POST['icon_type'] ?? '');
    $icon_value = trim($_POST['icon_value'] ?? '');
    $percentage = intval($_POST['percentage'] ?? 0);

    if (empty($category) || empty($name) || empty($icon_type) || empty($icon_value) || $percentage < 0 || $percentage > 100) {
        header("Location: dashboard.php?msg=empty");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO skills (category, name, icon_type, icon_value, percentage) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $category, $name, $icon_type, $icon_value, $percentage);

    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=skill_added");
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
