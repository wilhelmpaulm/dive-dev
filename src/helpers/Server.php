<?php
namespace Helpers;

class Server {

    public static function get($name = null) {
        if (isset($_SERVER)) {
            if (isset($_SERVER[strtoupper($name)])) {
                return $_SERVER[strtoupper($name)];
            }
        }
        return false;
    }

}
