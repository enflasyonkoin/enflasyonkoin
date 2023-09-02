function toggleMenu() {
    var menuContainer = document.getElementById("menuContainer");
    var overlay = document.getElementById("overlay");

    if (menuContainer.classList.contains("active")) {
        menuContainer.classList.remove("active");
        overlay.style.display = "none";
    } else {
        menuContainer.classList.add("active");
        overlay.style.display = "block";
    }
} oldumuu