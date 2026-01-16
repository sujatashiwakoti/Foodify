<?php
session_start();
include("../config/db.php");

// Redirect if not logged in
if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['customer_email'];
$customer = $conn->query("SELECT * FROM customers WHERE email='$email'")->fetch_assoc();

include("../includes/header.php");
?>

<section class="dashboard-section">
    <div class="container">
        <h2>Welcome, <?= htmlspecialchars($customer['name']) ?>!</h2>
        <p>Your Email: <?= htmlspecialchars($customer['email']) ?></p>

        <div class="dashboard-links">
            <a href="orders.php" class="btn-primary">My Orders</a>
            <a href="cart.php" class="btn-secondary">My Cart</a>
            <a href="profile.php" class="btn-primary">Profile</a>
            <a href="reports.php" class="btn-secondary">Reports</a>
        </div>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
