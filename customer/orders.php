<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['customer_email'];
$customer_id = $conn->query("SELECT id FROM customers WHERE email='$email'")->fetch_assoc()['id'];

$orders = $conn->query("SELECT * FROM orders WHERE customer_id=$customer_id ORDER BY created_at DESC");

include("../includes/header.php");
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
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($order=$orders->fetch_assoc()):
                        $order_id = $order['id'];
                        $total = $conn->query("SELECT SUM(quantity*price) as total FROM order_items WHERE order_id=$order_id")->fetch_assoc()['total'];
                    ?>
                        <tr>
                            <td><?= $order_id ?></td>
                            <td><?= $order['created_at'] ?></td>
                            <td><?= $order['status'] ?></td>
                            <td>Rs. <?= $total ?></td>
                            <td><a href="order_details.php?id=<?= $order_id ?>">View Details</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have no orders yet. <a href="../products/list.php">Shop Now</a></p>
        <?php endif; ?>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
