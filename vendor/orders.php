<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['vendor_email'])){
    header("Location: login.php");
    exit();
}

$vendor_email = $_SESSION['vendor_email'];
$vendor_id = $conn->query("SELECT id FROM vendors WHERE email='$vendor_email'")->fetch_assoc()['id'];

$orders = $conn->query("
    SELECT o.id, o.customer_id, c.name as customer_name, p.name as product_name, o.quantity, o.total_price, o.status
    FROM orders o
    JOIN customers c ON o.customer_id=c.id
    JOIN products p ON o.product_id=p.id
    WHERE o.vendor_id=$vendor_id
");

include("../includes/header.php");
?>

<section class="vendor-orders">
    <div class="container">
        <h2>Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($order = $orders->fetch_assoc()): ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['customer_name'] ?></td>
                        <td><?= $order['product_name'] ?></td>
                        <td><?= $order['quantity'] ?></td>
                        <td>Rs. <?= $order['total_price'] ?></td>
                        <td><?= $order['status'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
