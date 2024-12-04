<?php
include 'db_connect.php';

$message = ''; // initialize a variable for success/error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prod_id = $_POST['prod-id'];
    $prod_name = $_POST['prod-name'];
    $prod_price = $_POST['prod-price'];
    $prod_qty = $_POST['prod-qty'];

    // validate inputs
    if (empty($prod_id) || empty($prod_name) || empty($prod_price) || empty($prod_qty)) {
        $message = "All fields are required.";
    } else {
        $sql = "INSERT INTO products (prod_id, prod_name, prod_price, prod_qty) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isdi", $prod_id, $prod_name, $prod_price, $prod_qty);

        if ($stmt->execute()) {
            $message = "Product added successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
$conn->close();
?>

<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="dashboard-grid" id="content-grid">
    <div class="db-content">
        <div class="prod-container">
            <p class="heading">Add New Product</p>
            <hr>
            <!-- display success or error messages -->
            <?php if (!empty($message)): ?>
                <div class="message-box"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
            <form action="" method="POST" class="prod-form">
                <label for="prod-id">Product ID</label>
                <input type="number" name="prod-id" required>
                <label for="prod-name">Name</label>
                <input type="text" name="prod-name" required>
                <label for="prod-price">Price</label>
                <input type="number" step="0.01" name="prod-price" required>
                <label for="prod-qty">Quantity</label>
                <input type="number" name="prod-qty" required>

                <button type="submit" class="savebtn">Save</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
