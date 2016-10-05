<?php

if (env("db_status")) {
    $database = new medoo([
        'database_type' => 'mysql',
        'database_name' => env("db_name"),
        'server' => env("db_host"),
        'username' => env("db_username"),
        'password' => env("db_password"),
        'charset' => 'utf8',
    ]);
}