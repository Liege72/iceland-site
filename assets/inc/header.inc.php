<?php
    $location = 'index';

    // special style cases
    if (strpos($_SERVER['SCRIPT_NAME'], 'comments')) {
        $location = 'comments';
    } else if (strpos($_SERVER['SCRIPT_NAME'], 'about')) {
        $location = 'about';
    }
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <link rel="icon" type="image/png" href="./assets/images/favicon.png" />

            <link rel="stylesheet" href="./assets/styles/imageStyles.css" />
            <link rel="stylesheet" href="./assets/styles/global.css" />

            <!-- special style cases -->
            <?php
                if ($location == "comments" || $location == "about") {
                    ?>
                    <link rel="stylesheet" href="./assets/styles/comments.css" />
                    <?php
                }
            ?>

            <script src="./assets/scripts/navbar.js" defer></script>
            <script src="./assets/scripts/miscTools.js"></script>
            <script src="./assets/scripts/validateForm.js"></script>
            <script src="./assets/scripts/eventListeners.js"></script>
        </head>
        
        <body>
        <nav id="navbar">
            <ul id="navbar-list">
                <li id="home"><a href="./index.php">Home</a></li>
                <li id="learn">
                    <span>Learn</span>
                    <div class="dropdown" id="learn-dropdown">
                        <a href="./waterfalls.php">Waterfalls</a>
                        <a href="./northern-lights.php">Northern Lights</a>
                        <a href="./geography.php">Geography</a>
                        <a href="./culture.php">Culture</a>
                    </div>
                </li>
                <li id="visit">
                    <span>Visit</span>
                    <div class="dropdown" id="visit-dropdown">
                        <a href="./destinations.php">Destinations</a>
                        <a href="./what-to-bring.php">What to bring</a>
                    </div>
                </li>
                <li id="references">
                    <a href="./references.php">References</a>
                </li>
            </ul>
            <img
                src="./assets/images/hamburger.svg"
                onclick="openNav();"
                id="hamburger"
                alt="hamburger icon"
            />
            <img src="./assets/images/x.svg" onclick="closeNav();" id="x" alt="x icon"/>
        </nav>