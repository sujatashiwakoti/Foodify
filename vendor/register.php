<?php
session_start();
include("../config/db.php");

$success_msg = "";
$error_msg = "";

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO vendors (name,email,password) VALUES (?,?,?)");
    $stmt->bind_param("sss",$name,$email,$password);

    if($stmt->execute()){
        $success_msg = "Registration successful! You can login now.";
    } else {
        $error_msg = "Registration failed!";
    }
}

include("../includes/header.php");
?>

<section class="auth-section">
    <div class="container">
        <h2>Vendor Registration</h2>
        <?php if($success_msg) echo "<p class='success'>$success_msg</p>"; ?>
        <?php if($error_msg) echo "<p class='error'>$error_msg</p>"; ?>
        <form method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
