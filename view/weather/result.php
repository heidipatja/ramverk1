<?php

namespace Anax\View;

/**
 * Weather search results
 */

// var_dump($weather);

?>
    <?php if (isset($weather[0]["date"])) : ?>
        <h3>Väder</h3>
        <div class="weather columns col3-wrapper">
            <?php foreach ($weather as $day) : ?>
            <div class="weather-day column col5">
                <div class="weather-date">
                    <?= htmlentities($day["date"]) ?>
                </div>
                <div class="weather-icon">
                    <img src="<?= htmlentities($day["icon"]) ?>" alt="väderikon <?= htmlentities($day["desc"]) ?>">
                </div>
                <div class="weather-temperature">
                    <?= htmlentities($day["temp"]) ?> &#8451;
                </div>
                <div class="weather-wind">
                    <?= htmlentities($day["wind"]) ?> m/s
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php elseif (!$weather && !$empty) : ?>
        <h3>Väder</h3>
        <div>
            <p>Kunde inte hitta någon väderprognos för platsen.</p>
        </div>
    <?php endif; ?>
