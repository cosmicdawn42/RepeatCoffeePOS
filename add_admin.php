<?php
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // retrieve form data
    $adminId = $_POST['admin_id'];
    $adminName = $_POST['admin_name'];
    $adminEmail = $_POST['admin_email'];
    $adminPhone = $_POST['admin_phone'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // insert in db
    $stmt = $conn->prepare("INSERT INTO admins (id, name, email, phone, username, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $adminId, $adminName, $adminEmail, $adminPhone, $username, $password);

    if($stmt->execute()){
        $message = "Admin successfully added!";
    }else{
        $message = "Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}

?>
    <div class="dashboard-grid" id="content-grid">
        <div class="db-content">
            <div class="prod-container">
                <p class="heading">Add New Admin</p>
                <hr>
                <!-- display success or error message -->
                <?php if (!empty($message)): ?>
                <div class="message-box"><?php echo htmlspecialchars($message); ?></div>
                <?php endif; ?>
                <form action="" method="POST" class="prod-form">
                    <label for="admin_id" >ID</label>
                    <input type="number" name="admin_id" required>
                    <label for="admin_name">Name</label>
                    <input type="text" name="admin_name" required>
                    <label for="admin_email">Email</label>
                    <input type="email" name="admin_email" required>
                    <label for="admin_phone">Phone</label>
                    <input type="number" name="admin_phone" required>
                    <label for="username">Username</label>
                    <input type="text" name="username" required>
                    <label for="password">Password</label>
                    <input type="text" name="password" required>

                    <button type="Submit" class="savebtn">Save</button>
                    </form>
            </div>
        </div>
        
    </div>
</div>

<?php include 'footer.php' ?>