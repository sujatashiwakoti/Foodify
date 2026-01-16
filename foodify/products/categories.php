<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Foodify | Newari Cuisine</title>
    
    <!-- Link CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- MENU HEADER SECTION -->
<section class="menu-header">
    <div class="container">
        <h1>Our Traditional Menu</h1>
        <p>Explore authentic Newari delicacies from the heart of Kathmandu Valley</p>
        
        <!-- Search and Filter Bar -->
        <div class="search-filter-bar">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search dishes...">
                <button id="searchBtn"><i class="fas fa-search"></i></button>
            </div>
            
            <div class="filter-options">
                <select id="categoryFilter">
                    <option value="all">All Categories</option>
                    <option value="choila">Choila</option>
                    <option value="bara">Bara</option>
                    <option value="yomari">Yomari</option>
                    <option value="chatamari">Chatamari</option>
                    <option value="meat">Meat</option>
                    <option value="vegetarian">Vegetarian</option>
                    <option value="dessert">Dessert</option>
                </select>
                
                <select id="priceFilter">
                    <option value="all">All Prices</option>
                    <option value="low">Under Rs. 200</option>
                    <option value="medium">Rs. 200 - 500</option>
                    <option value="high">Above Rs. 500</option>
                </select>
                
                <select id="sortFilter">
                    <option value="newest">Newest First</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                    <option value="popular">Most Popular</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- CATEGORY FILTERS -->
<section class="category-filters">
    <div class="container">
        <div class="category-tabs">
            <button class="category-tab active" data-category="all">All Items</button>
            <button class="category-tab" data-category="choila">Choila</button>
            <button class="category-tab" data-category="bara">Bara</button>
            <button class="category-tab" data-category="yomari">Yomari</button>
            <button class="category-tab" data-category="chatamari">Chatamari</button>
            <button class="category-tab" data-category="thali">Thali Sets</button>
            <button class="category-tab" data-category="meat">Meat Dishes</button>
            <button class="category-tab" data-category="vegetarian">Vegetarian</button>
        </div>
    </div>
</section>

<!-- MENU PRODUCTS SECTION -->
<section class="menu-products">
    <div class="container">
        <div class="products-header">
            <h2 id="productCount">Loading products...</h2>
            <div class="view-toggle">
                <button id="gridView" class="view-btn active"><i class="fas fa-th"></i></button>
                <button id="listView" class="view-btn"><i class="fas fa-list"></i></button>
            </div>
        </div>
        
        <div class="products-container grid-view" id="productsContainer">
            <!-- Products will be loaded here -->
            <?php
            include("config/db.php");
            
            // Get category from URL if exists
            $category_filter = isset($_GET['category']) ? $_GET['category'] : 'all';
            
            // Build SQL query
            $sql = "SELECT * FROM products WHERE 1=1";
            
            if ($category_filter != 'all') {
                $sql .= " AND category = '" . $conn->real_escape_string($category_filter) . "'";
            }
            
            $sql .= " ORDER BY created_at DESC";
            
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <div class="product-card" data-category="<?= strtolower($row['category']) ?>" data-price="<?= $row['price'] ?>">
                <div class="product-image">
                    <img src="assets/images/products/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                    <?php if($row['is_new']): ?>
                    <span class="badge new">New</span>
                    <?php endif; ?>
                    <?php if($row['discount'] > 0): ?>
                    <span class="badge discount">-<?= $row['discount'] ?>%</span>
                    <?php endif; ?>
                </div>
                
                <div class="product-details">
                    <div class="product-category"><?= $row['category'] ?></div>
                    <h3 class="product-name"><?= $row['name'] ?></h3>
                    <p class="product-description"><?= substr($row['description'], 0, 80) ?>...</p>
                    
                    <div class="product-meta">
                        <div class="rating">
                            <?php
                            $rating = $row['rating'] ?? 0;
                            for($i = 1; $i <= 5; $i++):
                            ?>
                            <i class="fas fa-star <?= $i <= $rating ? 'filled' : '' ?>"></i>
                            <?php endfor; ?>
                            <span>(<?= $row['review_count'] ?? 0 ?>)</span>
                        </div>
                        
                        <div class="vendor">
                            <i class="fas fa-store"></i>
                            <?= $row['vendor_name'] ?? 'Foodify Kitchen' ?>
                        </div>
                    </div>
                    
                    <div class="product-footer">
                        <div class="price">
                            <?php if($row['discount'] > 0): 
                                $discounted_price = $row['price'] - ($row['price'] * $row['discount'] / 100);
                            ?>
                            <span class="original-price">Rs. <?= $row['price'] ?></span>
                            <span class="current-price">Rs. <?= number_format($discounted_price, 2) ?></span>
                            <?php else: ?>
                            <span class="current-price">Rs. <?= $row['price'] ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="product-actions">
                            <button class="btn-quantity minus" data-id="<?= $row['id'] ?>">-</button>
                            <input type="number" class="quantity-input" data-id="<?= $row['id'] ?>" value="1" min="1" max="10">
                            <button class="btn-quantity plus" data-id="<?= $row['id'] ?>">+</button>
                            
                            <button class="btn-add-to-cart" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-price="<?= $row['price'] ?>" data-image="<?= $row['image'] ?>">
                                <i class="fas fa-shopping-cart"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo '<div class="no-products">
                        <i class="fas fa-utensils"></i>
                        <h3>No products found in this category</h3>
                        <p>Check back soon for new additions!</p>
                      </div>';
            }
            $conn->close();
            ?>
        </div>
        
        <!-- Load More Button -->
        <div class="load-more-container">
            <button id="loadMore" class="btn-load-more">Load More Items</button>
        </div>
    </div>
