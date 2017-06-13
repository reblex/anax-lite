<?php

// Handle incoming POST variables.
$user_name = getPost("username");
$user_pass = getPost("password");

date_default_timezone_set('Europe/Stockholm');


if (isset($user_name) && isset($user_pass)) {
    // Check if username exists.
    if ($app->db->exists($user_name)) {
        $hash = $app->db->getHash($user_name);
        // Check if password is correct.
        if (password_verify($user_pass, $hash)) {
            $app->session->set("username", $user_name);

            // Cookie with last login
            if ($app->cookie->has("${user_name}_last_login")) {
                $app->session->set("${user_name}_last_login", $app->cookie->get("${user_name}_last_login"));
            }
            $current_time = date("Y-m-d H:i");
            $app->cookie->set("${user_name}_last_login", $current_time);


            $location = $app->url->create('account');
            header("Location: $location");
        } else {
            echo "Username or Password is incorrect. <a href='login'>Try again.</a>";
        }
    } else {
        echo "No such user. <a href='login'>Try again.</a>";
    }
}
