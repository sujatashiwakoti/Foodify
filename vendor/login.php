<?php
session_start();
include("../config/db.php");

if(isset($_SESSION['vendor_email'])){
    header("Location: dashboard.php");
    exit();
}

$login_error = "";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM vendors WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $_SESSION['vendor_email'] = $email;
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
        <h2>Vendor Login</h2>
        <?php if($login_error) echo "<p class='error'>$login_error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
