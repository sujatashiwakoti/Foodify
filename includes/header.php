<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodify</title>
    <link rel="stylesheet" href="/Foodify/assets/css/style.css">
    <link rel="stylesheet" href="/Foodify/assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="/Foodify/assets/js/script.js" defer></script>
</head>
<body class="newari-pattern">

<header class="main-header">
    <div class="navbar">

        <!-- Logo -->
        <div class="logo">
            <a href="/Foodify/index.php"><img src="/Foodify/assets/images/logo/logo.png" alt="Foodify Logo"></a>
        </div>

        <!-- Navigation Links -->
        <nav class="nav-links">
            <a href="/Foodify/index.php" class="active">Home</a>
            <a href="/Foodify/products/list.php">Products</a>
            <a href="/Foodify/about.php">About</a>
            <a href="/Foodify/contact.php">Contact</a>
        </nav>

        <!-- SEARCH BAR -->
        <div class="nav-search">
            <form action="/Foodify/products/list.php" method="get">
                <input type="text" name="q" placeholder="Search products..." />
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <!-- Right Actions -->
        <div class="nav-actions">
            <a href="/Foodify/customer/login.php" class="btn-outline">Login</a>
            <a href="/Foodify/customer/register.php" class="btn-solid">Register</a>

            <a href="/Foodify/customer/cart.php" class="cart-icon">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="cart-count">0</span>
            </a>
        </div>

    </div>
</header>
