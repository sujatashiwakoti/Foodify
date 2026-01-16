<?php
session_start();
include("../config/db.php");

// Redirect if already logged in
if(isset($_SESSION['customer_email'])){
    header("Location: dashboard.php");
    exit();
}

$login_error = "";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simple authentication
    $stmt = $conn->prepare("SELECT * FROM customers WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $_SESSION['customer_email'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $login_error = "Invalid email or password";
    }
}

include("../includes/header.php");
?>

<section class="auth-section">
    <div class="container">
        <h2>Customer Login</h2>
        <?php if($login_error) echo "<p class='error'>$login_error</p>"; ?>
        <form method="POST" action="">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
