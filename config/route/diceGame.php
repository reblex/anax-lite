<?php

$app->router->add("dice", function () use ($app) {
    $game = $app->session->get("game");
    $p1Score = $game->getTotal(1);
    $p2Score = $game->getTotal(2);
    $currPlayerNum = $game->getPlayingNum();
    $rollTotal = $game->getCurrentRollSum();
    $status = $game->getStatus();

    $app->view->add("take1/header", ["title" => "Tärningsspel"]);
    $app->view->add("take1/diceGame", [
        "colorName" => "diceColor",
        "contentTitle" => "Tärningsspel",
        "p1Score" => $p1Score,
        "p2Score" => $p2Score,
        "currentPlayerNum" => $currPlayerNum,
        "rollTotal" => $rollTotal,
        "status" => $status,
        "link_roll" => $app->url->create("dice/roll"),
        "link_stop" => $app->url->create("dice/stop"),
        "link_restart" => $app->url->create("dice/restart")
    ]);
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("dice/roll", function () use ($app) {
    $game = $app->session->get("game");
    if ($game->getPlaying() == true) {
        $game->roll();
    }
    header("Location: " . $app->url->create("dice"));
    die();
});


$app->router->add("dice/stop", function () use ($app) {
    $game = $app->session->get("game");
    if ($game->getPlaying() == true) {
        $game->stop();
    }
    header("Location: " . $app->url->create("dice"));
    die();
});


$app->router->add("dice/restart", function () use ($app) {
    $app->session->delete("game");
    header("Location: " . $app->url->create("dice"));
    die();
});
