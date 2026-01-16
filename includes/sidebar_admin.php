<aside class="sidebar sidebar-admin">
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="/Foodify/admin/dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li><a href="/Foodify/admin/customers.php"><i class="fa-solid fa-users"></i> Customers</a></li>
        <li><a href="/Foodify/admin/vendors.php"><i class="fa-solid fa-store"></i> Vendors</a></li>
        <li><a href="/Foodify/admin/products.php"><i class="fa-solid fa-boxes"></i> Products</a></li>
        <li><a href="/Foodify/admin/orders.php"><i class="fa-solid fa-cart-flatbed"></i> Orders</a></li>
        <li><a href="/Foodify/admin/reports.php"><i class="fa-solid fa-file-alt"></i> Reports</a></li>
        <li><a href="/Foodify/admin/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
    </ul>
</aside>

<style>
.sidebar-admin {
    width: 220px;
    background: #fff;
    border-right: 1px solid #ddd;
    height: 100vh;
    position: fixed;
    padding-top: 20px;
}

.sidebar-admin .sidebar-header {
    text-align: center;
    margin-bottom: 20px;
}

.sidebar-admin .sidebar-header h3 {
    font-size: 20px;
    color: #38332C;
}

.sidebar-admin .sidebar-menu {
    list-style: none;
    padding: 0;
}

.sidebar-admin .sidebar-menu li {
    margin: 10px 0;
}

.sidebar-admin .sidebar-menu li a {
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 15px;
    border-radius: 6px;
    transition: 0.3s;
}

.sidebar-admin .sidebar-menu li a:hover {
    background: #38332C;
    color: #fff;
}

.sidebar-admin .sidebar-menu li a i {
    width: 20px;
    text-align: center;
}
</style>
