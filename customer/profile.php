<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['customer_email'];
$customer = $conn->query("SELECT * FROM customers WHERE email='$email'")->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $conn->query("UPDATE customers SET name='$name', phone='$phone' WHERE email='$email'");
    header("Refresh:0");
}

include("../includes/header.php");
?>

<section class="profile-section">
    <div class="container">
        <h2>My Profile</h2>
        <form method="POST" action="">
            <label>Name:</label>
            <input type="text" name="name" value="<?= $customer['name'] ?>" required>
            <label>Email:</label>
            <input type="email" value="<?= $customer['email'] ?>" readonly>
            <label>Phone:</label>
            <input type="text" name="phone" value="<?= $customer['phone'] ?>">
            <button type="submit" name="update">Update Profile</button>
        </form>
    </div>
</section>

<style>
.profile-section input { display:block; width: 300px; margin:10px auto; padding:10px; }
.profile-section button { padding:10px 20px; background:#1f8ef1; color:#fff; border:none; cursor:pointer; }
</style>

<?php include("../includes/footer.php"); ?>
