<?php
// Make sure user is admin.
if (!($app->session->get("rights") == "admin")) {
    $location = $app->url->create('account');
    header("Location: $location");
    die();
}

if (getPost("submitCreateForm")) {
    $user_name = getPost("new_name");
    $user_mail = getPost("new_mail");
    $user_pass = getPost("new_pass");
    $user_re_pass = getPost("re_pass");
    $user_rights = getPost("new_rights");

    if (isset($user_name) && isset($user_mail) && isset($user_pass) && isset($user_re_pass)) {
        // Check if username exists.
        if (!$app->db->exists($user_name)) {
            // Check that passwords match.
            if ($user_pass != $user_re_pass) {
                echo "Lösenorder matchar inte!";
                header("Refresh:2; create_user.php");
            } else {
                // Make a hash of the password.
                $crypt_pass = password_hash($user_pass, PASSWORD_DEFAULT);

                // Add user to database.
                $app->db->addUser($user_name, $crypt_pass, $user_mail);

                $app->db->setUserData($new_name, "rights", $user_rights);

                header("Location: " . $app->url->create("admin/show_all_users"));
                die();
            }
        } else {
            echo "A user with that username allready exists! Choose another username.";
            header("Refresh:2; create_user.php");
        }
    }
}

?>

<main>
    <div class="contentBody">
        <form action="" method="POST">
        <table>
            <legend><h3>Lägg till användare</h3></legend>
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
                <td>Rättigheter:</td>
                <td>
                    <select name="new_rights">
                        <option value="regular">Regular</option>
                        <option value="admin">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submitCreateForm" value="Lägg till"></td>
            </tr>
        </table>
    </form>
    </div>
</main>
