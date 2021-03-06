<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToCreate = url("book/create");
$urlToDelete = url("book/delete");



?><h1>Böcker</h1>

<p>
    <a href="<?= $urlToCreate ?>">Skapa</a> |
    <a href="<?= $urlToDelete ?>">Radera</a>
</p>

<?php if (!$items) : ?>
    <p>Ve och fasa, det finns inga böcker än!</p>
    <?php
    return;
endif;
?>

<table class="book-table">
    <tr>
        <th>Id</th>
        <th>Titel</th>
        <th>Författare</th>
        <th>Bild</th>
    </tr>
    <?php foreach ($items as $item) : ?>
    <tr>
        <td>
            <a href="<?= url("book/update/{$item->id}"); ?>"><?= $item->id ?></a>
        </td>
        <td><?= $item->title ?></td>
        <td><?= $item->author ?></td>
        <td>
            <?php if ($item->image) : ?>
            <img class="thumb" src="<?= $item->image ?>" alt="<?= $item->title ?>">
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
