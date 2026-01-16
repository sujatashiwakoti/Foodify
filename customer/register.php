<?php
session_start();
include("../config/db.php");

$register_error = "";
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->query("SELECT * FROM customers WHERE email='$email'");
    if($check->num_rows > 0){
        $register_error = "Email already registered";
    } else {
        $conn->query("INSERT INTO customers (name,email,password) VALUES ('$name','$email','$password')");
        $_SESSION['customer_email'] = $email;
        header("Location: dashboard.php");
        exit();
    }
}

include("../includes/header.php");
?>

<section class="auth-section">
    <div class="container">
        <h2>Customer Registration</h2>
        <?php if($register_error) echo "<p class='error'>$register_error</p>"; ?>
        <form method="POST" action="">
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</section>

<style>
/* Reuse login styles */
.auth-section input { display:block; width: 300px; margin:10px auto; padding:10px; }
.auth-section button { padding:10px 20px; background:#1f8ef1; color:#fff; border:none; cursor:pointer; }
.auth-section .error { color:red; margin-bottom:10px; }
</style>

<?php include("../includes/footer.php"); ?>
