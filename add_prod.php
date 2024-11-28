<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prod_id = $_POST['prod-id'];
    $prod_name = $_POST['prod-name'];
    $prod_price = $_POST['prod-price'];
    $prod_qty = $_POST['prod-qty'];

    if (empty($prod_id) || empty($prod_name) || empty($prod_price) || empty($prod_qty)) {
        $error = "All fields are required.";
    } else {
        $sql = "INSERT INTO products (prod_id, prod_name, prod_price, prod_qty) 
                VALUES ('$prod_id', '$prod_name', '$prod_price', '$prod_qty')";

        if ($conn->query($sql) === TRUE) {
            $success = "Product added successfully!";
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<?php include'header.php' ?>
<?php include'navbar.php' ?>

<?php include'sidebar.php' ?>

    <div class="dashboard-grid" id="content-grid">
        <div class="db-content">
            <div class="prod-container">
                <p class="heading">Add New Product</p>
                <hr>
                <form action="" class="prod-form">
                    <label for="prod-id" >Product ID</label>
                    <input type="number" name="prod-id" required>
                    <label for="prod-name">Name</label>
                    <input type="text" name="prod-name" required>
                    <label for="prod-price">Price</label>
                    <input type="number" name="prod-price" required>
                    <label for="prod-qty">Quantity</label>
                    <input type="number"name="prod-qty" required>

                    <button type="Submit" class="savebtn">Save</button>
                    </form>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php' ?>