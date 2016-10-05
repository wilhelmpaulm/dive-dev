<?php

$match = $router->match();
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else if ($match) {
    $target = $match["target"];
    if (strpos($target, "#") !== false) {
        list($controller, $action) = explode("#", $target);
        $controller = new $controller;
        $controller->$action($match["params"]);
    } else {
        require $match["target"];
    }
} else {
    header("HTTP/1.0 404 Not Found");
    response(null, 404);
}
  