<?php
    $pageTitle = "Home | Iceland";

    echo "<script>document.title = '".$pageTitle."';</script>";
    include("assets/inc/header.inc.php");
?>
        <div id="landing">
            <div class="landing-image" id="home-image-top"></div>
            <div class="landing-image" id="home-image-center"></div>
            <div class="landing-image" id="home-image-bottom"></div>
            <div id="home-image-text">
                <span class="home-overlay-large" id="iceland-text"
                    >Iceland.</span
                >
                <!-- <span class="home-overlay-small"
                    >The land of fire and ice.</span
                > -->
            </div>
        </div>
        <div class="section-wrapper">
            <div
                onclick="location.href='./destinations.php'"
                class="section-card"
            >
                <img class="section-card-img" src="./assets/images/waterfall.png" alt="Image of the Seljalandsfoss waterfall in Iceland"/>
                <span class="card-title">Destinations</span>
                <div class="card-bottom">
                    <span>See Iceland's top tourist attractions.</span>
                    <img src="./assets/images/arrow.svg" alt="arrow icon"/>
                </div>
            </div>
            <div
                onclick="location.href='./what-to-bring.php'"
                class="section-card"
            >
                <img class="section-card-img" src="./assets/images/hiking.png" alt="Person hiking with a backpack"/>
                <span class="card-title">What to bring</span>
                <div class="card-bottom">
                    <span>What you should bring for your trip.</span>
                    <img src="./assets/images/arrow.svg" alt="arrow icon"/>
                </div>
            </div>
            <div
                onclick="location.href='./geography.php'"
                class="section-card"
            >
                <img class="section-card-img" src="./assets/images/geography2.png" alt="Image showing Icelandic geography"/>
                <span class="card-title">Geography</span>
                <div class="card-bottom">
                    <span>Learn about Iceland's geography.</span>
                    <img src="./assets/images/arrow.svg" alt="arrow icon"/>
         
                </div>
            </div>
        </div>
        <div class="landing-image" id="home-image-1">
            <span class="home-overlay-large">Breathtaking views.</span>
        </div>
<?php
    include("assets/inc/footer.inc.php");
?>