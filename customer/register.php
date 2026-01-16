<?php
session_start();
include("../config/db.php");

// Redirect if already logged in
if(isset($_SESSION['customer_email'])){
    header("Location: dashboard.php");
    exit();
}

$register_error = "";
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM customers WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $register_error = "Email already exists";
    } else {
        $stmt = $conn->prepare("INSERT INTO customers(name,email,password) VALUES(?,?,?)");
        $stmt->bind_param("sss",$name,$email,$password);
        if($stmt->execute()){
            $_SESSION['customer_email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            $register_error = "Registration failed, try again";
        }
    }
}

include("../includes/header.php");
?>

<section class="auth-section">
    <div class="container">
        <h2>Customer Register</h2>
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

<?php include("../includes/footer.php"); ?>
