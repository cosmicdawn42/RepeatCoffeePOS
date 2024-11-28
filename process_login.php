<?php
session_start();
require 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM admins WHERE username = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // verify pw - so this is actually hashed so goodluck on that.
    // jk its in register.php for debugging --- the password_hash() // for encryption - just search what it does
    if (password_verify($password, $user['password'])) {

        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = 'admin';  
        header("Location: admin_dashboard.php");
        exit();
    } else {

        $_SESSION['error_message'] = "Wrong username or password!";
        header("Location: index.php");
        exit();
    }
} else {

    $_SESSION['error_message'] = "Wrong username or password!";
    header("Location: index.php");
    exit();
}
?>
