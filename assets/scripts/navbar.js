/**
 * Opens navbar with the use of the hamburger icon; mobile view only
 */
function openNav() {
    let nav = document.getElementById("navbar-list");
    let hamburger = document.getElementById("hamburger");
    let x = document.getElementById("x");

    nav.style.display = "flex";
    hamburger.style.display = "none";
    x.style.display = "flex";
}

/**
 * Closes navbar with the use of the x icon; mobile view only
 */
function closeNav() {
    let nav = document.getElementById("navbar-list");
    let hamburger = document.getElementById("hamburger");
    let x = document.getElementById("x");

    nav.style.display = "none";
    hamburger.style.display = "flex";
    x.style.display = "none";
}

/**
 * Ensures mobile styles are not left over if resized to desktop view
 */
window.addEventListener("resize", function() {
    if (window.innerWidth > 800) {
        let nav = document.getElementById("navbar-list");
        let hamburger = document.getElementById("hamburger");
        let x = document.getElementById("x");

        nav.style.display = "flex";
        hamburger.style.display = "none";
        x.style.display = "none";
    }
});

/**
 * Ensures mobile styles are not left over if resized to desktop view
 */
window.addEventListener("resize", function() {
    if (window.innerWidth < 800) {
        let nav = document.getElementById("navbar-list");
        let hamburger = document.getElementById("hamburger");
        let x = document.getElementById("x");

        nav.style.display = "none";
        hamburger.style.display = "flex";
        x.style.display = "none";
    }
});