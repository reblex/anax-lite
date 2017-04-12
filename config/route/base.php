<?php

$app->router->add("", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Hem"]);
    $app->view->add("take1/home", ["colorName" => "homeColor", "contentTitle" => "Hem"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("about", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Om"]);
    $app->view->add("take1/about", ["colorName" => "aboutColor", "contentTitle" => "Om kursen OOPHP"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("report", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Redovisning"]);
    $app->view->add("take1/report", ["colorName" => "reportColor", "contentTitle" => "Redovisningar"]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});



$app->router->add("status", function () use ($app) {
    $data = [
        "Server" => php_uname(),
        "PHP version" => phpversion(),
        "Included files" => count(get_included_files()),
        "Memory used" => memory_get_peak_usage(true),
        "Execution time" => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],
    ];

    $app->response->sendJson($data);
});
