<?php 
    $pageTitle = "Weather | Iceland";

    echo "<script>document.title = '".$pageTitle."';</script>";

    include("./assets/inc/header.inc.php")
?>

<main id="weather-page">
    <h2>Current weather in Iceland</h2>
    <div class="weather-item">
        <h3>Reykjavik</h3>
        <div class="weather-data">
            <div class="titles">
                <b>Tempature:&nbsp;</b>
                <b>Visibility:&nbsp;</b>
                <b>Wind Speed:&nbsp;</b>
                <b>UV Index:&nbsp;</b>
            </div>
            <div class="values">
                <span id="reykjavik-temp">...</span>
                <span id="reykjavik-visibility">...</span>
                <span id="reykjavik-wind">...</span>
                <span id="reykjavik-uvindex">...</span>
            </div>
        </div>
    </div>
    <div class="weather-item">
        <h3>Akureyri</h3>
        <div class="weather-data">
            <div class="titles">
                <b>Tempature:&nbsp;</b>
                <b>Visibility:&nbsp;</b>
                <b>Wind Speed:&nbsp;</b>
                <b>UV Index:&nbsp;</b>
            </div>
            <div class="values">
                <span id="akureyri-temp">...</span>
                <span id="akureyri-visibility">...</span>
                <span id="akureyri-wind">...</span>
                <span id="akureyri-uvindex">...</span>
            </div>
        </div>
    </div>
    <div class="weather-item">
        <h3>Húsavík</h3>
        <div class="weather-data">
            <div class="titles">
                <b>Tempature:&nbsp;</b>
                <b>Visibility:&nbsp;</b>
                <b>Wind Speed:&nbsp;</b>
                <b>UV Index:&nbsp;</b>
            </div>
            <div class="values">
                <span id="husavik-temp">...</span>
                <span id="husavik-visibility">...</span>
                <span id="husavik-wind">...</span>
                <span id="husavik-uvindex">...</span>
            </div>
        </div>
    </div>
    <script>
        reykjavik = "https://api.open-meteo.com/v1/forecast?latitude=64.1355&longitude=-21.8954&hourly=temperature_2m,visibility,wind_speed_10m,uv_index&forecast_days=3";
        akureyri = "https://api.open-meteo.com/v1/forecast?latitude=65.6835&longitude=-18.0878&hourly=temperature_2m,visibility,wind_speed_10m,uv_index&forecast_days=3";
        husavik = "https://api.open-meteo.com/v1/forecast?latitude=61.8076&longitude=-6.6709&hourly=temperature_2m,visibility,wind_speed_10m,uv_index&forecast_days=3";

        getCurrentWeather(reykjavik, "reykjavik");
        getCurrentWeather(akureyri, "akureyri");
        getCurrentWeather(husavik, "husavik");
    </script>
</main>

<?php
    include("./assets/inc/footer.inc.php");
?>