<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['vendor_email'])){
    header("Location: login.php");
    exit();
}

$vendor_email = $_SESSION['vendor_email'];
$vendor_id = $conn->query("SELECT id FROM vendors WHERE email='$vendor_email'")->fetch_assoc()['id'];

$products = $conn->query("SELECT * FROM products WHERE vendor_id=$vendor_id");

include("../includes/header.php");
?>

<section class="vendor-products">
    <div class="container">
        <h2>My Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($p = $products->fetch_assoc()): ?>
                    <tr>
                        <td><?= $p['name'] ?></td>
                        <td>Rs. <?= $p['price'] ?></td>
                        <td><img src="../assets/images/products/<?= $p['image'] ?>" width="50"></td>
                        <td>
                            <a href="edit_product.php?id=<?= $p['id'] ?>">Edit</a> |
                            <a href="delete_product.php?id=<?= $p['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
