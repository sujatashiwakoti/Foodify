document.addEventListener("DOMContentLoaded", () => {

    // Sidebar toggle
    const sidebarToggle = document.querySelector(".sidebar-toggle");
    const sidebar = document.querySelector(".sidebar");
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("collapsed");
        });
    }

    // Highlight active link in sidebar
    const sidebarLinks = document.querySelectorAll(".sidebar a");
    sidebarLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add("active");
        }
    });

    // CUSTOMER DASHBOARD
    const customerDashboard = document.getElementById("customer-dashboard");
    if (customerDashboard) {
        const ordersCount = document.getElementById("orders-count");
        const totalSpent = document.getElementById("total-spent");
        const totalItems = document.getElementById("total-items");

        let orders = JSON.parse(localStorage.getItem("customerOrders")) || [];
        let totalQuantity = orders.reduce((acc, o) => acc + o.quantity, 0);
        let totalAmount = orders.reduce((acc, o) => acc + o.price * o.quantity, 0);

        if (ordersCount) ordersCount.textContent = orders.length;
        if (totalItems) totalItems.textContent = totalQuantity;
        if (totalSpent) totalSpent.textContent = `₹${totalAmount.toFixed(2)}`;
    }

    // VENDOR DASHBOARD
    const vendorDashboard = document.getElementById("vendor-dashboard");
    if (vendorDashboard) {
        const productsList = document.getElementById("vendor-products");
        let products = JSON.parse(localStorage.getItem("vendorProducts")) || [];

        if (productsList) {
            productsList.innerHTML = "";
            if (products.length === 0) {
                productsList.innerHTML = "<li>No products yet.</li>";
            } else {
                products.forEach(prod => {
                    productsList.innerHTML += `<li>${prod.name} - ₹${prod.price.toFixed(2)}</li>`;
                });
            }
        }
    }

    // ADMIN DASHBOARD
    const adminDashboard = document.getElementById("admin-dashboard");
    if (adminDashboard) {
        const allOrders = JSON.parse(localStorage.getItem("allOrders")) || [];
        const adminOrdersTable = document.getElementById("admin-orders-table");

        if (adminOrdersTable) {
            adminOrdersTable.innerHTML = "";
            if (allOrders.length === 0) {
                adminOrdersTable.innerHTML = "<tr><td colspan='6'>No orders yet.</td></tr>";
            } else {
                allOrders.forEach((order, i) => {
                    adminOrdersTable.innerHTML += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${order.customer}</td>
                            <td>${order.product}</td>
                            <td>₹${order.price.toFixed(2)}</td>
                            <td>${order.quantity}</td>
                            <td>${order.status || "Pending"}</td>
                        </tr>
                    `;
                });
            }
        }
    }

});
