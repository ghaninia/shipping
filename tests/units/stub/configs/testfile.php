<?php

return [

    "name" => "shipping" ,
    "x" => [
        "y" => [
            "z" => "bigbang!"
        ]
    ] ,

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

