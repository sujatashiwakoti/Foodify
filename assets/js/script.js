document.addEventListener("DOMContentLoaded", () => {

    // Navigation active link
    const navLinks = document.querySelectorAll(".nav-links a");
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add("active");
        }
    });

    // Hero buttons (scroll or alert)
    const heroButtons = document.querySelectorAll(".hero-buttons a");
    heroButtons.forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = btn.getAttribute("href").replace("#", "");
            const target = document.getElementById(targetId);
            if (target) {
                target.scrollIntoView({ behavior: "smooth" });
            } else {
                alert("Feature coming soon!");
            }
        });
    });

    // Toggle mobile navbar
    const navToggle = document.querySelector(".nav-toggle");
    const navbar = document.querySelector(".nav-links");
    if (navToggle && navbar) {
        navToggle.addEventListener("click", () => {
            navbar.classList.toggle("active");
        });
    }

});
