<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['vendor_email'])){
    header("Location: login.php");
    exit();
}

$vendor_email = $_SESSION['vendor_email'];
$vendor = $conn->query("SELECT * FROM vendors WHERE email='$vendor_email'")->fetch_assoc();

$success_msg = "";
$error_msg = "";

if(isset($_POST['update_profile'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE vendors SET name=?, password=? WHERE id=?");
    $stmt->bind_param("ssi",$name,$password,$vendor['id']);

    if($stmt->execute()){
        $success_msg = "Profile updated successfully!";
        $vendor['name'] = $name;
        $vendor['password'] = $password;
    } else $error_msg = "Failed to update profile!";
}

include("../includes/header.php");
?>

<section class="vendor-profile">
    <div class="container">
        <h2>Profile</h2>
        <?php if($success_msg) echo "<p class='success'>$success_msg</p>"; ?>
        <?php if($error_msg) echo "<p class='error'>$error_msg</p>"; ?>
        <form method="POST">
            <input type="text" name="name" value="<?= $vendor['name'] ?>" required>
            <input type="password" name="password" value="<?= $vendor['password'] ?>" required>
            <button type="submit" name="update_profile">Update Profile</button>
        </form>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
