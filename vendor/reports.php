<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['vendor_email'])){
    header("Location: login.php");
    exit();
}

$vendor_email = $_SESSION['vendor_email'];
$vendor_id = $conn->query("SELECT id FROM vendors WHERE email='$vendor_email'")->fetch_assoc()['id'];

$sales_report = $conn->query("
    SELECT p.name as product_name, SUM(o.quantity) as total_sold, SUM(o.total_price) as total_earned
    FROM orders o
    JOIN products p ON o.product_id=p.id
    WHERE o.vendor_id=$vendor_id
    GROUP BY o.product_id
");

include("../includes/header.php");
?>

<section class="vendor-reports">
    <div class="container">
        <h2>Sales Reports</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Total Sold</th>
                    <th>Total Earned</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $sales_report->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['total_sold'] ?></td>
                        <td>Rs. <?= $row['total_earned'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include("../includes/footer.php"); ?>
