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
            overlay.style.opacity = navbarMenu.classList.contains(
                "is-active") ? "1" : "0"; // Hiển thị hoặc ẩn overlay
            menuLogo.style.display = navbarMenu.classList.contains(
                    "is-active") ? "block" :
                "none"; // Hiển thị hoặc ẩn logo
            // Disable or enable scrolling based on menu state
            if (navbarMenu.classList.contains("is-active")) {
                document.body.style.overflow =
                    "hidden"; // Disable scrolling
            } else {
                document.body.style.overflow =
                    "auto"; // Enable scrolling
            }
        });
    }
    // Close Navbar Menu on Click Menu Links
    document.querySelectorAll(".menu-link").forEach((link) => {
        link.addEventListener("click", () => {
            burgerMenu.classList.remove("is-active");
            navbarMenu.classList.remove("is-active");
            overlay.style.opacity =
                "0"; // Ẩn overlay khi đóng menu
            menuLogo.style.display =
                "none"; // Ẩn logo khi đóng menu
            // Enable scrolling when the menu is closed
            document.body.style.overflow =
                "auto"; // Enable scrolling
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
                overlay.style.opacity =
                    "0"; // Ẩn overlay khi đóng menu trên resize
                menuLogo.style.display =
                    "none"; // Ẩn logo khi đóng menu trên resize
                document.body.style.overflow =
                    "auto"; // Enable scrolling
            }
        }
    });
</script>

<script src="{{ asset('asset/js/code.jquery.com_jquery-3.3.1.slim.min.js')}}">
</script>
<script src="{{ asset('asset/js/jsdelivr.net_npm_bootstrap@4.3.1_dist_js_bootstrap.min.js')}}">
</script>
<script src="{{ asset('asset/js/code.jquery.com_jquery-3.3.1.slim.min.js')}}">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<script>
    const host = "https://provinces.open-api.vn/api/";

    var city1 = "";
    var district1 = "";
    var ward1 = "";

    var city2 = "";
    var district2 = "";
    var ward2 = "";

    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "city1");
                renderData(response.data, "city2");
            });
    };

    callAPI('https://provinces.open-api.vn/api/?depth=1');

    var callApiDistrict = (api, select) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, select);
            });
    };

    var callApiWard = (api, select) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, select);
            });
    };

    var renderData = (array, select) => {
        let row = ' <option disable value="">Chọn</option>';
        array.forEach(element => {
            row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    };

    $("#city1").change(() => {
        city1 = $("#city1").find(':selected').text();
        callApiDistrict(host + "p/" + $("#city1").find(':selected').data('id') + "?depth=2", "district1");
    });

    $("#district1").change(() => {
        district1 = $("#district1").find(':selected').text();
        callApiWard(host + "d/" + $("#district1").find(':selected').data('id') + "?depth=2", "ward1");
    });

    $("#ward1").change(() => {
        ward1 = $("#ward1").find(':selected').text();
        printResult();
    });

    $("#city2").change(() => {
        city2 = $("#city2").find(':selected').text();
        callApiDistrict(host + "p/" + $("#city2").find(':selected').data('id') + "?depth=2", "district2");
    });

    $("#district2").change(() => {
        district2 = $("#district2").find(':selected').text();
        callApiWard(host + "d/" + $("#district2").find(':selected').data('id') + "?depth=2", "ward2");
    });

    $("#ward2").change(() => {
        ward2 = $("#ward2").find(':selected').text();
        printResult();
    });

    var printResult = () => {
        let result1 = city1 + " | " + district1 + " | " + ward1;
        let result2 = city2 + " | " + district2 + " | " + ward2;


    };


    
    


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/localforage/1.9.0/localforage.min.js"></script>

<script>




// Khởi tạo biến toàn cục
let coordinatesXCounter = 1;
let coordinatesYCounter = 1;
let coordinatesElement = document.querySelector("#coordinates");
let addCoordinatesButton = document.querySelector("#add-coordinates");
let coordinatesData = [];

// Lấy dữ liệu đã lưu trong Local Storage (nếu có)
if (localStorage.getItem("coordinatesData")) {
    coordinatesData = JSON.parse(localStorage.getItem("coordinatesData"));
    coordinatesData.forEach((data, index) => {
        createCoordinatesInput(data.x, data.y, index);
    });
}

addCoordinatesButton.addEventListener("click", function () {
    createCoordinatesInput("", "", coordinatesData.length);
    coordinatesData.push({ x: "", y: "" });
    localStorage.setItem("coordinatesData", JSON.stringify(coordinatesData));
    coordinatesXCounter++;
});

function createCoordinatesInput(xValue, yValue, index) {
    const formGroupElement = document.createElement("div");
    formGroupElement.setAttribute("class", "form-group");

    const rowElement = document.createElement("div");
    rowElement.setAttribute("class", "row");

    const colXElement = document.createElement("div");
    colXElement.setAttribute("class", "col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3");

    const labelXElement = document.createElement("label");
    labelXElement.setAttribute("for", `coordinatesX${index}`);
    labelXElement.setAttribute("class", "mb-2");
    labelXElement.innerText = `Vị trí Tọa độ X${coordinatesXCounter}`;

    const inputXElement = document.createElement("input");
    inputXElement.setAttribute("type", "text");
    inputXElement.setAttribute("class", "form-control");
    inputXElement.setAttribute("name", `coordinatesX[]`);
    inputXElement.setAttribute("id", `coordinatesX${index}`);
    inputXElement.value = xValue;

    const colYElement = document.createElement("div");
    colYElement.setAttribute("class", "col-xs-12 col-md-12 col-lg-6 col-xl-6 pt-3 p-3");

    const labelYElement = document.createElement("label");
    labelYElement.setAttribute("for", `coordinatesY${index}`);
    labelYElement.setAttribute("class", "mb-2");
    labelYElement.innerText = `Vị trí Tọa độ Y${coordinatesXCounter}`;

    const inputYElement = document.createElement("input");
    inputYElement.setAttribute("type", "text");
    inputYElement.setAttribute("class", "form-control");
    inputYElement.setAttribute("name", `coordinatesY[]`);
    inputYElement.setAttribute("id", `coordinatesY${index}`);
    inputYElement.value = yValue;

    const removeButtonElement = document.createElement("button");
    removeButtonElement.setAttribute("type", "button");
    removeButtonElement.setAttribute("class", "btn btn-danger mt-3");
    removeButtonElement.innerText = "Xóa";

    colXElement.appendChild(labelXElement);
    colXElement.appendChild(inputXElement);
    colYElement.appendChild(labelYElement);
    colYElement.appendChild(inputYElement);
    colYElement.appendChild(removeButtonElement);
    rowElement.appendChild(colXElement);
    rowElement.appendChild(colYElement);
    formGroupElement.appendChild(rowElement);
    coordinatesElement.appendChild(formGroupElement);

    removeButtonElement.addEventListener("click", function () {
        coordinatesData.splice(index, 1);
        localStorage.setItem("coordinatesData", JSON.stringify(coordinatesData));
        formGroupElement.remove();
    });

    inputXElement.addEventListener("input", function () {
        coordinatesData[index].x = inputXElement.value;
        localStorage.setItem("coordinatesData", JSON.stringify(coordinatesData));
    });

    inputYElement.addEventListener("input", function () {
        coordinatesData[index].y = inputYElement.value;
        localStorage.setItem("coordinatesData", JSON.stringify(coordinatesData));
    });
}


</script>

</html>