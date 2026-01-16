<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yomari (Chaku) | Foodify</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<section class="product-details">

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="products.php">Marketplace</a> ›
        <span>Yomari (Chaku)</span>
    </div>

    <div class="details-wrapper">

        <!-- LEFT: IMAGE -->
        <div class="details-image">
            <img src="assets/images/yomari.jpg" alt="Yomari">
        </div>

        <!-- RIGHT: CONTENT -->
        <div class="details-content">

            <span class="product-tag sweet">Sweet</span>

            <h1>Yomari (Chaku)</h1>

            <div class="rating">
                ⭐⭐⭐⭐⭐ <span>5.0 (128 reviews)</span>
            </div>

            <p class="short-desc">
                Traditional Newari steamed dumpling prepared during Yomari Punhi,
                symbolizing prosperity and warmth.
            </p>

            <h2 class="price">Rs. 85</h2>

            <div class="quantity-box">
                <label>Quantity</label>
                <div class="qty-control">
                    <button>-</button>
                    <input type="number" value="1">
                    <button>+</button>
                </div>
            </div>

            <div class="action-buttons">
                <button class="add-cart">Add to Cart</button>
                <button class="buy-now">Buy Now</button>
            </div>

            <div class="product-info">
                <h3>About this dish</h3>
                <p>
                    Yomari is a handcrafted rice flour dumpling filled with rich chaku
                    (molasses) and roasted sesame seeds. Soft, warm, and mildly sweet,
                    it is a beloved Newari dessert enjoyed fresh.
                </p>

                <ul>
                    <li>✔ Handmade daily</li>
                    <li>✔ 100% vegetarian</li>
                    <li>✔ No preservatives</li>
                    <li>✔ Authentic Newari recipe</li>
                </ul>
            </div>

        </div>
    </div>

</section>
<?php
if (!isset($_GET['id'])) {
    die("Product not found");
}

$product_id = $_GET['id'];
echo "Product ID: " . $product_id;
?>


</body>
</html>
