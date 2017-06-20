<?php

if (!$app->session->has("username")) {
    $location = $app->url->create('account/login');
    header("Location: $location");
}

$username = $app->session->get('username');

$last_login = $app->session->get("${username}_last_login") ?: null;
$cookieMessage = "En kaka sparas för din senaste inloggning.";
if (isset($last_login)) {
    $cookieMessage .= " Du loggade senast in $last_login.";
} else {
    $cookieMessage = "En kaka sparas nu för din senaste inloggning.";
    $cookieMessage .= " Nästa gång du loggar in kan du se den.";
}

$admin_link = $app->url->create("admin/");
$admin_output = "";
if ($app->session->get("rights") == "admin") {
    $admin_output = "<p><a href='$admin_link'>Admin</a></p>";
}


$logout_link = $app->url->create("validation/logout");

$change_password_link = $app->url->create("account/change_password");

?>

<main>
    <?php
    @include "contentHeader.php";
    ?>
    <div class="contentBody">

        <p><h2>Du är inloggad som användare <i><?= $username ?></h2></p>

        <p><i><?= $cookieMessage ?></i></p>

        <p><a href="<?= $logout_link ?>">Logga ut</a></p>

        <p><a href="<?= $change_password_link ?>">Ändra lösenord</a></p>

        <?= $admin_output ?>

    </div>
</main>
