document.addEventListener("DOMContentLoaded", () => {
    const cartContainer = document.getElementById("cart-items");
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    function renderCart() {
        if (!cartContainer) return;
        cartContainer.innerHTML = "";
        if (cart.length === 0) {
            cartContainer.innerHTML = "<p>Your cart is empty.</p>";
            return;
        }
        cart.forEach((item, i) => {
            cartContainer.innerHTML += `
                <div class="cart-item">
                    <span>${item.name}</span>
                    <span>₹${item.price.toFixed(2)}</span>
                    <input type="number" value="${item.quantity}" min="1" data-index="${i}" class="quantity-input" />
                    <button data-index="${i}" class="remove-btn">Remove</button>
                </div>
            `;
        });
    }

    renderCart();

    // Update quantity
    cartContainer?.addEventListener("change", e => {
        if (e.target.classList.contains("quantity-input")) {
            const index = e.target.dataset.index;
            cart[index].quantity = parseInt(e.target.value);
            localStorage.setItem("cart", JSON.stringify(cart));
            renderCart();
        }
    });

    // Remove item
    cartContainer?.addEventListener("click", e => {
        if (e.target.classList.contains("remove-btn")) {
            const index = e.target.dataset.index;
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            renderCart();
        }
    });

    // Add to cart buttons on product page
    const addButtons = document.querySelectorAll(".add-to-cart");
    addButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            const product = {
                name: btn.dataset.name,
                price: parseFloat(btn.dataset.price),
                quantity: 1
            };
            cart.push(product);
            localStorage.setItem("cart", JSON.stringify(cart));
            alert(`${product.name} added to cart`);
        });
    });
});
