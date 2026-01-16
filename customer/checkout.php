<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['customer_email'];
$customer_id = $conn->query("SELECT id FROM customers WHERE email='$email'")->fetch_assoc()['id'];

// Get cart items
$cart = $conn->query("
    SELECT c.id as cart_id, p.name, p.price, c.quantity
    FROM cart c
    JOIN products p ON c.product_id = p.id
    WHERE c.customer_id = $customer_id
");

if(isset($_POST['place_order']) && $cart->num_rows > 0){
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];

    // Insert into orders table
    $stmt = $conn->prepare("INSERT INTO orders(customer_id,address,payment_method) VALUES(?,?,?)");
    $stmt->bind_param("iss",$customer_id,$address,$payment_method);
    if($stmt->execute()){
        $order_id = $stmt->insert_id;

        // Move cart items to order_items
        while($item = $cart->fetch_assoc()){
            $stmt2 = $conn->prepare("INSERT INTO order_items(order_id,product_id,quantity,price) VALUES(?,?,?,?)");
            $stmt2->bind_param("iiid",$order_id,$item['cart_id'],$item['quantity'],$item['price']);
            $stmt2->execute();
        }

        // Clear cart
        $conn->query("DELETE FROM cart WHERE customer_id=$customer_id");
        header("Location: orders.php");
        exit();
    }
}

include("../includes/header.php");
?>

<section class="checkout-section">
    <div class="container">
        <h2>Checkout</h2>
        <?php if($cart->num_rows == 0): ?>
            <p>Your cart is empty. <a href="../products/list.php">Shop Now</a></p>
        <?php else: ?>
            <form method="POST">
                <label>Delivery Address:</label>
                <textarea name="address" required></textarea>
                <label>Payment Method:</label>
                <select name="payment_method" required>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Esewa">Esewa</option>
                    <option value="Khalti">Khalti</option>
                </select>
                <button type="submit" name="place_order" class="btn-primary">Place Order</button>
            </form>
        <?php endif; ?>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
