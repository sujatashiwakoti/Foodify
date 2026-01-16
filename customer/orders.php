<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}
include("../includes/header.php");
include("../config/db.php");

$customer_email = $_SESSION['customer_email'];
$customer_id = $conn->query("SELECT id FROM customers WHERE email='$customer_email'")->fetch_assoc()['id'];

$orders = $conn->query("
    SELECT o.id, o.status, o.created_at, SUM(p.price * o.quantity) as total_amount
    FROM orders o
    JOIN products p ON o.product_id = p.id
    WHERE o.customer_id = $customer_id
    GROUP BY o.id
    ORDER BY o.created_at DESC
");
?>

<section class="orders-section">
    <div class="container">
        <h2>My Orders</h2>
        <?php if($orders->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($order = $orders->fetch_assoc()): ?>
                        <tr>
                            <td><?= $order['id'] ?></td>
                            <td><?= date("d M Y", strtotime($order['created_at'])) ?></td>
                            <td>Rs. <?= $order['total_amount'] ?></td>
                            <td><?= $order['status'] ?></td>
                            <td><a href="order_details.php?id=<?= $order['id'] ?>">View Details</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You haven’t placed any orders yet. <a href="../products/list.php">Order Now!</a></p>
        <?php endif; ?>
    </div>
</section>

<style>
.orders-section table {
    width: 100%;
    border-collapse: collapse;
}
.orders-section th, .orders-section td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}
.orders-section th {
    background-color: #f8f8f8;
}
.orders-section a { color: #1f8ef1; text-decoration: none; }
</style>

<?php include("../includes/footer.php"); ?>
