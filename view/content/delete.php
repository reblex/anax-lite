<?php
if (!($app->session->get("rights") == "admin")) {
    $location = $app->url->create('account');
    header("Location: $location");
    die();
}

$route = "delete";
$resultset = $app->ch->handleRoute($route);
