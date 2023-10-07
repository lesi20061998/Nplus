<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.layout.head')
</head>

<body>
    @include('client.layout.header')
    @yield('content')
    @include('client.layout.footer')
</body>
<script>
    const navbarMenu = document.getElementById("menu");
    const burgerMenu = document.getElementById("burger");
    const headerMenu = document.getElementById("header");
    const overlay = document.querySelector(".overlay");
    const menuLogo = document.querySelector(".menu-logo");

    // Open Close Navbar Menu on Click Burger
    if (burgerMenu && navbarMenu) {
        burgerMenu.addEventListener("click", () => {
            burgerMenu.classList.toggle("is-active");
            navbarMenu.classList.toggle("is-active");
            overlay.style.opacity = navbarMenu.classList.contains("is-active") ? "1" : "0"; // Hiển thị hoặc ẩn overlay
            menuLogo.style.display = navbarMenu.classList.contains("is-active") ? "block" : "none"; // Hiển thị hoặc ẩn logo

            // Disable or enable scrolling based on menu state
            if (navbarMenu.classList.contains("is-active")) {
                document.body.style.overflow = "hidden"; // Disable scrolling
            } else {
                document.body.style.overflow = "auto"; // Enable scrolling
            }
        });
    }

    // Close Navbar Menu on Click Menu Links
    document.querySelectorAll(".menu-link").forEach((link) => {
        link.addEventListener("click", () => {
            burgerMenu.classList.remove("is-active");
            navbarMenu.classList.remove("is-active");
            overlay.style.opacity = "0"; // Ẩn overlay khi đóng menu
            menuLogo.style.display = "none"; // Ẩn logo khi đóng menu

            // Enable scrolling when the menu is closed
            document.body.style.overflow = "auto"; // Enable scrolling
        });
    });

    // Change Header Background on Scrolling
    window.addEventListener("scroll", () => {
        if (!navbarMenu.classList.contains("is-active")) {
            if (this.scrollY >= 85) {
                headerMenu.classList.add("on-scroll");
            } else {
                headerMenu.classList.remove("on-scroll");
            }
        }
    });

    // Fixed Navbar Menu on Window Resize
    window.addEventListener("resize", () => {
        if (window.innerWidth > 768) {
            if (navbarMenu.classList.contains("is-active")) {
                navbarMenu.classList.remove("is-active");
                overlay.style.opacity = "0"; // Ẩn overlay khi đóng menu trên resize
                menuLogo.style.display = "none"; // Ẩn logo khi đóng menu trên resize

                // Enable scrolling when the menu is closed on window resize
                document.body.style.overflow = "auto"; // Enable scrolling
            }
        }
    });
</script>

<script src="{{ asset('asset/js/code.jquery.com_jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{ asset('asset/js/jsdelivr.net_npm_bootstrap@4.3.1_dist_js_bootstrap.min.js')}}"></script>
<script src="{{ asset('asset/js/code.jquery.com_jquery-3.3.1.slim.min.js')}}"></script>

</html>