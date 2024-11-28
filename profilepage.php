<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['user_type'])) {
    header("Location: index.php");
    exit();
}

include 'db_connect.php';

$username = $_SESSION['username'];
$user_type = $_SESSION['user_type']; // 'admin' or 'user'

$table = $user_type === 'admin' ? 'admins' : 'users';


$stmt = $conn->prepare("SELECT id, name, email, phone, username FROM $table WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("User not found.");
}

$stmt->close();
$conn->close();
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
                    <td>Employee ID:</td>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
