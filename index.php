<?php 
session_start();
if (isset($_SESSION['username']) && $_SESSION['user_type'] === 'admin') {
    header("Location: admin_dashboard.php");
    exit();
} elseif (isset($_SESSION['username']) && $_SESSION['user_type'] === 'user') {
    header("Location: user_dashboard.php");
    exit();
}

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']);
?>

<?php include 'header.php';?>

<div class="grid-container">
    <div class="grid-item">
        <img src="logo.png" alt="Repeat Coffee House Logo" class="logo-img">
        <p class="pos-text">Point of Sales System</p>
    </div>
    <div class="grid-item" id="login-grid">
        <p class="login-text">Login</p>
        <div class="login-container">
            <form action="process_login.php" method="POST" class="form">
                <label for="username" id="un">Username</label>
                <input type="text" name="username" placeholder="Enter username" required>
                <label for="password" id="pw">Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
                <div class="button-container">
                <button type="submit" class="loginbtn">Log In</button>
                </div>
            </form>
        </div>        
    </div>
</div>

<?php include 'footer.php'; ?>
