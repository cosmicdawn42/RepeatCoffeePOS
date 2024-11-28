<?php 
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // retrieve form data
    $userId = $_POST['user_id'];
    $userName = $_POST['user_name'];
    $userEmail = $_POST['user_email'];
    $userPhone = $_POST['user_phone'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // insert in db
    $stmt = $conn->prepare("INSERT INTO users (id, name, email, phone, username, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $userId, $userName, $userEmail, $userPhone, $username, $password);

    if($stmt->execute()){
        $message = "User successfully added!";
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
                <p class="heading">Add New User</p>
                <hr>
                <!-- display success or error message -->
                <?php if (!empty($message)): ?>
                <div class="message-box"><?php echo htmlspecialchars($message); ?></div>
                <?php endif; ?>
                <form action="" method="POST" class="prod-form">
                    <label for="user_id" >ID</label>
                    <input type="number" name="user_id" required>
                    <label for="user_name">Name</label>
                    <input type="text" name="user_name" required>
                    <label for="user_email">Email</label>
                    <input type="email" name="user_email" required>
                    <label for="user_phone">Phone</label>
                    <input type="number" name="user_phone" required>
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