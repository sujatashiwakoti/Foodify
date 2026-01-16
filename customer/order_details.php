<?php
session_start();
include("../config/db.php");
include("../includes/header.php");

if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

$order_id = $_GET['id'];
$customer_email = $_SESSION['customer_email'];
$customer_id = $conn->query("SELECT id FROM customers WHERE email='$customer_email'")->fetch_assoc()['id'];

$order = $conn->query("
    SELECT o.id as order_id, o.quantity, o.status, o.created_at, p.name as product_name, p.price, p.image
    FROM orders o
    JOIN products p ON o.product_id = p.id
    WHERE o.customer_id=$customer_id AND o.id=$order_id
")->fetch_all(MYSQLI_ASSOC);

if(!$order) {
    echo "<p>Order not found.</p>";
    exit();
}
?>

<section class="order-details">
    <div class="container">
        <h2>Order #<?= $order[0]['order_id'] ?></h2>
        <p>Status: <strong><?= $order[0]['status'] ?></strong></p>
        <p>Placed on: <?= date("d M Y", strtotime($order[0]['created_at'])) ?></p>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $grandTotal=0; foreach($order as $item): 
                    $total = $item['price'] * $item['quantity']; 
                    $grandTotal += $total;
                ?>
                    <tr>
                        <td><?= $item['product_name'] ?></td>
                        <td><img src="../assets/images/products/<?= $item['image'] ?>" width="50"></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>Rs. <?= $item['price'] ?></td>
                        <td>Rs. <?= $total ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Grand Total: Rs. <?= $grandTotal ?></h3>
    </div>
</section>

<style>
.order-details table { width: 100%; border-collapse: collapse; margin-top: 20px; }
.order-details th, .order-details td { padding: 10px; border: 1px solid #ddd; text-align: left; }
.order-details img { border-radius: 5px; }
</style>

<?php include("../includes/footer.php"); ?>
