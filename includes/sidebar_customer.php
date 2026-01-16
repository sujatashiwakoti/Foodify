<aside class="sidebar sidebar-customer">
    <div class="sidebar-header">
        <h3>Customer Panel</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="/Foodify/customer/dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li><a href="/Foodify/customer/orders.php"><i class="fa-solid fa-box"></i> Orders</a></li>
        <li><a href="/Foodify/customer/cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
        <li><a href="/Foodify/customer/profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
        <li><a href="/Foodify/customer/reports.php"><i class="fa-solid fa-file-alt"></i> Reports</a></li>
        <li><a href="/Foodify/customer/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
    </ul>
</aside>

<style>
.sidebar-customer {
    width: 220px;
    background: #fff6f4;
    border-right: 1px solid #ddd;
    height: 100vh;
    position: fixed;
    padding-top: 20px;
}

.sidebar-customer .sidebar-header {
    text-align: center;
    margin-bottom: 20px;
}

.sidebar-customer .sidebar-header h3 {
    font-size: 20px;
    color: #a51a0d;
}

.sidebar-customer .sidebar-menu {
    list-style: none;
    padding: 0;
}

.sidebar-customer .sidebar-menu li {
    margin: 10px 0;
}

.sidebar-customer .sidebar-menu li a {
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 15px;
    border-radius: 6px;
    transition: 0.3s;
}

.sidebar-customer .sidebar-menu li a:hover {
    background: #a51a0d;
    color: #fff;
}

.sidebar-customer .sidebar-menu li a i {
    width: 20px;
    text-align: center;
}
</style>
