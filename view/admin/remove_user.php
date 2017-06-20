<?php

if (!($app->session->get("rights") == "admin")) {
    $location = $app->url->create('account');
    header("Location: $location");
    die();
}

$username = getGet("delete_name");

$app->db->deleteUser($username);

header("Location: " . $app->url->create("admin/show_all_users"));
die();
?>
