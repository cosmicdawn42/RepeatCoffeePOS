<div class="navbar">
    <ul>
        <li><img src="logo_text.png" alt="Repeat Coffee House Logo"></li>
        <li>POS System</li>
    </ul>
    <div class="navbar-date-time">
        <span id="currentDate"><?php echo date('F j, Y'); ?></span>
        <span id="currentTime"><?php echo date('h:i:s A'); ?></span>
    </div>
    <div class="pfp-dropdown">
        <a href="" class="dropdown-toggle">
            <i class="fi fi-ss-user"></i>Admin <!-- This will display the admin name -->
            <i class="fi fi-ss-angle-small-down"></i>
        </a>
        <ul class="pfp-menu">
            <li><a href="profilepage.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>