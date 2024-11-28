<!--
//for debug/add of 1 admin for testing
<div class="button-container">
                     // add this new register button in index.php -temp cos trying to figuring how to access using db yet //
                    <button type="button" class="registerbtn" onclick="window.location.href='register.php'">Register</button>
</div> -->

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
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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

<div class="dashboard-grid" id="content-grid">
    <div class="db-content">
        <div class="prod-container">
            <p class="heading">Register New Account</p>
            <hr>
            <form action="register.php" method="POST" class="prod-form">
                <label for="name">Name</label>
                <input type="text" name="name" required>
                
                <label for="email">Email</label>
                <input type="email" name="email" required>
                
                <label for="phone">Phone</label>
                <input type="text" name="phone" required>
                
                <label for="username">Username</label>
                <input type="text" name="username" required>
                
                <label for="password">Password</label>
                <input type="password" name="password" required>
                
                <label for="role">Role</label>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                
                <button type="submit" class="savebtn">Register</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
