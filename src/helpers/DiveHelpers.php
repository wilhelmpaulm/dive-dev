<?php
function flash($name) {
    $var = session($name);
    session($name, "unset");
    return $var;
}

function hashString($str) {
    return md5(sha1($str));
}

function htmlClean($data) {
    return htmlentities(htmlspecialchars(htmlentities(htmlspecialchars($data))));
}

function htmlUnclean($data) {
    return html_entity_decode(htmlspecialchars_decode(html_entity_decode(htmlspecialchars_decode($data))));
}

function getUser($key = null) {
    $user = session("user");
    if (isset($user)) {
        if ($key == null) {
            return $user;
        } else {
            if (isset($user[$key])) {
                return $user[$key];
            } else {
                return null;
            }
        }
    } else {
        return null;
    }
}

function currentdatetime() {
    return date("Y-m-d H:i:s");
}

function linkTo($data) {
    if ($data == "back") {
        return $_SERVER['HTTP_REFERER'];
    } else {
        return "http://" . getInit('localhost') . "/" . $data;
    }
}

function sendTo($data) {
    if ($data == "back") {
        echo "<script>location.href = document.referrer;</script>";
        die();
    } else {
        header("Location: http://" . getInit('localhost') . "/" . $data);
    }
    die();
}

function getPage($data) {
    $dir = $_SERVER['DOCUMENT_ROOT'];
    include $dir . "/views/" . $data . ".php";
}

function linkPage($data, $php = true) {
    $dir = $_SERVER['DOCUMENT_ROOT'];
    if ($php) {
        return $dir . "/views/" . $data . ".php";
    } else {
        return $dir . "/views/" . $data;
    }
}

function linkPublic($data) {
    $dir = $_SERVER['DOCUMENT_ROOT'];
    return "http://" . getInit("localhost") . "/public/" . $data;
}

function getGet($key = null) {
    if (isset($_GET)) {
        $g = $_GET;
        if ($key != null) {
            if (isset($_GET[$key])) {
                return $g[$key];
            } else {
                return null;
            }
        } else {
            return $g;
        }
    } else {
        return [];
    }
}

function getPost($key = null) {
    if (isset($_POST)) {
        $p = $_POST;
        if ($key != null) {
            if (isset($_POST[$key])) {
                return $p[$key];
            } else {
                return null;
            }
        } else {
            return $p;
        }
    } else {
        return [];
    }
}

function url() {
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function diverse_array($vector) {
    $result = array();
    foreach ($vector as $key1 => $value1)
        foreach ($value1 as $key2 => $value2)
            $result[$key2][$key1] = $value2;
    return $result;
}

function dateFormat($date) {
    return date_format(date_create($date), "Y-m-d");
}

function addOrdinalNumberSuffix($num) {
    if (!in_array(($num % 100), array(11, 12, 13))) {
        switch ($num % 10) {
            // Handle 1st, 2nd, 3rd
            case 1: return $num . 'st';
            case 2: return $num . 'nd';
            case 3: return $num . 'rd';
        }
    }
    return $num . 'th';
}

#, most popular, big groups, buffet, cafe,lunch

function getResponseCodeMessage($code) {
    $code = is_string($code) ? intval($code) : $code;
    switch ($code) {
        case 100: $text = 'Continue';
            break;
        case 101: $text = 'Switching Protocols';
            break;
        case 200: $text = 'OK';
            break;
        case 201: $text = 'Created';
            break;
        case 202: $text = 'Accepted';
            break;
        case 203: $text = 'Non-Authoritative Information';
            break;
        case 204: $text = 'No Content';
            break;
        case 205: $text = 'Reset Content';
            break;
        case 206: $text = 'Partial Content';
            break;
        case 300: $text = 'Multiple Choices';
            break;
        case 301: $text = 'Moved Permanently';
            break;
        case 302: $text = 'Moved Temporarily';
            break;
        case 303: $text = 'See Other';
            break;
        case 304: $text = 'Not Modified';
            break;
        case 305: $text = 'Use Proxy';
            break;
        case 400: $text = 'Bad Request';
            break;
        case 401: $text = 'Unauthorized';
            break;
        case 402: $text = 'Payment Required';
            break;
        case 403: $text = 'Forbidden';
            break;
        case 404: $text = 'Not Found';
            break;
        case 405: $text = 'Method Not Allowed';
            break;
        case 406: $text = 'Not Acceptable';
            break;
        case 407: $text = 'Proxy Authentication Required';
            break;
        case 408: $text = 'Request Time-out';
            break;
        case 409: $text = 'Conflict';
            break;
        case 410: $text = 'Gone';
            break;
        case 411: $text = 'Length Required';
            break;
        case 412: $text = 'Precondition Failed';
            break;
        case 413: $text = 'Request Entity Too Large';
            break;
        case 414: $text = 'Request-URI Too Large';
            break;
        case 415: $text = 'Unsupported Media Type';
            break;
        case 500: $text = 'Internal Server Error';
            break;
        case 501: $text = 'Not Implemented';
            break;
        case 502: $text = 'Bad Gateway';
            break;
        case 503: $text = 'Service Unavailable';
            break;
        case 504: $text = 'Gateway Time-out';
            break;
        case 505: $text = 'HTTP Version not supported';
            break;
        default:
            $text = "Unknown http status code";
            break;
    }
    return $text;
}

function response($data, $status = 200, $message = null) {
    header('Content-Type: application/json');
    http_response_code($status);
    $message = $message ? $message : getResponseCodeMessage($status);
    $response = [
        "status" => "$status",
        "message" => $message,
        "date" => currentdatetime(),
        "uri" => $_SERVER["REQUEST_URI"] ? $_SERVER["REQUEST_URI"] : null,
        "size" => $data ? is_array($data) ? count($data) : strlen($data) : 0,
        "data" => $data ? $data : null
    ];
    
    if(env("debug")){
        $response["get_params"] = getGet();
        $response["post_params"] = getPost();
    }
    
    echo json_encode(["response" => $response]);
    die;
}