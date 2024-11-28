<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'db_connect.php';

// total products
$sql_products = "SELECT COUNT(*) as total_products FROM products";
$result_products = $conn->query($sql_products);
$products_count = ($result_products && $result_products->num_rows > 0) ? $result_products->fetch_assoc()['total_products'] : 0;

// total admins
$sql_admins = "SELECT COUNT(*) as total_admins FROM admins";
$result_admins = $conn->query($sql_admins);
$admins_count = ($result_admins && $result_admins->num_rows > 0) ? $result_admins->fetch_assoc()['total_admins'] : 0;

// total users
$sql_users = "SELECT COUNT(*) as total_users FROM users";
$result_users = $conn->query($sql_users);
$users_count = ($result_users && $result_users->num_rows > 0) ? $result_users->fetch_assoc()['total_users'] : 0;

// total orders
$sql_total_orders = "SELECT COUNT(*) as total_orders FROM orders";
$result_total_orders = $conn->query($sql_total_orders);
$total_orders_count = ($result_total_orders && $result_total_orders->num_rows > 0) ? $result_total_orders->fetch_assoc()['total_orders'] : 0;

// today's orders
$sql_orders_today = "SELECT COUNT(*) as orders_today FROM orders WHERE DATE(order_date) = CURDATE()";
$result_orders_today = $conn->query($sql_orders_today);
$orders_today_count = ($result_orders_today && $result_orders_today->num_rows > 0) ? $result_orders_today->fetch_assoc()['orders_today'] : 0;


?>

    <div class="dashboard-grid">
        <p class="heading">Dashboard</p>
        <div class="db-content">
            <div class="db-item">Total Products
            <p><?php echo $products_count; ?></p>
            </div>
            <div class="db-item">Total Admins
            <p><?php echo $admins_count; ?></p>
            </div>
            <div class="db-item">Total Users
            <p><?php echo $users_count; ?></p>
            </div>
        </div>
        
        <p class="sub-heading">Orders</p>
        <div class="db-content">
        <div class="db-item">Today Orders
            <p><?php echo $orders_today_count; ?></p>
        </div>
        <div class="db-item">Total Orders
            <p><?php echo $total_orders_count; ?></p>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>