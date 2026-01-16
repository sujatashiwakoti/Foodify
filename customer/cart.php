<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['customer_email'];
$customer_id = $conn->query("SELECT id FROM customers WHERE email='$email'")->fetch_assoc()['id'];

$cart = $conn->query("
    SELECT c.id as cart_id, p.name, p.price, p.image, c.quantity
    FROM cart c
    JOIN products p ON c.product_id = p.id
    WHERE c.customer_id = $customer_id
");

include("../includes/header.php");
?>

<section class="cart-section">
    <div class="container">
        <h2>My Cart</h2>
        <?php if($cart->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $grandTotal=0; while($item=$cart->fetch_assoc()): 
                        $total = $item['price'] * $item['quantity'];
                        $grandTotal += $total;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><img src="../assets/images/products/<?= htmlspecialchars($item['image']) ?>" width="50"></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>Rs. <?= $item['price'] ?></td>
                            <td>Rs. <?= $total ?></td>
                            <td><a href="../cart/remove_from_cart.php?id=<?= $item['cart_id'] ?>">Remove</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <h3>Grand Total: Rs. <?= $grandTotal ?></h3>
            <a href="checkout.php" class="btn-primary">Proceed to Checkout</a>
        <?php else: ?>
            <p>Your cart is empty. <a href="../products/list.php">Shop Now</a></p>
        <?php endif; ?>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