</section>

<!-- SPECIAL OFFERS SECTION -->
<section class="special-offers">
    <div class="container">
        <div class="section-header">
            <h2>Today's Special Offers</h2>
            <p>Limited time deals on traditional favorites</p>
        </div>
        
        <div class="offers-grid">
            <div class="offer-card">
                <div class="offer-badge">30% OFF</div>
                <img src="assets/images/products/choila.jpg" alt="Buff Choila">
                <div class="offer-content">
                    <h3>Buff Choila Combo</h3>
                    <p>Buff Choila + Bara + Achaar</p>
                    <div class="offer-price">
                        <span class="old-price">Rs. 750</span>
                        <span class="new-price">Rs. 525</span>
                    </div>
                    <button class="btn-offer">Order Now</button>
                </div>
            </div>
            
            <div class="offer-card">
                <div class="offer-badge">FREE DELIVERY</div>
                <img src="assets/images/products/thali.jpg" alt="Newari Thali">
                <div class="offer-content">
                    <h3>Newari Thali Set</h3>
                    <p>Complete traditional meal for 2</p>
                    <div class="offer-price">
                        <span class="old-price">Rs. 1200</span>
                        <span class="new-price">Rs. 1200</span>
                    </div>
                    <p class="free-delivery">Free Delivery Included</p>
                    <button class="btn-offer">Order Now</button>
                </div>
            </div>
            
            <div class="offer-card">
                <div class="offer-badge">BUY 1 GET 1</div>
                <img src="assets/images/products/yomari.jpg" alt="Yomari">
                <div class="offer-content">
                    <h3>Sweet Yomari</h3>
                    <p>Traditional Newari dessert</p>
                    <div class="offer-price">
                        <span class="old-price">Rs. 240</span>
                        <span class="new-price">Rs. 120</span>
                    </div>
                    <p class="deal-info">Buy 1 Get 1 Free</p>
                    <button class="btn-offer">Order Now</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CART SIDEBAR -->
<div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <h3>Your Cart</h3>
        <button class="close-cart" id="closeCart">&times;</button>
    </div>
    
    <div class="cart-items" id="cartItems">
        <!-- Cart items will be loaded here -->
        <div class="empty-cart">
            <i class="fas fa-shopping-basket"></i>
            <p>Your cart is empty</p>
            <a href="menu.php" class="btn-primary">Browse Menu</a>
        </div>
    </div>
    
    <div class="cart-summary">
        <div class="cart-totals">
            <div class="total-row">
                <span>Subtotal:</span>
                <span id="cartSubtotal">Rs. 0</span>
            </div>
            <div class="total-row">
                <span>Delivery:</span>
                <span id="cartDelivery">Rs. 50</span>
            </div>
            <div class="total-row grand-total">
                <span>Total:</span>
                <span id="cartTotal">Rs. 50</span>
            </div>
        </div>
        
        <div class="cart-actions">
            <button class="btn-view-cart" onclick="window.location.href='cart.php'">View Full Cart</button>
            <button class="btn-checkout" onclick="window.location.href='checkout.php'">Proceed to Checkout</button>
        </div>
    </div>
