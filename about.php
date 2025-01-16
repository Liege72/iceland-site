<?php
    $pageTitle = "About | Iceland";

    echo "<script>document.title = '".$pageTitle."';</script>";

    include("./assets/inc/header.inc.php")
?>

<main id="about-page">
    <h1>About page</h1>
    <h3>My DHTML + JavaScript Element</h3>
    <p>
        My DHTML + JavaScript element is a toggle slider to switch beetwen <em>cozy</em> and <em>compact</em>
        modes for the comment section. I created both icons in Figma and wrote the JavaScript and CSS to toggle between
        the two modes. The slider is two radio buttons, each with their icons respective to the mode they are 
        toggling to. When toggled, the current slider selection will move across the element to the other side, in a
        very smooth transition. You can view the element below and use it on the <a href="./comments.php">comments page</a>.
    </p>
    <br><br>
    <div class="mode-slider">
        <input type="radio" id="compact-switch" name="mode-slider" onclick="toggleMode()" checked>
        <label for="compact-switch"><img src="./assets/images/compact.svg" alt="compact switch" id="compact-switch-img"></label>
        <input type="radio" id="cozy-switch" name="mode-slider" onclick="toggleMode()" checked>
        <label for="cozy-switch"><img src="./assets/images/cozy.svg" alt="cozy switch" id="cozy-switch-img"></label>
        <span class="mode-slider-background"></span>
    </div>
    <hr>
    <h3>Extra element 1</h3>
    <p>
        My first extra element is a like button on comments on the <a href="./comments.php">comments page</a>.
        When clicked, the like button will change from an empty heart to a filled heart, and the like count will
        increase by one. The update is then stored in the database.
    </p>
    <hr>
    <h3>Extra element 2</h3>
    <p>
        My second extra element is a random color generator for the user icons on the comments on the 
        <a href="./comments.php">comments page</a>. When the page is loaded, the user icons will be assigned a random
        color from a predefined list of colors. This is done using JavaScript.
    </p>
    <hr>
    <h3>Extra element 3</h3>
    <p>
        For my third extra element, I created a weather page that displays the current weather in three different cities 
        in Iceland. I called from a public API found <a href="https://open-meteo.com/en/docs">here</a>. You can view the
        weather page <a href="./weather.php">here</a>.
    </p>
    <hr>
</main>

<?php
    include("./assets/inc/footer.inc.php")
?>