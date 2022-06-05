<?php

return [
    "connection" => [
        "default" => "postage",
        "drivers" => [
            "postage" => [
                'driver' => 'sqlite',
                'database' => __DIR__ . "/../database/database.sqlite",
                'foreign_key_constraints' => true,
                'strict' => true,
            ]
        ]
    ]
];
