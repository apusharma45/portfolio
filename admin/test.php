<?php
session_start();
require 'db.php';

// Hardcoded test values (replace with your test user_id and password)
$username = "testuser";
$password = "testpassword";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare statement
$stmt = $conn->prepare("SELECT password FROM users WHERE user_id = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        echo "Login successful!";
    } else {
        echo "Invalid credentials!";
    }
} else {
    echo "Username not found!";
}

$stmt->close();
$conn->close();
?>
