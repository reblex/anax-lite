<?php
/**
 * Routes having to do with Session testing.
 */

$app->router->add("session", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Session"]);
    $app->view->add("take1/session", [
        "colorName" => "sessionColor",
        "contentTitle" => "Session",
        "link_increment" => $app->url->create("session/increment"),
        "link_decrement" => $app->url->create("session/decrement"),
        "link_destroy" => $app->url->create("session/destroy"),
        "link_status" => $app->url->create("session/status"),
        "link_dump" => $app->url->create("session/dump"),
        "number" => $app->session->get("number")
    ]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("session/increment", function () use ($app) {
    $app->session->set("number", $app->session->get("number") + 1);
    header("Location: " . $app->url->create("session"));
    die();
});


$app->router->add("session/decrement", function () use ($app) {
    $app->session->set("number", $app->session->get("number") - 1);
    header("Location: " . $app->url->create("session"));
    die();
});


$app->router->add("session/status", function () use ($app) {
    $statusData = new stdClass();
    $statusData->name = session_name();
    $statusData->cache_limit = session_cache_limiter();
    $statusData->session_id = session_id();
    header('Content-Type: application/json');
    echo json_encode($statusData, JSON_PRETTY_PRINT);
});


$app->router->add("session/dump", function () use ($app) {
    $app->session->dump();
});


$app->router->add("session/destroy", function () use ($app) {
    $app->session->destroy();
    header("Location: " . $app->url->create("session/dump"));
    die();
});
