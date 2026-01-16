<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}
include("../includes/header.php");
include("../config/db.php");

$customer_email = $_SESSION['customer_email'];
$customer = $conn->query("SELECT * FROM customers WHERE email='$customer_email'")->fetch_assoc();
?>

<section class="customer-dashboard">
    <div class="container">
        <h2>Welcome back, <?= htmlspecialchars($customer['name']) ?>!</h2>
        <p>Here’s a quick overview of your account and recent activity.</p>

        <div class="dashboard-cards">
            <div class="card">
                <h3>My Orders</h3>
                <?php
                $orders = $conn->query("SELECT COUNT(*) as total FROM orders WHERE customer_id=".$customer['id']);
                $totalOrders = $orders->fetch_assoc()['total'];
                ?>
                <p><?= $totalOrders ?> orders placed</p>
                <a href="orders.php" class="btn-primary">View Orders</a>
            </div>

            <div class="card">
                <h3>My Cart</h3>
                <?php
                $cart = $conn->query("SELECT COUNT(*) as total FROM cart WHERE customer_id=".$customer['id']);
                $totalCart = $cart->fetch_assoc()['total'];
                ?>
                <p><?= $totalCart ?> items in cart</p>
                <a href="cart.php" class="btn-secondary">Go to Cart</a>
            </div>

            <div class="card">
                <h3>Profile</h3>
                <p>Update your personal info</p>
                <a href="profile.php" class="btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</section>

<style>
.customer-dashboard .dashboard-cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}
.customer-dashboard .card {
    background: #fff;
    padding: 20px;
    flex: 1 1 250px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 10px;
}
.customer-dashboard .card h3 { margin-bottom: 10px; }
.customer-dashboard .card p { margin-bottom: 15px; }
</style>

<?php include("../includes/footer.php"); ?>
