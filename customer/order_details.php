<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

$order_id = $_GET['id'];
$items = $conn->query("SELECT p.name, oi.quantity, oi.price FROM order_items oi JOIN products p ON oi.product_id=p.id WHERE oi.order_id=$order_id");

include("../includes/header.php");
?>

<section class="order-details-section">
    <div class="container">
        <h2>Order Details #<?= $order_id ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $grandTotal=0; while($item=$items->fetch_assoc()):
                    $total = $item['price'] * $item['quantity'];
                    $grandTotal += $total;
                ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>Rs. <?= $item['price'] ?></td>
                    <td>Rs. <?= $total ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <h3>Grand Total: Rs. <?= $grandTotal ?></h3>
        <a href="orders.php" class="btn-secondary">Back to Orders</a>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
