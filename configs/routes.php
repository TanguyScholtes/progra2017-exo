<?php

$routes = [
    //default route
    "default" => "GET/auth/getLogin",
    //User routes
    "user_login" => "GET/auth/getLogin",
    "user_auth" => "POST/auth/postLogin",
    "user_logout" => "GET/auth/getLogout",
    //Task routes
    "task_index" => "GET/task/index",
    "task_create" => "POST/task/create",
    "task_edit" => "GET/task/getUpdate",
    "task_update" => "POST/task/postUpdate",
    "task_delete" => "POST/task/delete"
];
