<?php

include 'header.php';
include 'navbar.php';
include 'sidebar.php';

include 'db_connect.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<div class="dashboard-grid" id="content-grid">
    <div class="db-content">
        <div class="prod-container">
            <p class="heading">View Products</p>
            <hr>
            <?php if ($result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($product = $result->fetch_assoc()):
                        ?>
                            <tr>
                                <td><?php echo $product['prod_id']; ?></td>
                                <td><?php echo $product['prod_name']; ?></td>
                                <td><?php echo number_format($product['prod_price'], 2); ?></td>
                                <td><?php echo $product['prod_qty']; ?></td>
                                <td>
                                    <a href="edit_prod.php?id=<?php echo $product['prod_id']; ?>">Edit</a>
                                    | 
                                    <a href="delete_prod.php?id=<?php echo $product['prod_id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No products found in the database.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
