<?php
session_start();
require 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

// check if user is in 'admins' table
$query = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
$query->bind_param("ss", $username, $password);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_type'] = 'admin'; // set user_type
    header("Location: admin_dashboard.php");
    exit;
}

// check if user is in 'users' table
$query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$query->bind_param("ss", $username, $password);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_type'] = 'user'; // set user_type
    header("Location: user_dashboard.php");
    exit;
}

// invalid login
echo "Invalid username or password.";
?>
