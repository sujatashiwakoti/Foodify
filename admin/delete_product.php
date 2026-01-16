<?php
session_start();
include("../config/db.php");
if(!isset($_SESSION['admin_email'])) header("Location: login.php");

$id = $_GET['id'];
$product = $conn->query("SELECT image FROM products WHERE id=$id")->fetch_assoc();
if($product['image'] && file_exists("../assets/images/products/".$product['image'])){
    unlink("../assets/images/products/".$product['image']);
}
$conn->query("DELETE FROM products WHERE id=$id");
header("Location: products.php");
exit();
