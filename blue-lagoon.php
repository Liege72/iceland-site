<?php
    $pageTitle = "Blue Lagoon | Iceland";

    echo "<script>document.title = '".$pageTitle."';</script>";
    include("assets/inc/header.inc.php");
?>
        <div class="banner-image" id="blue-lagoon-banner-image">
            <span class="banner-image-text">Blue Lagoon</span>
        </div>
        <div class="info-section-wrapper">
            <img
                src="./assets/images/blueLagoon.png"
                class="page-image"
                id="blue-lagoon-image"
                alt="Image of The Blue Lagoon"
            />
            <span class="page-text" id="blue-lagoon-text">
                The Blue Lagoon is a geothermal spa with warm, mineral-rich
                waters. It is one of the most popular attractions in Iceland and
                an extraordinary destination to relax at. Some claim the water
                heals you and makes you look younger for longer. <br>
                <br>
                As you float in the soothing 38°C waters, the surrounding
                landscape of the otherworldly lava fields adds to the surreal
                experience. The lagoon also features a range of amenities
                including saunas, a steam room made of lava stone, and a variety
                of silica mud masks to enhance your spa experience. <br>
                <br>
                The Blue Lagoon is a testament to the country's geothermal
                wonders and has become a must-visit destination for travelers
                looking for both adventure and serenity.
            </span>
        </div>
<?php
    include("assets/inc/footer.inc.php");
?>
