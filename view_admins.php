<?php
session_start();

include 'db_connect.php'; 

if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
}

$sql = "SELECT * FROM admins"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $admins = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $admins = [];
}
?>

<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="admin-list-container">
    <h2>View Admins</h2>
    <?php if (!empty($admins)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td><?php echo $admin['id']; ?></td>
                        <td><?php echo $admin['username']; ?></td>
                        <td><?php echo $admin['email']; ?></td>
                        <td><?php echo $admin['phone']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No admins found.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
