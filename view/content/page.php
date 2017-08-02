<?php
$route = "page";
$resultset = $app->ch->handleRoute($route);
if (is_array($resultset)) {
    $location = $app->url->create("content/pages");
    $p = getGet("p");
    header("Location: $location");
    die();
}
?>

<main>
    <div class="contentBody">
        <article>
            <header>
                <?= $app->tf->doFilter(esc($resultset->title), $resultset->filter) ?>
            </header>
            <?= $app->tf->doFilter(esc($resultset->data), $resultset->filter) ?>
        </article>
    </div>
</main>