</div>

<!-- CART ICON FLOATING -->
<div class="cart-floating" id="cartFloating">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-count" id="cartCount">0</span>
</div>

<!-- CART OVERLAY -->
<div class="cart-overlay" id="cartOverlay"></div>

<!-- JavaScript -->
<script>
// Cart functionality
let cart = JSON.parse(localStorage.getItem('foodify_cart')) || [];

function updateCartCount() {
    const count = cart.reduce((total, item) => total + item.quantity, 0);
    document.getElementById('cartCount').textContent = count;
}

function updateCartSidebar() {
    const cartItems = document.getElementById('cartItems');
    const cartSubtotal = document.getElementById('cartSubtotal');
    const cartTotal = document.getElementById('cartTotal');
    
    if (cart.length === 0) {
        cartItems.innerHTML = `
            <div class="empty-cart">
                <i class="fas fa-shopping-basket"></i>
                <p>Your cart is empty</p>
                <a href="menu.php" class="btn-primary">Browse Menu</a>
            </div>
        `;
        cartSubtotal.textContent = 'Rs. 0';
        cartTotal.textContent = 'Rs. 50';
        return;
    }
    
    let itemsHTML = '';
    let subtotal = 0;
    
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;
        
        itemsHTML += `
            <div class="cart-item" data-id="${item.id}">
                <img src="assets/images/products/${item.image}" alt="${item.name}">
                <div class="cart-item-details">
                    <h4>${item.name}</h4>
                    <div class="cart-item-price">Rs. ${item.price} × ${item.quantity}</div>
                    <div class="cart-item-actions">
                        <button class="btn-remove-item" data-id="${item.id}">Remove</button>
                    </div>
                </div>
                <div class="cart-item-quantity">
                    <button class="btn-quantity-cart minus" data-id="${item.id}">-</button>
                    <span>${item.quantity}</span>
                    <button class="btn-quantity-cart plus" data-id="${item.id}">+</button>
                </div>
            </div>
        `;
    });
    
    const delivery = 50;
    const total = subtotal + delivery;
    
    cartItems.innerHTML = itemsHTML;
    cartSubtotal.textContent = `Rs. ${subtotal}`;
    cartTotal.textContent = `Rs. ${total}`;
    
    // Add event listeners to cart buttons
    document.querySelectorAll('.btn-remove-item').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            removeFromCart(productId);
        });
    });
    
    document.querySelectorAll('.btn-quantity-cart.minus').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            updateCartQuantity(productId, -1);
        });
    });
    
    document.querySelectorAll('.btn-quantity-cart.plus').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            updateCartQuantity(productId, 1);
        });
    });
}

function addToCart(productId, productName, productPrice, productImage) {
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: productId,
            name: productName,
            price: parseFloat(productPrice),
            image: productImage,
            quantity: 1
        });
    }
    
    localStorage.setItem('foodify_cart', JSON.stringify(cart));
    updateCartCount();
    updateCartSidebar();
    
    // Show notification
    showNotification(`${productName} added to cart!`);
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    localStorage.setItem('foodify_cart', JSON.stringify(cart));
    updateCartCount();
    updateCartSidebar();
}

