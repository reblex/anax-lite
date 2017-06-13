<?php

$app->router->add("account/", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Konto"]);
    $app->view->add("take1/account", ["colorName" => "accountColor",
                                      "contentTitle" => "Konto"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("account/login", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Logga in"]);
    $app->view->add("account/login", ["colorName" => "accountColor",
                                      "contentTitle" => "Logga in"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("account/validate", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Logga in"]);
    $app->view->add("account/validate", ["colorName" => "accountColor",
                                         "contentTitle" => "Logga in"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("account/change_password", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Ändra lösenord"]);
    $app->view->add("account/change_password", ["colorName" => "accountColor",
                                                "contentTitle" => "Konto"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("account/create_user", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Skapa konto"]);
    $app->view->add("account/create_user", ["colorName" => "accountColor",
                                                "contentTitle" => "Skapa konto"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("account/logout", function () use ($app) {
    $app->view->add("account/logout", ["title" => "Loggar ut..."]);
    $app->response->setBody([$app->view, "render"])->send();
});
