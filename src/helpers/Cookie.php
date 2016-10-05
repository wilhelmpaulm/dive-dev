<?php
namespace Helpers;

class Cookie {

    public static function get($key = null) {
        if (isset($_COOKIE)) {
            if ($key):
                $value = decrypt($_COOKIE[$key]);
                return $value;
            else:
                $cookie = [];
                foreach ($_COOKIE as $key => $value):
                    $cookie[$key] = \Helpers\Crypt::decrypt($value);
                endforeach;
                return $cookie;
            endif;
            return false;
        }
        return false;
    }

    public static function set($key, $value = null) {
        if (isset($_COOKIE)) {
            if ($value):
                $value = \Helpers\Crypt::encrypt($value);
            else:
                $value = null;
            endif;
            setcookie($key, $value, time() + 3600, "/");
            return true;
        }
        return false;
    }

    public static function clear($key) {
        $_COOKIE[$key] = ' ';
        $_COOKIE[$key] = null;
        unset($_COOKIE[$key]);
        setcookie($key, "", time() - 3600, "/");
        return true;
    }

    public static function stop() {
        if (isset($_COOKIE)):
            foreach ($_COOKIE as $key => $value) :
                unset($_COOKIE[$key]);
                setcookie($key, "", time() - 3600, "/");
            endforeach;
        endif;
        return true;
    }

}
