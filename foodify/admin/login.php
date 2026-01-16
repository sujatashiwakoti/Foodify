<?php
session_start();
include("../config/db.php");

if(isset($_SESSION['admin_email'])){
    header("Location: dashboard.php");
    exit();
}

$login_error = "";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM admins WHERE email='$email' AND password='$password'");
    if($result->num_rows == 1){
        $_SESSION['admin_email'] = $email;
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
        <h2>Admin Login</h2>
        <?php if($login_error) echo "<p class='error'>$login_error</p>"; ?>
        <form method="POST" action="">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</section>

<style>
.auth-section { padding: 50px 0; text-align: center; }
.auth-section input { display:block; width: 300px; margin:10px auto; padding:10px; }
.auth-section button { padding:10px 20px; background:#1f8ef1; color:#fff; border:none; cursor:pointer; }
.auth-section .error { color:red; margin-bottom:10px; }
</style>

<?php include("../includes/footer.php"); ?>
