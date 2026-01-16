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
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE customers SET name=?, password=? WHERE email=?");
    $stmt->bind_param("sss", $name, $password, $email);
    $stmt->execute();
    $customer = $conn->query("SELECT * FROM customers WHERE email='$email'")->fetch_assoc();
    $success = "Profile updated successfully!";
}

include("../includes/header.php");
?>

<section class="profile-section">
    <div class="container">
        <h2>My Profile</h2>
        <?php if(isset($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($customer['name']) ?>" required>
            <label>Email:</label>
            <input type="email" value="<?= htmlspecialchars($customer['email']) ?>" disabled>
            <label>Password:</label>
            <input type="password" name="password" value="<?= htmlspecialchars($customer['password']) ?>" required>
            <button type="submit" name="update" class="btn-primary">Update Profile</button>
        </form>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
