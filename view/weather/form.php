<?php

namespace Anax\View;

/**
 * Weather search
 */

?>


<h1>Väder</h1>

<h2>Sök</h2>

<p class="ingress">Skriv in en IP-adress. Du kan välja mellan kommande eller föregående fem dagar.</p>

<form action=<?= url("weather") ?> method="get">
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
