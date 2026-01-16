<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['vendor_email'])){
    header("Location: login.php");
    exit();
}

$vendor_email = $_SESSION['vendor_email'];
$vendor = $conn->query("SELECT * FROM vendors WHERE email='$vendor_email'")->fetch_assoc();

$total_products = $conn->query("SELECT COUNT(*) AS count FROM products WHERE vendor_id={$vendor['id']}")->fetch_assoc()['count'];
$total_orders = $conn->query("SELECT COUNT(*) AS count FROM orders WHERE vendor_id={$vendor['id']}")->fetch_assoc()['count'];

include("../includes/header.php");
?>

<section class="dashboard-section">
    <div class="container">
        <h2>Welcome, <?= $vendor['name'] ?></h2>
        <div class="dashboard-cards">
            <div class="card">
                <h3>Total Products</h3>
                <p><?= $total_products ?></p>
            </div>
            <div class="card">
                <h3>Total Orders</h3>
                <p><?= $total_orders ?></p>
            </div>
        </div>
        <a href="add_product.php" class="btn-primary">Add New Product</a>
        <a href="products.php" class="btn-outline">Manage Products</a>
        <a href="orders.php" class="btn-outline">View Orders</a>
        <a href="reports.php" class="btn-outline">Reports</a>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
