<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");

include("../includes/header.php");
include("../includes/sidebar_admin.php");

// Fetch products
$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<div class="admin-content">
    <h1>Products</h1>
    <a href="add_product.php" class="btn-primary">Add New Product</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($product = $products->fetch_assoc()): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td>Rs. <?= $product['price'] ?></td>
                <td><img src="../assets/images/products/<?= $product['image'] ?>" width="50"></td>
                <td>
                    <a href="edit_product.php?id=<?= $product['id'] ?>">Edit</a> |
                    <a href="delete_product.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<style>
.admin-content table { width: 100%; border-collapse: collapse; margin-top: 20px; }
.admin-content th, .admin-content td { padding: 10px; border: 1px solid #ddd; text-align: left; }
.admin-content img { border-radius: 5px; }
.admin-content a { color:#1f8ef1; text-decoration:none; }
.admin-content .btn-primary { display:inline-block; padding:8px 15px; margin-bottom:10px; background:#1f8ef1; color:#fff; border-radius:5px; text-decoration:none; }
</style>

<?php include("../includes/footer.php"); ?>
