<?php
/**
 * Config file for the navbar.
 */
return [
    "config" => [
        "navbar-class" => "navbar"
    ],
    "items" => [
        "more" => [
            "text" => "Mer",
            "route" => "#",
            "dropdown" => [
                "session" => [
                    "text" => "Session",
                    "route" => "session",
                    "dropdown" => []
                ],
                "dice" => [
                    "text" => "Tärningsspel",
                    "route" => "dice",
                    "dropdown" => []
                ],
            ]
        ],
        "account" => [
            "text" => "Konto",
            "route" => "account/login",
            "dropdown" => []
        ],
        "report" => [
            "text" => "Redovisningar",
            "route" => "report",
            "dropdown" => []
        ],
        "about" => [
            "text" => "Om",
            "route" => "about",
            "dropdown" => []
        ],
        "home" => [
            "text" => "Hem",
            "route" => "",
            "dropdown" => []
        ]
    ],
];
