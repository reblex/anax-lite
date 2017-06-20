<?php
// Make sure user is admin.
if (!($app->session->get("rights") == "admin")) {
    $location = $app->url->create('account');
    header("Location: $location");
    die();
}

if (getPost("change_the_password")) {
    $user = getPost("username");
    $new_pass = getPost("new_pass");
    $re_pass = getPost("re_pass");

    // Check if all fields are filled
    if ($new_pass != null && $re_pass != null) {
        // Check if new password matches
        if ($new_pass == $re_pass) {
                $crypt_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $app->db->changePassword($user, $crypt_pass);
                header("Location: " . $app->url->create("admin/show_all_users"));
        }
    }
}

?>

<main>
    <?php
    @include "contentHeader.php";
    ?>
    <div class="contentBody">
        <a href="<?= $app->url->create('admin/') ?>">Tillbaka till Admin</a>
        <br><br>

        <form action="" method="POST">
            <input type="hidden" name="username" value="<?= getGet('username') ?>">
            <table>
                <tr>
                    <td>Nytt lösenord:</td><td><input type="password" name="new_pass"></td>
                </tr>
                <tr>
                    <td>Nytt lösenord igen:</td><td><input type="password" name="re_pass"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="change_the_password" value="Ändra"></td>
                </tr>
            </table>
        </form>
    </div>
</main>
