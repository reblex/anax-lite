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
                header('Location; ' . $app->url->create("account/login"));
        } else {
            $status = "Lösenorden matchar inte varandra.";
        }
    } else {
        $status = "Ditt gamla lösenord är felaktigt angivet.";
    }
} else {
    $status = "Du måste fylla i alla fält.";
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
