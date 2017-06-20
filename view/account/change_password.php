<main>
    <?php
    @include "contentHeader.php";
    $action = $app->url->create("validation/change_password");
    ?>
    <div class="contentBody">

        <form action="<?= $action ?>" method="POST">
            <table>
                <tr>
                    <td>Gammalt lösenord:</td><td><input type="password" name="old_pass"></td>
                </tr>
                <tr>
                    <td>Nytt lösenord:</td><td><input type="password" name="new_pass"></td>
                </tr>
                <tr>
                    <td>Nytt lösenord igen:</td><td><input type="password" name="re_pass"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submitForm" value="Ändra"></td>
                </tr>
            </table>
        </form>
        <!-- <p><a href='login.php'>Logga in</a></p> -->
    </div>
</main>
