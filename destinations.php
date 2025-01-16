<?php
    $pageTitle = "Destinations | Iceland";

    echo "<script>document.title = '".$pageTitle."';</script>";
    include("assets/inc/header.inc.php");
?>
        <div class="banner-image" id="destinations-banner-image">
            <span class="banner-image-text">Destinations</span>
        </div>
        <div class="section-wrapper">
            <div
                onclick="location.href='./glacier-lagoon.php'"
                class="section-card"
            >
                <img class="section-card-img" src="./assets/images/glacierLagoon.png" />
                <span class="card-title">Jökulsárlón Glacier Lagoon </span>
                <span class="above-button-text">
                    The glacier lagoon is one of the most surreal sights in
                    Iceland. Enormous icebergs float in...
                </span>
                <div class="card-button">
                    <span class="learn-more-text">Learn more</span>
                    <img src="./assets/images/arrow.svg" />
                </div>
            </div>
            <div
                onclick="location.href='./blue-lagoon.php'"
                class="section-card"
            >
                <img class="section-card-img" src="./assets/images/blueLagoon.png" />
                <span class="card-title">Blue Lagoon</span>
                <span class="above-button-text">
                    The Blue Lagoon is a geothermal spa with warm, mineral-rich
                    waters. It is one of the most...
                </span>
                <div class="card-button">
                    <span class="learn-more-text">Learn more</span>
                    <img src="./assets/images/arrow.svg" />
                </div>
            </div>
            <div
                onclick="location.href='./seljalandsfoss.php'"
                class="section-card"
            >
                <img class="section-card-img" src="./assets/images/waterfall.png" />
                <span class="card-title">Seljalandsfoss</span>
                <span class="above-button-text">
                    Located in Southern Iceland, this 60 meter high waterfall
                    allows visitors to walk behind it...
                </span>
                <div class="card-button">
                    <span class="learn-more-text">Learn more</span>
                    <img src="./assets/images/arrow.svg" />
                </div>
            </div>
        </div>
        <div id="map-wrapper">
            <img src="./assets/images/map.png" />
        </div>
<?php
    include("assets/inc/header.inc.php");
?>