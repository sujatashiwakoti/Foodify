<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");

include("../includes/header.php");
include("../includes/sidebar_admin.php");

$customers = $conn->query("SELECT * FROM customers ORDER BY id DESC");
?>

<div class="admin-content">
    <h1>Customers</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($c=$customers->fetch_assoc()): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= htmlspecialchars($c['name']) ?></td>
                <td><?= $c['email'] ?></td>
                <td><?= $c['phone'] ?></td>
                <td>
                    <a href="edit_customer.php?id=<?= $c['id'] ?>">Edit</a> |
                    <a href="delete_customer.php?id=<?= $c['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<style>
.admin-content table { width:100%; border-collapse: collapse; margin-top:20px; }
.admin-content th, td { padding:10px; border:1px solid #ddd; }
</style>

<?php include("../includes/footer.php"); ?>
