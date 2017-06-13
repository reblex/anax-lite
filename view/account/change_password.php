<?php

$user = $app->session->get("username");

// Handle incoming POST variables
$old_pass = getPost("old_pass");
$new_pass = getPost("new_pass");
$re_pass = getPost("re_pass");

// Check if all fields are filled
if ($old_pass != null && $new_pass != null && $re_pass != null) {
    // Check if old password is correct
    if (password_verify($old_pass, $app->db->getHash($user))) {
        // Check if new password matches
        if ($new_pass == $re_pass) {
                $crypt_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $app->db->changePassword($user, $crypt_pass);
                $status = "Lösenord ändrat!";
        } else {
            $status = "Lösenorden matchar inte varandra.";
        }
    } else {
        $status = "Ditt gamla lösenord är felaktigt angivet.";
    }
} else {
    $status = "Du måste fylla i alla fält.";
}

?>

<main>
    <?php
    @include "contentHeader.php";
    ?>
    <div class="contentBody">
        <form action="" method="POST">
            <table>
                <legend><h3><?=$status?></h3></legend>
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
