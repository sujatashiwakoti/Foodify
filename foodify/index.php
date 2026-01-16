<?php include("includes/header.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodify</title>
    
    <!-- Link CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-container">

        <div class="hero-text">
            <h1>
                Taste the <span>Heritage</span><br>
                of Newari Cuisine
            </h1>

            <p>
                Authentic flavors from Kathmandu Valley delivered fresh to your doorstep.
            </p>

            <div class="hero-buttons">
                <a href="products_index.php" class="btn-primary">Order Now</a>
                <a href="products_index.php" class="btn-secondary">View Menu</a>
            </div>
        </div>

        <div class="hero-image">
            <img src="assets/images/hero/newaric.jpg" alt="Newari Food">
        </div>

    </div>
</section>

<!-- CATEGORIES SECTION -->
<section class="categories-section">
    <div class="container">

        <div class="section-header">
            <h2>Food Categories</h2>
            <p>Explore traditional Newari food by category</p>
        </div>

        <div class="categories-grid">

            <div class="category-card">
                <img src="assets/images/products/choila.jpg" alt="Choila">
                <h4>Choila</h4>
            </div>

            <div class="category-card">
                <img src="assets/images/products/bara.jpg" alt="Bara">
                <h4>Bara</h4>
            </div>

            <div class="category-card">
                <img src="assets/images/products/yomari.jpg" alt="Yomari">
                <h4>Yomari</h4>
            </div>

            <div class="category-card">
                <img src="assets/images/products/chatmari.jpg" alt="Chatamari">
                <h4>Chatamari</h4>
            </div>

        </div>
    </div>
</section>

<!-- POPULAR DELICACIES -->
<section class="popular-section">
    <div class="container">

        <div class="section-header flex-between">
            <h2>Popular Delicacies</h2>
            <a href="products/list.php" class="view-all">View All</a>
        </div>

        <div class="products-grid">

            <div class="product-card">
                <img src="assets/images/products/choila.jpg" alt="Buff Choila">
                <div class="product-info">
                    <p class="category">Meat</p>
                    <h4>Buff Choila</h4>
                    <div class="price-cart">
                        <span>Rs. 450</span>
                        <button>Add</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <img src="assets/images/products/bara.jpg" alt="Bara">
                <div class="product-info">
                    <p class="category">Vegetarian</p>
                    <h4>Newari Bara</h4>
                    <div class="price-cart">
                        <span>Rs. 150</span>
                        <button>Add</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <img src="assets/images/products/yomari.jpg" alt="Yomari">
                <div class="product-info">
                    <p class="category">Dessert</p>
                    <h4>Yomari</h4>
                    <div class="price-cart">
                        <span>Rs. 120</span>
                        <button>Add</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- VENDOR PROMOTION -->
<section class="vendor-section">
    <div class="container vendor-box">

        <div class="vendor-content">
            <h2>Want to sell your traditional delicacies?</h2>
            <p>
                Join Foodify and reach thousands of customers.
                Low commission, high visibility, and full vendor control.
            </p>
            <a href="vendor/register.php" class="vendor-btn">Join as Vendor</a>
        </div>

        <div class="vendor-images">
            <img src="assets/images/vendors/vendor2.jpeg" alt="Vendor Kitchen">
            <img src="assets/images/vendors/vendor3.jpeg" alt="Local Vendor">
        </div>

    </div>
</section>

<!-- NEW ARRIVALS -->
<section class="new-arrivals">
    <div class="container">

        <div class="section-header">
            <h2>New Arrivals</h2>
            <a href="products/list.php" class="view-link">See More →</a>
        </div>

        <div class="product-grid">

            <div class="product-card">
                <img src="assets/images/products/choila.jpg">
                <h4>Duck Choila</h4>
                <p class="price">Rs. 550</p>
            </div>

            <div class="product-card">
                <img src="assets/images/products/bara.jpg">
                <h4>Mala Bara</h4>
                <p class="price">Rs. 180</p>
            </div>

            <div class="product-card">
                <img src="assets/images/products/yomari.jpg">
                <h4>Sweet Yomari</h4>
                <p class="price">Rs. 120</p>
            </div>

            <div class="product-card">
                <img src="assets/images/products/eggchatamari.jpeg">
                <h4>Egg Chatamari</h4>
                <p class="price">Rs. 250</p>
            </div>

        </div>
    </div>
</section>

<!-- POPULAR PRODUCTS -->
<section class="popular-section">
    <div class="container">

        <div class="section-header flex-between">
            <div>
                <h2>Popular Delicacies</h2>
                <span class="underline"></span>
            </div>
            <a href="products/list.php" class="view-all">View All</a>
        </div>

        <div class="products-grid">

            <?php
            include("config/db.php");

            $sql = "SELECT * FROM products WHERE status='active' ORDER BY id DESC LIMIT 8";
            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while($row = $result->fetch_assoc()):
            ?>
            <div class="product-card">
                <img src="assets/images/products/<?= $row['image']; ?>" alt="<?= $row['name']; ?>">

                <div class="product-info">
                    <p class="category"><?= $row['category']; ?></p>
                    <h4><?= $row['name']; ?></h4>

                    <div class="price-cart">
                        <span>Rs. <?= $row['price']; ?></span>
                        <a href="products/details.php?id=<?= $row['id']; ?>">
                            <button>View</button>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            else:
                echo "<p>No products available.</p>";
            endif;
            ?>

        </div>
    </div>
</section>



<?php include("includes/footer.php"); ?>
