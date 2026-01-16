<aside class="sidebar sidebar-vendor">
    <div class="sidebar-header">
        <h3>Vendor Panel</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="/Foodify/vendor/dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li><a href="/Foodify/vendor/products.php"><i class="fa-solid fa-boxes"></i> Products</a></li>
        <li><a href="/Foodify/vendor/orders.php"><i class="fa-solid fa-cart-flatbed"></i> Orders</a></li>
        <li><a href="/Foodify/vendor/profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
        <li><a href="/Foodify/vendor/reports.php"><i class="fa-solid fa-file-alt"></i> Reports</a></li>
        <li><a href="/Foodify/vendor/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
    </ul>
</aside>

<style>
.sidebar-vendor {
    width: 220px;
    background: #fdf4f2;
    border-right: 1px solid #ddd;
    height: 100vh;
    position: fixed;
    padding-top: 20px;
}

.sidebar-vendor .sidebar-header {
    text-align: center;
    margin-bottom: 20px;
}

.sidebar-vendor .sidebar-header h3 {
    font-size: 20px;
    color: #ff4d2d;
}

.sidebar-vendor .sidebar-menu {
    list-style: none;
    padding: 0;
}

.sidebar-vendor .sidebar-menu li {
    margin: 10px 0;
}

.sidebar-vendor .sidebar-menu li a {
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 15px;
    border-radius: 6px;
    transition: 0.3s;
}

.sidebar-vendor .sidebar-menu li a:hover {
    background: #ff4d2d;
    color: #fff;
}

.sidebar-vendor .sidebar-menu li a i {
    width: 20px;
    text-align: center;
}
</style>
