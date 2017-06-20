<?php

if (!($app->session->get("rights") == "admin")) {
    $location = $app->url->create('account');
    header("Location: $location");
    die();
}

?>

<main>
    <?php
    include ANAX_INSTALL_PATH . "/view/take1/contentHeader.php";
    ?>
    <div class="contentBody">

        <a href="<?= $app->url->create('admin/show_all_users') ?>">Visa användare</a>
        <br>
        <a href="<?= $app->url->create('admin/add_user') ?>">Lägg till användare</a>

    </div>
</main>
