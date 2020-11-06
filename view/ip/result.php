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
                <span class="ip-label">Status:</span>
                <span class="ip-info">Validerar</span>
                <i class="fas fa-check"></i>
            </div>
            <div class="ip-div">
                <span class="ip-label">Protokoll:</span>
                <span class="ip-info"><?= htmlentities($protocol) ?></span>
                <i class="fas fa-check"></i>
            </div>

        <?php if ($host) : ?>
            <div class="ip-div">
                <span class="ip-label">Domän:</span>
                <span class="ip-info"><?= htmlentities($host) ?></span>
                <i class="fas fa-check"></i>
            </div>
        <?php else : ?>
            <div class="ip-div">
                <span class="ip-label">Domän:</span>
                <span class="ip-info">-</span>
                <i class="fas fa-times"></i>
            </div>
        <?php endif; ?>

        </div>

    <?php else : ?>
        <div class="ip-results invalid">
            <div class="ip-div">
                <span class="ip-label">Status:</span>
                <span class="ip-info">Validerar inte</span>
                <i class="fas fa-times"></i>
            </div>
        </div>
    <?php endif; ?>
