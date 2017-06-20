<?php
if (!($app->session->get("rights") == "admin")) {
    $location = $app->url->create('account');
    header("Location: $location");
    die();
}

$username = getGet("username");


if (getPost("submitUpdateForm")) {
    $update_user_name = getPost("update_username");
    $update_email = getPost("update_email");
    $update_rights = getPost("update_rights");
    $app->db->setUserData($username, "rights", $update_rights);
    $app->db->setUserData($username, "email", $update_email);
    $app->db->setUserData($username, "username", $update_user_name);
    header("Location: " . $app->url->create("admin/show_all_users"));
    die();
}
?>

<main>
    <div class="contentBody">
        <form action="" method="POST">
        <table>
            <legend><h3>Redigera användare</h3></legend>
            <tr>
                <td>Användarnamn:</td><td><input type="text" name="update_username" value="<?= $username ?>"></td>
            </tr>
            <tr>
                <td>E-Mail:</td><td><input type="email" name="update_email" value='<?= $app->db->getUserData($username, "email") ?>'></td>
            </tr>
            <tr>
                <td>Rättigheter:</td>
                <td>
                    <?php
                    $rights = $app->db->getUserData($username, "rights");
                    ?>
                    <select name="update_rights">
                        <option value="admin" <?=$rights == 'admin' ? 'selected' : ''?>>Admin</option>
                        <option value="regular" <?=$rights == 'regular' ? 'selected' : ''?>>Regular</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submitUpdateForm" value="Uppdatera"></td>
            </tr>
        </table>
    </form>
    </div>
</main>
