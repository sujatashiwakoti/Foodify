<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");

include("../includes/header.php");
include("../includes/sidebar_admin.php");

// Dashboard statistics
$total_products = $conn->query("SELECT COUNT(*) as count FROM products")->fetch_assoc()['count'];
$total_customers = $conn->query("SELECT COUNT(*) as count FROM customers")->fetch_assoc()['count'];
$total_vendors = $conn->query("SELECT COUNT(*) as count FROM vendors")->fetch_assoc()['count'];
$total_orders = $conn->query("SELECT COUNT(*) as count FROM orders")->fetch_assoc()['count'];
?>

<div class="admin-content">
    <h1>Admin Dashboard</h1>
    <div class="dashboard-cards">
        <div class="card">Products: <?= $total_products ?></div>
        <div class="card">Customers: <?= $total_customers ?></div>
        <div class="card">Vendors: <?= $total_vendors ?></div>
        <div class="card">Orders: <?= $total_orders ?></div>
    </div>
</div>

<style>
.admin-content { padding:20px; }
.dashboard-cards { display:flex; gap:20px; margin-top:20px; flex-wrap:wrap; }
.dashboard-cards .card { flex:1 1 200px; background:#f6f4ee; padding:20px; border-radius:10px; text-align:center; font-weight:bold; font-size:18px; }
</style>

<?php include("../includes/footer.php"); ?>
