<?php session_start(); ?>


<div class="sidebar-container">
    <div class="dashboard-grid">
        <p>Main</p>
        <ul>
            <li>
                <i class="fi fi-ss-dashboard"></i>
                <a href="admin_dashboard.php">Dashboard</a>
            </li>
            <li>
                <i class="fi fi-ss-box-open"></i>
                <a href="">Products</a>
                <ul class="dropdown-menu">
                    <li><a href="add_prod.php">Add Product</a></li>
                    <li><a href="view_products.php">View Products</a></li>
                </ul>
            </li>
            <li>
            <i class="fi fi-ss-apps"></i>
                <a href="main_pos.php">POS</a>
            </li>
        </ul>
        <p>Accounts</p>
        <ul>
            <li>
                <i class="fi fi-ss-admin-alt"></i>
                <a href="">Admin</a>
                <ul class="dropdown-menu">
                    <li><a href="add_admin.php">Add Admin</a></li>
                    <li><a href="/pos/view_admins.php">View Admins</a></li>
                </ul>
            </li>
            <li>
                <i class="fi fi-ss-users"></i>
                <a href="">Users</a>
                <ul class="dropdown-menu">
                    <li><a href="add_user.php">Add User</a></li>
                    <li><a href="/pos/view_users.php">View Users</a></li>
                </ul>
            </li>
        </ul>
        <p class="sb-footer">Logged in as:</p>
        <p class="un-footer"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></p> <!-- Display logged-in user -->
    </div>