// it was either this, inline styles, or another css file; I chose this because
// I thought of our "multiple CSS files" conversation in class and the validator
// yelled at me for having inline styles!

document.addEventListener("DOMContentLoaded", function() {
    let pageTitle = document.title;
    if (pageTitle.startsWith("About") || pageTitle.startsWith("Comments") 
        || pageTitle.startsWith("Grading") || pageTitle.startsWith("References")
        || pageTitle.startsWith("Weather")) {
        let nav = document.getElementsByTagName("nav")[0];
        nav.style.backgroundImage = "none";

        let navLinks = nav.getElementsByTagName("a");
        for (let i = 0; i < navLinks.length; i++) {
            navLinks[i].style.color = "black";
        }

        let navLis = nav.getElementsByTagName("li");
        for (let i = 0; i < navLis.length; i++) {
            navLis[i].style.color = "black";
        }
    }
});