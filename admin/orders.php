<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");
include("../includes/header.php");
include("../includes/sidebar_admin.php");

$orders = $conn->query("SELECT * FROM orders ORDER BY id DESC");
?>

<div class="admin-content">
    <h1>Orders</h1>
    <table>
        <thead><tr><th>ID</th><th>Customer</th><th>Total</th><th>Status</th></tr></thead>
        <tbody>
        <?php while($o = $orders->fetch_assoc()): ?>
            <tr>
                <td><?= $o['id'] ?></td>
                <td><?= $o['customer_id'] ?></td>
                <td>Rs. <?= $o['total'] ?></td>
                <td><?= $o['status'] ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include("../includes/footer.php"); ?>
