<?php 
include 'header.php'; 
include 'navbar.php'; 
include 'sidebar.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'db_connect.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];  // 'admin' or 'user'

    // depending on the role, insert into either the admins or users table
    if ($role == 'admin') {
        $stmt = $conn->prepare("INSERT INTO admins (name, email, phone, username, password) VALUES (?, ?, ?, ?, ?)");
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, username, password) VALUES (?, ?, ?, ?, ?)");
    }

    $stmt->bind_param("sssss", $name, $email, $phone, $username, $password);

    if ($stmt->execute()) {
        echo "Account created successfully! You can now log in.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
