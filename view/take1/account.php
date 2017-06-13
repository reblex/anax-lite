<?php

if (!$app->session->has("username")) {
    $location = $app->url->create('account/login');
    header("Location: $location");
}

?>

<main>
    <?php
    @include "contentHeader.php";
    ?>
    <div class="contentBody">
        <?php
        $username = $app->session->get('username');
        echo "<p><h2>Du är inloggad som användare <i>$username</i>.</h2></p>";


        $last_login = $app->session->get("${username}_last_login") ?: null;
        $cookieMessage = "En kaka sparas för din senaste inloggning.";
        if (isset($last_login)) {
            $cookieMessage .= " Du loggade senast in $last_login.";
        } else {
            $cookieMessage = "En kaka sparas nu för din senaste inloggning.";
            $cookieMessage .= " Nästa gång du loggar in kan du se den.";
        }
        echo "<p><i>$cookieMessage</i></p>";


        $logout = $app->url->create("account/logout");
        echo "<p><a href='$logout'>Logga ut</a></p>";

        $change_password = $app->url->create("account/change_password");
        echo "<p><a href='$change_password'>Ändra lösenord</a></p>";
        ?>
    </div>
</main>
