<?php

namespace Anax\View;

/**
 * Weather API
 */

?>


<h1>API</h1>

<h2>Väder och karta</h2>

<p class="ingress">Med hjälp av API:t kan du hämta väder och karta baserat på ip-nummer. Du kan välja mellan föregående eller kommande fem dagar. Svaret returneras som JSON.</p>

<h3>Exempel</h3>

<p>GET /weather-json?location=asdf&type=future</p>

<pre>
    {
        "status": 400,
        "message": "Hittade inget resultat."
    }
</pre>

<p>GET /weather-json?location=8.8.8.8&type=past</p>

<p>GET /weather-json?location=8.8.8.8&type=future</p>

<pre>
    {
        "location": "8.8.8.8",
        "longitude": -122.074310302734375,
        "latitude": 37.388019561767578125,
        "weather": [
            {
                "date": "17/11",
                "temp": 14,
                "wind": 2,
                "desc": "klar himmel",
                "icon": "http://openweathermap.org/img/wn/01d@2x.png"
            },
            {
                "date": "18/11",
                "temp": 14,
                "wind": 6,
                "desc": "molnigt",
                "icon": "http://openweathermap.org/img/wn/04d@2x.png"
            },
            {
                "date": "19/11",
                "temp": 9,
                "wind": 1,
                "desc": "klar himmel",
                "icon": "http://openweathermap.org/img/wn/01d@2x.png"
            },
            {
                "date": "20/11",
                "temp": 7,
                "wind": 2,
                "desc": "klar himmel",
                "icon": "http://openweathermap.org/img/wn/01d@2x.png"
            },
            {
                "date": "21/11",
                "temp": 8,
                "wind": 1,
                "desc": "klar himmel",
                "icon": "http://openweathermap.org/img/wn/01d@2x.png"
            }
        ],
        "map_link": "https://www.openstreetmap.org/#map=13/37.388019561768/-122.07431030273"
    }
</pre>

<h3>Testa API</h3>

<br>
<form action=<?= url("weather-json") ?> method="get">
    <input type="hidden" name="location" value="8.8.8.8">
    <input type="hidden" name="type" value="future">
    <input class="valid" type="submit" value="Godkänt test">
</form>

<form action=<?= url("weather-json") ?> method="get">
    <input type="hidden" name="location" value="333.217.812.75">
    <input type="hidden" name="type" value="future">
    <input class="invalid" type="submit" value="Ej godkänt test">
</form>

<h3>Testa med valfritt IP-nummer</h3>
<br>
<form action=<?= url("weather-json") ?> method="get">
    <label for="location">Position</label>
    <input type="text" name="location" placeholder="IP-nummer eller ort" value="<?= htmlentities($location) ?>">
    <label for="future">
        <input type="radio" name="type" id="future" value="future" <?= htmlentities($checked1) ?>>
        Kommande 5 dagar
    </label>
    <label for="past">
        <input type="radio" name="type" id="past" value="past" <?= htmlentities($checked2) ?>>
        Föregående 5 dagar
    </label>
    <input type="submit" value="Sök">
</form>


<h2>IP-validering och karta</h2>

<p class="ingress">Använd API:et för att validera ip-nummer. Du får även ut platsinformation och kartlänk baserat på ip-numret. Svaret returneras som JSON.</p>

<h3>Exempel</h3>

<p class="ingress">GET /ip-geo-json?ip=123.12.12.12</p>

<pre>
    {
        "ip": "123.12.12.12",
        "valid": true,
        "protocol": "IPv4",
        "host": "hn.kd.ny.adsl",
        "country_name": "China",
        "city": "Chengguanzhen (Xiayi)",
        "longitude": "116.1309967041",
        "latitude": "34.237998962402",
        "map_link": "https://www.openstreetmap.org/#map=13/34.237998962402/116.1309967041"
    }
</pre>

<h3>Testa API</h3>

<form action=<?= url("ip-geo-json") ?> method="get">
    <input type="hidden" name="ip" value="3.217.12.75">
    <input class="valid" type="submit" value="Godkänt test">
</form>

<form action=<?= url("ip-geo-json") ?> method="get">
    <input type="hidden" name="ip" value="333.217.812.75">
    <input class="invalid" type="submit" value="Ej godkänt test">
</form>

<h3>Testa med valfritt IP-nummer</h3>
<br>
<form action=<?= url("ip-geo-json") ?> method="get">
    <label for="ip">IP-address</label>
    <input type="text" name="ip" placeholder="3.217.12.75" value="<?= htmlentities($ip) ?>">
    <input type="submit" value="Validera">
</form>
