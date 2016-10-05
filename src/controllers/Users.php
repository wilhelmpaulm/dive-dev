<?php

namespace Controller;

class Users {

    function __construct() {
        
    }

    function all() {
        $users = db_query("SELECT * FROM `users`");
        include linkPage("users/all");
    }

    function add() {
        include linkPage("users/add");
    }

    function create() {
        $post_data = getPost();
        $data = [
            "last_name" => $post_data["last_name"],
            "last_name" => $post_data["first_name"],
            "email" => $post_data["email"],
            "password" => $post_data["password"],
            "address" => $post_data["address"],
            "gender" => $post_data["gender"],
            "birthdate" => $post_data["birthdate"]
        ];
        $user = db_insert("users", $data);
        sendTo("users/{$user["id"]}");
    }

    function one($params) {
        $user_id = $params["id"];
        $user = db_query("SELECT * FROM `users` WHERE `id` = {$user_id}");
        include linkPage("users/one");
    }

    function edit($params) {
        $user_id = $params["id"];
        $user = db_get("users", $user_id);
//        $user = db_query("SELECT * FROM `users` WHERE `id` = {$user_id}")[0];
        include linkPage("users/edit");
    }

    function update($params) {
        $user_id = $params["id"];
        $post_data = getPost();
        $data = [
            "last_name" => $post_data["last_name"],
            "last_name" => $post_data["first_name"],
            "email" => $post_data["email"],
            "password" => $post_data["password"],
            "address" => $post_data["address"],
            "gender" => $post_data["gender"],
            "birthdate" => $post_data["birthdate"]
        ];
        $user = db_update("users", $data, $user_id);

        sendTo("users/{$user["id"]}");
    }

    function delete($params) {
        $user_id = $params["id"];
        db_delete("users", $user_id);
        sendTo("users");
    }

}
