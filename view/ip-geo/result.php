<?php

namespace Anax\View;

/**
 * IP validation results
 */

?>

<h3>Resultat för <?= htmlentities($ip) ?></h3>

    <?php if ($valid) : ?>
        <div class="ip-results valid">
            <div class="ip-div">
                <span class="ip-label">Validerar</span>
                <i class="fas fa-check"></i>
            </div>
        </div>

    <?php else : ?>
        <div class="ip-results invalid">
            <div class="ip-div">
                <span class="ip-label">Validerar inte</span>
                <i class="fas fa-times"></i>
            </div>
        </div>
    <?php endif; ?>


    <?php if ($protocol) : ?>
            <div class="ip-div">
                <span class="ip-label">Protokoll:</span>
                <span class="ip-info"><?= htmlentities($protocol) ?></span>
            </div>
    <?php endif; ?>

    <?php if ($host) : ?>
        <div class="ip-div">
            <span class="ip-label">Domän:</span>
            <span class="ip-info"><?= htmlentities($host) ?></span>
        </div>
    <?php endif; ?>

    <?php if ($country_name) : ?>
            <div class="ip-div">
                <span class="ip-label">Land:</span>
                <span class="ip-info"><?= $country_name ?></span>
            </div>
    <?php endif; ?>

    <?php if ($city) : ?>
            <div class="ip-div">
                <span class="ip-label">Stad:</span>
                <span class="ip-info"><?= $city ?></span>
            </div>
    <?php endif; ?>

    <?php if ($latitude) : ?>
        <div class="ip-div">
            <span class="ip-label">Latitud:</span>
            <span class="ip-info"><?= $latitude ?></span>
        </div>
    <?php endif; ?>

    <?php if ($longitude) : ?>
        <div class="ip-div">
            <span class="ip-label">Longitud:</span>
            <span class="ip-info"><?= $longitude ?></span>
        </div>
    <?php endif; ?>
