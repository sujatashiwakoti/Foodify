<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['vendor_email'])){
    header("Location: login.php");
    exit();
}

$vendor_email = $_SESSION['vendor_email'];
$vendor_id = $conn->query("SELECT id FROM vendors WHERE email='$vendor_email'")->fetch_assoc()['id'];

$success_msg = $error_msg = "";

if(isset($_POST['add_product'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $target = "../assets/images/products/".$image;

    if(move_uploaded_file($tmp_name,$target)){
        $stmt = $conn->prepare("INSERT INTO products (vendor_id,name,price,image) VALUES (?,?,?,?)");
        $stmt->bind_param("isds",$vendor_id,$name,$price,$image);
        if($stmt->execute()){
            $success_msg = "Product added successfully!";
        } else $error_msg = "Failed to add product!";
    } else $error_msg = "Image upload failed!";
}

include("../includes/header.php");
?>

<section class="add-product-section">
    <div class="container">
        <h2>Add Product</h2>
        <?php if($success_msg) echo "<p class='success'>$success_msg</p>"; ?>
        <?php if($error_msg) echo "<p class='error'>$error_msg</p>"; ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" name="price" placeholder="Price" step="0.01" required>
            <input type="file" name="image" required>
            <button type="submit" name="add_product">Add Product</button>
        </form>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
