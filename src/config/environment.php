<?php

global $database;

date_default_timezone_set('Asia/Manila');
session_save_path('temp/sessions');
ini_set('max_execution_time', 600);

function env($id = null) {
    return getInit($id);
}

function getInit($id = null) {
    $status = "offline";

    $init = [];
    if ($status == "online") {
        $init = [
            "status" => "online",
            "debug" => true,
            "api_key" => true,
            "server_public" => true,
            "server_hide" => false,
            "server_zip" => true,
            "db_status" => true,
            "db_host" => "localhost",
            "db_name" => "dive-dev",
            "db_username" => "root",
            "db_password" => "",
        ];
    } else {
        $init = [
            "status" => "offline",
            "debug" => true,
            "api_key" => true,
            "server_public" => true,
            "server_hide" => false,
            "server_zip" => true,
            "db_status" => true,
            "db_host" => "localhost",
            "db_name" => "dive-dev",
            "db_username" => "root",
            "db_password" => "",
        ];
    }

    $init["localhost"] = $_SERVER["HTTP_HOST"];
    $init["dir"] = $_SERVER['DOCUMENT_ROOT'];

    if ($id == null) {
        return $init;
    } else {
        return $init[$id];
    }
}

if (env("server_zip")) {
    ob_start("ob_gzhandler");
}

if (env("server_public")) {
    header('Access-Control-Allow-Origin: *');
}

if (env("server_hide")) {
    header('X-Powered-By: ');
    header('Server: ');
}
