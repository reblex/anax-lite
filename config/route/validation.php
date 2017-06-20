<?php

$app->router->add("validation/change_password", function () use ($app) {
    $app->view->add("validation/change_password");
    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("validation/create_user", function () use ($app) {
    $app->view->add("validation/create_user");
    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("validation/login", function () use ($app) {
    $app->view->add("validation/login");
    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("validation/logout", function () use ($app) {
    $app->view->add("validation/logout");
    $app->response->setBody([$app->view, "render"])->send();
});
