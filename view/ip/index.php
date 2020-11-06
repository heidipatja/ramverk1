<?php

namespace Anax\View;

/**
 * IP validator
 */

?>


<h1>Validera IP-adress</h1>

<p class="ingress">Skriv in en IP-adress för att se om den är giltig och för att få fram domännamnet.</p>

<form action=<?= url("ip") ?> method="get">
    <label for="ip">IP-address</label>
    <input type="text" name="ip" placeholder="3.217.12.75">
    <input type="submit" value="Validera">
</form>
