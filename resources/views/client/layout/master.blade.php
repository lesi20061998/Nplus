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
                document.body.style.overflow = "auto"; // Enable scrolling
            }
        }
    });
</script>


<script src="{{ asset('asset/js/code.jquery.com_jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{ asset('asset/js/jsdelivr.net_npm_bootstrap@4.3.1_dist_js_bootstrap.min.js')}}"></script>
<script src="{{ asset('asset/js/code.jquery.com_jquery-3.3.1.slim.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "province , province2");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district, district2");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward , ward2");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">chọn</option>';
        array.forEach(element => {
            row += `<option value="${element.code}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#province ").change(() => {
        callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
        printResult();
    });
    $("#district ,#district1").change(() => {
        callApiWard(host + "d/" + $("#district").val() + "?depth=2");
        printResult();
    });
    $("#ward").change(() => {
        printResult();
    })

    var printResult = () => {
        if ($("#district").val() != "" && $("#province").val() != "" &&
            $("#ward").val() != "") {
            let result = $("#province option:selected").text() +
                " | " + $("#district option:selected").text() + " | " +
                $("#ward option:selected").text();
            $("#result").text(result)
        }

    }
    $("#additional-1").change(() => {
        printResult();
    });
</script>


</html>