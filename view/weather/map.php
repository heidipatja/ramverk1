<?php

namespace Anax\View;

/**
 * OpenStreetMap view with leaflet
 */

?>

<?php if ($longitude && $latitude) : ?>
    <h3>Karta</h3>

    <div id="map">
    </div>

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css">
    <script src='https://unpkg.com/leaflet@1.3.3/dist/leaflet.js'></script>
    <script type="text/javascript">

    var longitude = <?= $longitude ?>;
    var latitude = <?= $latitude ?>;

    var map = L.map('map').setView([latitude, longitude], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([latitude, longitude]).addTo(map)
        .openPopup();
    </script>
<?php elseif (!$longitude && !$latitude && !$empty) : ?>
    <h3>Karta</h3>
    <div>
        <p>Kunde inte hitta någon karta för platsen.</p>
    </div>
<?php endif; ?>
