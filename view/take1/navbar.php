<?php
$navbar = [
    "config" => [
        "navbar-class" => "navbar"
    ],
    "items" => [
        "report" => [
            "text" => "Redovisningar",
            "route" => "report",
        ],
        "about" => [
            "text" => "Om",
            "route" => "about",
        ],
        "home" => [
            "text" => "Hem",
            "route" => "",
        ],
    ]
];
?>


<ul class="<?= $navbar["config"]["navbar-class"] ?>">
    <?php foreach ($navbar["items"] as $key => $item) : ?>
        <div class="navbarButton">
            <div class="navCircle <?=$key?>Color"></div>
            <a class="navbarLink" href="<?= $app->url->create($item["route"]) ?>">
                <li class="<?= $current == $key ? "current" : "" ?>"><?= $item["text"] ?></li>
            </a>
        </div>
    <?php endforeach; ?>
</ul>
