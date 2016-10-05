<?php
namespace Helpers;

class Session {

    public static function get($name = null, $key = null) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION)) {
            if (isset($_SESSION[$name])) {
                if ($name != null && $key != null):
                    $value = json_decode(\Helpers\Crypt::decrypt($_SESSION[$name]), true)[$key];
                    return $value;
                elseif ($name != null):
                    $value = json_decode(\Helpers\Crypt::decrypt($_SESSION[$name]), true);
                    return $value;
                else:
                    $session = [];
                    foreach ($_SESSION as $key => $value):
                        $session[$key] = json_decode(\Helpers\Crypt::decrypt($value), true);
                    endforeach;
                    return $session;
                endif;
            }
            return false;
        }
        return false;
    }

    public static function set($key, $value = null) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION)) {
            if ($value):
                $value = \Helpers\Crypt::encrypt(json_encode($value));
            else:
                $value = null;
            endif;
            $_SESSION[$key] = $value;
            return true;
        }
        return false;
    }

    public static function clear($key) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION[$key] = ' ';
        $_SESSION[$key] = null;
        return true;
    }

    public static function stop() {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_cache_expire();
        if (isset($_SESSION)):
            session_destroy();
        endif;
        return true;
    }

}
