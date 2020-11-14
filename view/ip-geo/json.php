<?php

namespace Anax\View;

/**
 * IP validator API
 */

?>


<h2>API</h2>

<p class="ingress">Du kan även använda API:t för att göra ett GET-anrop. Svaret returneras som JSON.</p>

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

<br>
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
