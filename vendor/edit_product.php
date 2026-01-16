<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['vendor_email'])){
    header("Location: login.php");
    exit();
}

$vendor_email = $_SESSION['vendor_email'];
$vendor_id = $conn->query("SELECT id FROM vendors WHERE email='$vendor_email'")->fetch_assoc()['id'];

if(!isset($_GET['id'])){
    header("Location: products.php");
    exit();
}

$product_id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$product_id AND vendor_id=$vendor_id")->fetch_assoc();
if(!$product) { header("Location: products.php"); exit(); }

$success_msg = $error_msg = "";

if(isset($_POST['update_product'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    if($image){
        $target = "../assets/images/products/".$image;
        move_uploaded_file($tmp_name, $target);
    } else {
        $image = $product['image'];
    }

    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, image=? WHERE id=? AND vendor_id=?");
    $stmt->bind_param("sdssi", $name, $price, $image, $product_id, $vendor_id);
    if($stmt->execute()){
        $success_msg = "Product updated successfully!";
    } else $error_msg = "Failed to update product!";
}

include("../includes/header.php");
?>

<section class="edit-product-section">
    <div class="container">
        <h2>Edit Product</h2>
        <?php if($success_msg) echo "<p class='success'>$success_msg</p>"; ?>
        <?php if($error_msg) echo "<p class='error'>$error_msg</p>"; ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="name" value="<?= $product['name'] ?>" required>
            <input type="number" name="price" value="<?= $product['price'] ?>" step="0.01" required>
            <input type="file" name="image">
            <img src="../assets/images/products/<?= $product['image'] ?>" width="100" alt="Current Image">
            <button type="submit" name="update_product">Update Product</button>
        </form>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
