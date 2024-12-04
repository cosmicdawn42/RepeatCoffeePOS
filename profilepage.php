<?php
session_start();
require 'db_connect.php';


if (!isset($_SESSION['username']) || !isset($_SESSION['user_type'])) {
    header('Location: index.php'); 
    exit;
}
$username = $_SESSION['username'];
$userType = $_SESSION['user_type']; //

if ($userType === 'admin') {
    $query = $conn->prepare("SELECT * FROM admins WHERE username = ?");
} elseif ($userType === 'user') {
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
} else {
    echo "Error: Invalid user type.";
    exit;
}

$query->bind_param('s', $username);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Fetch user data
} else {
    echo "Error: User not found.";
    exit;
}
?>

<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="dashboard-grid" id="content-grid">
    <div class="db-content">
        <div class="prod-container">
            <p class="heading">Profile</p>
            <hr>
            <table class="profiletbl">
                <tr>
                    <td><strong>Employee ID:</strong></td>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                </tr>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                </tr>
                <tr>
                    <td><strong>Contact Information:</strong></td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
