<?php

$user_name = getPost("new_name");
$user_mail = getPost("new_mail");
$user_pass = getPost("new_pass");
$re_user_pass = getPost("re_pass");


if (isset($user_name) && isset($user_mail) && isset($user_pass) && isset($re_user_pass)) {
    // Check if username exists.
    if (!$app->db->exists($user_name)) {
        // Check that passwords match.
        if ($user_pass != $re_user_pass) {
            echo "Lösenorder matchar inte!";
            header("Refresh:2; create_user.php");
        } else {
            // Make a hash of the password.
            $crypt_pass = password_hash($user_pass, PASSWORD_DEFAULT);

            // Add user to database.
            $app->db->addUser($user_name, $crypt_pass, $user_mail);

            $login = $app->url->create("account/login");
            header("Location: $login");
            die();
        }
    } else {
        echo "A user with that username allready exists! Choose another username.";
        header("Refresh:2; create_user.php");
    }
}