function updateCartQuantity(productId, change) {
    const item = cart.find(item => item.id === productId);
    
    if (item) {
        item.quantity += change;
        
        if (item.quantity <= 0) {
            removeFromCart(productId);
        } else {
            localStorage.setItem('foodify_cart', JSON.stringify(cart));
            updateCartCount();
            updateCartSidebar();
        }
    }
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerHTML = `
        <i class="fas fa-check-circle"></i>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.add('show');
    }, 10);
    
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Filter and Search functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize cart
    updateCartCount();
    updateCartSidebar();
    
    // Add to cart buttons
    document.querySelectorAll('.btn-add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            const productImage = this.getAttribute('data-image');
            
            addToCart(productId, productName, productPrice, productImage);
        });
    });
    
    // Quantity buttons
    document.querySelectorAll('.btn-quantity').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const input = document.querySelector(`.quantity-input[data-id="${productId}"]`);
            let quantity = parseInt(input.value);
            
            if (this.classList.contains('plus')) {
                quantity = Math.min(quantity + 1, 10);
            } else {
                quantity = Math.max(quantity - 1, 1);
            }
            
            input.value = quantity;
        });
    });
    
    // Category tabs
    document.querySelectorAll('.category-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            document.querySelectorAll('.category-tab').forEach(t => {
                t.classList.remove('active');
            });
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            const category = this.getAttribute('data-category');
            
            // Filter products
            filterProducts(category);
        });
    });
    
    // Search functionality
    document.getElementById('searchBtn').addEventListener('click', performSearch);
    document.getElementById('searchInput').addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            performSearch();
        }
    });
    
    // Filter functionality
    document.getElementById('categoryFilter').addEventListener('change', filterProducts);
    document.getElementById('priceFilter').addEventListener('change', filterProducts);
    document.getElementById('sortFilter').addEventListener('change', sortProducts);
    
    // View toggle
    document.getElementById('gridView').addEventListener('click', function() {
        document.getElementById('productsContainer').classList.remove('list-view');
        document.getElementById('productsContainer').classList.add('grid-view');
        this.classList.add('active');
        document.getElementById('listView').classList.remove('active');
    });
    
    document.getElementById('listView').addEventListener('click', function() {
        document.getElementById('productsContainer').classList.remove('grid-view');
        document.getElementById('productsContainer').classList.add('list-view');
        this.classList.add('active');
        document.getElementById('gridView').classList.remove('active');
    });
    
    // Cart sidebar
    document.getElementById('cartFloating').addEventListener('click', openCart);
    document.getElementById('closeCart').addEventListener('click', closeCart);
    document.getElementById('cartOverlay').addEventListener('click', closeCart);
    
    // Load more button
    document.getElementById('loadMore').addEventListener('click', function() {
        // Simulate loading more products
        this.textContent = 'Loading...';
        
        setTimeout(() => {
            // In a real app, you would fetch more products from the server
            this.textContent = 'No More Items';
            this.disabled = true;
        }, 1500);
    });
    
    // Update product count
    const productCards = document.querySelectorAll('.product-card');
    document.getElementById('productCount').textContent = `${productCards.length} Items Found`;
});

function filterProducts(category = null) {
    const selectedCategory = category || document.getElementById('categoryFilter').value;
    const priceFilter = document.getElementById('priceFilter').value;
    
    document.querySelectorAll('.product-card').forEach(card => {
        const cardCategory = card.getAttribute('data-category');
        const cardPrice = parseFloat(card.getAttribute('data-price'));
        
        let categoryMatch = selectedCategory === 'all' || cardCategory === selectedCategory;
        let priceMatch = true;
        
        if (priceFilter === 'low') {
            priceMatch = cardPrice < 200;
        } else if (priceFilter === 'medium') {
            priceMatch = cardPrice >= 200 && cardPrice <= 500;
        } else if (priceFilter === 'high') {
            priceMatch = cardPrice > 500;
        }
        
        if (categoryMatch && priceMatch) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
    
    // Update count
    const visibleProducts = document.querySelectorAll('.product-card[style="display: block"]');
    document.getElementById('productCount').textContent = `${visibleProducts.length} Items Found`;
}

function performSearch() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    document.querySelectorAll('.product-card').forEach(card => {
        const productName = card.querySelector('.product-name').textContent.toLowerCase();
        const productDescription = card.querySelector('.product-description').textContent.toLowerCase();
        
        if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
    
    // Update count
    const visibleProducts = document.querySelectorAll('.product-card[style="display: block"]');
    document.getElementById('productCount').textContent = `${visibleProducts.length} Items Found`;
}

function sortProducts() {
    const sortBy = document.getElementById('sortFilter').value;
    const container = document.getElementById('productsContainer');
    const products = Array.from(container.querySelectorAll('.product-card'));
    
    products.sort((a, b) => {
        const priceA = parseFloat(a.getAttribute('data-price'));
        const priceB = parseFloat(b.getAttribute('data-price'));
        
        switch(sortBy) {
            case 'price_low':
                return priceA - priceB;
            case 'price_high':
                return priceB - priceA;
            case 'newest':
            default:
                return 0; // Already sorted by newest in PHP
        }
    });
    
    // Re-append sorted products
    products.forEach(product => {
        container.appendChild(product);
    });
}

function openCart() {
    document.getElementById('cartSidebar').classList.add('open');
    document.getElementById('cartOverlay').classList.add('show');
}

function closeCart() {
    document.getElementById('cartSidebar').classList.remove('open');
    document.getElementById('cartOverlay').classList.remove('show');
}
</script>

<style>
/* Additional CSS for menu page */
.menu-header {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/images/hero/menu-bg.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    padding: 80px 0 40px;
    text-align: center;
}

.menu-header h1 {
    font-size: 3rem;
    margin-bottom: 15px;
}

.search-filter-bar {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    background: white;
    padding: 20px;
    border-radius: 10px;
    margin-top: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.search-box {
    display: flex;
    flex: 1;
    max-width: 400px;
}

.search-box input {
    flex: 1;
    padding: 12px 20px;
    border: 2px solid #e63946;
    border-right: none;
    border-radius: 5px 0 0 5px;
    font-size: 16px;
}

.search-box button {
    background: #e63946;
    color: white;
    border: none;
    padding: 0 25px;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 18px;
}

.filter-options {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.filter-options select {
    padding: 12px 20px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    background: white;
    cursor: pointer;
}

.category-filters {
    background: #f8f9fa;
    padding: 20px 0;
    border-bottom: 1px solid #eee;
}

.category-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
}

.category-tab {
    padding: 10px 25px;
    background: white;
    border: 2px solid #ddd;
    border-radius: 30px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
}

.category-tab.active,
.category-tab:hover {
    background: #e63946;
    color: white;
    border-color: #e63946;
}

.menu-products {
    padding: 60px 0;
}

.products-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.view-toggle {
    display: flex;
    gap: 10px;
}

.view-btn {
    width: 40px;
    height: 40px;
    border: 2px solid #ddd;
    background: white;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.view-btn.active {
    background: #e63946;
    color: white;
    border-color: #e63946;
}

.products-container.grid-view {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
}

.products-container.list-view .product-card {
    display: flex;
    gap: 20px;
}

.products-container.list-view .product-image {
    flex: 0 0 200px;
}

.product-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.badge {
    position: absolute;
    top: 10px;
    padding: 5px 15px;
    color: white;
    font-weight: bold;
    border-radius: 3px;
}

.badge.new {
    background: #2a9d8f;
    left: 10px;
}

.badge.discount {
    background: #e63946;
    right: 10px;
}

.product-details {
    padding: 20px;
}

.product-category {
    color: #e63946;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 5px;
}

.product-name {
    font-size: 20px;
    margin-bottom: 10px;
}

.product-description {
    color: #666;
    font-size: 14px;
    margin-bottom: 15px;
    line-height: 1.5;
}

.product-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    font-size: 14px;
    color: #666;
}

.rating .fa-star {
    color: #ddd;
    margin-right: 2px;
}

.rating .fa-star.filled {
    color: #ffc107;
}

.vendor {
    display: flex;
    align-items: center;
    gap: 5px;
}

.product-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #eee;
    padding-top: 15px;
}

.price .original-price {
    text-decoration: line-through;
    color: #999;
    margin-right: 10px;
    font-size: 14px;
}

.price .current-price {
    font-size: 22px;
    font-weight: bold;
    color: #e63946;
}

.product-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-quantity {
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    background: white;
    border-radius: 50%;
    cursor: pointer;
    font-weight: bold;
}

.quantity-input {
    width: 40px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px;
}

.btn-add-to-cart {
    background: #e63946;
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.load-more-container {
    text-align: center;
    margin-top: 50px;
}

.btn-load-more {
    background: white;
    color: #e63946;
    border: 2px solid #e63946;
    padding: 15px 40px;
    border-radius: 30px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-load-more:hover {
    background: #e63946;
    color: white;
}

/* Cart Sidebar */
.cart-sidebar {
    position: fixed;
    top: 0;
    right: -400px;
    width: 380px;
    height: 100vh;
    background: white;
    box-shadow: -5px 0 15px rgba(0,0,0,0.1);
    z-index: 1001;
    transition: right 0.3s ease;
    display: flex;
    flex-direction: column;
}

.cart-sidebar.open {
    right: 0;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
}

.close-cart {
    background: none;
    border: none;
    font-size: 28px;
    cursor: pointer;
    color: #666;
}

.cart-items {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
}

.empty-cart {
    text-align: center;
    padding: 40px 20px;
}

.empty-cart i {
    font-size: 60px;
    color: #ddd;
    margin-bottom: 20px;
}

.cart-item {
    display: flex;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.cart-item img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 5px;
}

.cart-item-details {
    flex: 1;
}

.cart-item-details h4 {
    margin-bottom: 5px;
}

.cart-item-price {
    color: #e63946;
    font-weight: bold;
    margin-bottom: 10px;
}

.cart-item-actions button {
    background: none;
    border: none;
    color: #666;
    cursor: pointer;
    font-size: 14px;
}

.cart-item-quantity {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.cart-summary {
    padding: 20px;
    border-top: 1px solid #eee;
    background: #f8f9fa;
}

.total-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.grand-total {
    font-size: 18px;
    font-weight: bold;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #ddd;
}

.cart-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 20px;
}

.btn-view-cart, .btn-checkout {
    padding: 12px;
    border-radius: 5px;
    font-weight: 600;
    cursor: pointer;
    border: none;
}

.btn-view-cart {
    background: white;
    color: #e63946;
    border: 2px solid #e63946;
}

.btn-checkout {
    background: #e63946;
    color: white;
}

.cart-floating {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #e63946;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    cursor: pointer;
    z-index: 1000;
    box-shadow: 0 5px 15px rgba(230, 57, 70, 0.4);
}

.cart-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background: white;
    color: #e63946;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    font-size: 14px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
}

.cart-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1000;
    display: none;
}

.cart-overlay.show {
    display: block;
}

.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #2a9d8f;
    color: white;
    padding: 15px 25px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
    z-index: 1002;
    transform: translateX(150%);
    transition: transform 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.notification.show {
    transform: translateX(0);
}

/* Special Offers */
.special-offers {
    background: #f8f9fa;
    padding: 60px 0;
}

.offers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.offer-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    position: relative;
}

.offer-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #e63946;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-weight: bold;
    z-index: 1;
}

.offer-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.offer-content {
    padding: 20px;
}

.offer-price {
    margin: 15px 0;
}

.old-price {
    text-decoration: line-through;
    color: #999;
    margin-right: 10px;
}

.new-price {
    font-size: 22px;
    font-weight: bold;
    color: #e63946;
}

.free-delivery, .deal-info {
    color: #2a9d8f;
    font-weight: 600;
    margin: 10px 0;
}

.btn-offer {
    width: 100%;
    padding: 12px;
    background: #e63946;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    margin-top: 10px;
}

/* Responsive Design */
@media (max-width: 992px) {
    .search-filter-bar {
        flex-direction: column;
        gap: 15px;
    }
    
    .search-box {
        max-width: 100%;
    }
    
    .filter-options {
        width: 100%;
        justify-content: center;
    }
    
    .cart-sidebar {
        width: 100%;
        right: -100%;
    }
    
    .products-container.grid-view {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
}

@media (max-width: 768px) {
    .menu-header h1 {
        font-size: 2.2rem;
    }
    
    .category-tabs {
        overflow-x: auto;
        justify-content: flex-start;
        padding-bottom: 10px;
    }
    
    .products-header {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }
    
    .products-container.grid-view {
        grid-template-columns: 1fr;
    }
    
    .offers-grid {
        grid-template-columns: 1fr;
    }
}
</style>

</body>
</html>
<?php include("includes/footer.php"); ?>
