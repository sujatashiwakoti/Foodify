<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");

include("../includes/header.php");
include("../includes/sidebar_admin.php");

// Fetch orders with customer info
$orders = $conn->query("
    SELECT o.id, o.total_price, o.status, c.name as customer_name, o.created_at
    FROM orders o
    JOIN customers c ON o.customer_id = c.id
    ORDER BY o.created_at DESC
");
?>

<div class="admin-content">
    <h1>Order Reports</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while($order = $orders->fetch_assoc()): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= htmlspecialchars($order['customer_name']) ?></td>
                <td>Rs. <?= $order['total_price'] ?></td>
                <td><?= $order['status'] ?></td>
                <td><?= $order['created_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<style>
.admin-content table { width:100%; border-collapse: collapse; margin-top:20px; }
.admin-content th, td { padding:10px; border:1px solid #ddd; }
</style>

<?php include("../includes/footer.php"); ?>
