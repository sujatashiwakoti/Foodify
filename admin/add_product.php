<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");

include("../includes/header.php");
include("../includes/sidebar_admin.php");

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/products/$image");

    $conn->query("INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')");
    header("Location: products.php");
    exit();
}
?>

<div class="admin-content">
    <h1>Add Product</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Price:</label>
        <input type="number" name="price" required>

        <label>Image:</label>
        <input type="file" name="image" required>

        <button type="submit" name="add">Add Product</button>
    </form>
</div>

<style>
.admin-content form { max-width:400px; display:flex; flex-direction:column; gap:10px; }
.admin-content form input { padding:8px; border-radius:5px; border:1px solid #ccc; }
.admin-content form button { padding:10px; background:#1f8ef1; color:#fff; border:none; cursor:pointer; border-radius:5px; }
</style>

<?php include("../includes/footer.php"); ?>
