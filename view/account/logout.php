<?php

if ($app->session->has("username")) {
    $app->session->destroy();
}

$location = $app->url->create('account');
header("Location: $location");
