<?php

if (!function_exists('not_empty')) {
    function not_empty($fields = []){
        if (count($fields) != 0 ) {
            foreach ($fields as $field) {
                if (empty($_POST[$field]) || trim($_POST[$field]) == "") {
                    return false;
                }
            }
            return true;
        }
    }
}


if (!function_exists('e')) {
    function e($string){
        if (!empty($string))
            return htmlspecialchars($string);
    }
}

if (!function_exists('redirect')) {
    function redirect($page){
        header('Location:'.$page);
        exit();
    }
}

if (!function_exists('get_session')) {
    function get_session($key){
        if ($key) {
            return !empty($_SESSION[$key])
                ? e($_SESSION[$key])
                : null;
        }
    }
}

if (!function_exists('supprimer')) {
    function supprimer($vars = []){
        foreach ($vars as $v) {
            if (isset($v)) {
                unset($v);
            }
        }
    }
}

if (!function_exists('save_input_data')) {
    function save_input_data(){
        foreach ($_POST as $key => $value) {
            if(strpos($key, 'password') === false)
            $_SESSION['input'][$key] = $value;
        }
    }
}

if (!function_exists('get_input')) {
    function get_input($key, $val=null){
        if (isset($val)) {
            return $val;
        }
        if (!empty($_SESSION['input'][$key]))
            return $_SESSION['input'][$key];

        return !empty($_SESSION['input'][$key]) 
            ? $_SESSION['input'][$key] 
            : null;
    }
}

if (!function_exists('clear_input_data')) {
    function clear_input_data(){
        if (isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }
}

if (!function_exists('set_flash')) {
    function set_flash($message, $type = 'warning'){
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}