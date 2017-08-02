<?php

$app->router->add("content/", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("content/content", ["colorName" => "myContentColor",
                                        "contentTitle" => "Content"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("content/blog", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Blogg"]);
    $app->view->add("content/blog", ["colorName" => "adminColor",
                                     "contentTitle" => "Content"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("content/blockTest", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Block test"]);
    $app->view->add("content/blockTest", ["colorName" => "adminColor",
                                     "contentTitle" => "Content"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("content/page", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Sidor"]);
    $app->view->add("content/page", ["colorName" => "adminColor",
                                     "contentTitle" => "Content"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("content/create", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Sidor"]);
    $app->view->add("content/create", ["colorName" => "adminColor",
                                     "contentTitle" => "Content"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("content/pages", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Sidor"]);
    $app->view->add("content/pages", ["colorName" => "adminColor",
                                     "contentTitle" => "Content"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("content/admin", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Blogg"]);
    $app->view->add("content/admin", ["colorName" => "adminColor",
                                      "contentTitle" => "Content"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("content/edit", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Regigera"]);
    $app->view->add("content/edit", ["colorName" => "adminColor",
                                     "contentTitle" => "Content"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("content/delete", function () use ($app) {
    $app->view->add("content/delete");
    $app->response->setBody([$app->view, "render"])->send();
});
