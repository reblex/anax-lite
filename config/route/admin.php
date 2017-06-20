<?php

$app->router->add("admin/", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Admin"]);
    $app->view->add("admin/admin", ["colorName" => "adminColor",
                                      "contentTitle" => "Admin"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("admin/show_all_users", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Admin"]);
    $app->view->add("admin/show_all_users", ["colorName" => "adminColor",
                                      "contentTitle" => "Admin"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("admin/edit_user", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Admin"]);
    $app->view->add("admin/edit_user", ["colorName" => "adminColor",
                                      "contentTitle" => "Admin"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("admin/remove_user", function () use ($app) {
    $app->view->add("admin/remove_user");
    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("admin/add_user", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Admin"]);
    $app->view->add("admin/add_user", ["colorName" => "adminColor",
                                      "contentTitle" => "Admin"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("admin/change_password", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Admin"]);
    $app->view->add("admin/change_password", ["colorName" => "adminColor",
                                      "contentTitle" => "Admin"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});
