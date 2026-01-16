<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");

include("../includes/header.php");
include("../includes/sidebar_admin.php");

if(!isset($_GET['id'])){
    header("Location: products.php");
    exit();
}

$product_id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$product_id")->fetch_assoc();

if(!$product){
    echo "<p>Product not found!</p>";
    exit();
}

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];

    if($_FILES['image']['name']){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/products/$image");
        $conn->query("UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$product_id");
    } else {
        $conn->query("UPDATE products SET name='$name', price='$price' WHERE id=$product_id");
    }

    header("Location: products.php");
    exit();
}
?>

<div class="admin-content">
    <h1>Edit Product</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

        <label>Price:</label>
        <input type="number" name="price" value="<?= $product['price'] ?>" required>

        <label>Current Image:</label>
        <img src="../assets/images/products/<?= $product['image'] ?>" width="100" style="display:block;margin-bottom:10px;">

        <label>Change Image:</label>
        <input type="file" name="image">

        <button type="submit" name="update">Update Product</button>
    </form>
</div>

<style>
.admin-content form { max-width:400px; display:flex; flex-direction:column; gap:10px; }
.admin-content form input { padding:8px; border-radius:5px; border:1px solid #ccc; }
.admin-content form button { padding:10px; background:#1f8ef1; color:#fff; border:none; cursor:pointer; border-radius:5px; }
</style>

<?php include("../includes/footer.php"); ?>
