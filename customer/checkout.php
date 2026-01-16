<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['customer_email'];
$customer_id = $conn->query("SELECT id FROM customers WHERE email='$email'")->fetch_assoc()['id'];

if(isset($_POST['checkout'])){
    foreach($_POST['product_id'] as $i => $pid){
        $quantity = $_POST['quantity'][$i];
        $conn->query("INSERT INTO orders (customer_id, product_id, quantity, status, created_at) 
                      VALUES ($customer_id, $pid, $quantity, 'Pending', NOW())");
        $conn->query("DELETE FROM cart WHERE customer_id=$customer_id AND product_id=$pid");
    }
    header("Location: orders.php");
}

$cart = $conn->query("SELECT c.product_id, p.name, p.price, c.quantity 
                      FROM cart c JOIN products p ON c.product_id=p.id 
                      WHERE c.customer_id=$customer_id");

include("../includes/header.php");
?>

<section class="checkout-section">
    <div class="container">
        <h2>Checkout</h2>
        <?php if($cart->num_rows > 0): ?>
        <form method="POST" action="">
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
                    <?php $grandTotal=0; while($item=$cart->fetch_assoc()): 
                        $total = $item['price'] * $item['quantity']; 
                        $grandTotal += $total;
                    ?>
                        <tr>
                            <td><?= $item['name'] ?>
                                <input type="hidden" name="product_id[]" value="<?= $item['product_id'] ?>">
                            </td>
                            <td>
                                <input type="number" name="quantity[]" value="<?= $item['quantity'] ?>" min="1">
                            </td>
                            <td>Rs. <?= $item['price'] ?></td>
                            <td>Rs. <?= $total ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <h3>Grand Total: Rs. <?= $grandTotal ?></h3>
            <button type="submit" name="checkout" class="btn-primary">Place Order</button>
        </form>
        <?php else: ?>
            <p>Your cart is empty. <a href="../products/list.php">Shop Now</a></p>
        <?php endif; ?>
    </div>
</section>

<style>
.checkout-section table { width:100%; border-collapse: collapse; margin-top: 20px; }
.checkout-section th, .checkout-section td { padding:10px; border:1px solid #ddd; text-align:left; }
.checkout-section input { width:60px; padding:5px; }
</style>

<?php include("../includes/footer.php"); ?>
