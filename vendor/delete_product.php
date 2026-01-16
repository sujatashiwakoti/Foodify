<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['vendor_email']) || !isset($_GET['id'])){
    header("Location: login.php");
    exit();
}

$vendor_email = $_SESSION['vendor_email'];
$vendor_id = $conn->query("SELECT id FROM vendors WHERE email='$vendor_email'")->fetch_assoc()['id'];
$product_id = $_GET['id'];

// Delete product only if it belongs to this vendor
$conn->query("DELETE FROM products WHERE id=$product_id AND vendor_id=$vendor_id");

header("Location: products.php");
exit();
