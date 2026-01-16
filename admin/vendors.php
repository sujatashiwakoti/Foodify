<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");

include("../includes/header.php");
include("../includes/sidebar_admin.php");

$vendors = $conn->query("SELECT * FROM vendors ORDER BY id DESC");
?>

<div class="admin-content">
    <h1>Vendors</h1>
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
            <?php while($v=$vendors->fetch_assoc()): ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= htmlspecialchars($v['name']) ?></td>
                <td><?= $v['email'] ?></td>
                <td><?= $v['phone'] ?></td>
                <td>
                    <a href="edit_vendor.php?id=<?= $v['id'] ?>">Edit</a> |
                    <a href="delete_vendor.php?id=<?= $v['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include("../includes/footer.php"); ?>
