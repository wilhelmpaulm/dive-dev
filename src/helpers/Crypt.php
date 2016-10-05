<?php
namespace Helpers;

class Crypt {

    public static function encrypt($data) {
        $method = "AES-256-CBC";
        $data = utf8_encode($data);
        $len = openssl_cipher_iv_length($method);
        $isCryptoStrong = false;
        $iv = openssl_random_pseudo_bytes($len, $isCryptoStrong);
        $data = openssl_encrypt($data, $method, env("app_secret"), 0, $iv);
        return base64_encode($iv . $data);
    }

    public static function decrypt($data) {
        $data = base64_decode($data);
        $method = "AES-256-CBC";
        $len = openssl_cipher_iv_length($method);
        $iv = substr($data, 0, $len);
        return openssl_decrypt(substr($data, $len), $method, env("app_secret"), 0, $iv);
    }

}
