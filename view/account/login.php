<?php

$user_loggedin = "";

// Make sure no one is logged in.
if ($app->session->has("username")) {
    $location = $app->url->create('account');
    header("Location: $location");
}

$new_account = $app->url->create("account/create_user");

?>
<main>
    <div class="contentBody">
        <form action="<?= $app->url->create('validation/login') ?>" method="post">
            <table>
                <legend><h3>Logga in</h3></legend>
                <tr>
                    <td>Användarnamn:</td><td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Lösenord:</td><td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submitForm" value="Logga in"></td>
                </tr>
            </table>
        </form>
        <p><a href="<?= $new_account ?>">Skapa nytt konto</a></p>
    </div>
</main>
