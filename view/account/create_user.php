<?php
$action = $app->url->create("validation/create_user");
?>

<main>
    <div class="contentBody">
        <form action="<?= $action ?>" method="POST">
        <table>
            <legend><h3>Create user</h3></legend>
            <tr>
                <td>Användarnamn:</td><td><input type="text" name="new_name"></td>
            </tr>
            <tr>
                <td>Mail:</td><td><input type="email" name="new_mail"></td>
            </tr>
            <tr>
                <td>Lösenord:</td><td><input type="password" name="new_pass"></td>
            </tr>
            <tr>
                <td>Lösenord igen:</td><td><input type="password" name="re_pass"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submitCreateForm" value="Create"></td>
            </tr>
        </table>
    </form>
    </div>
</main>
