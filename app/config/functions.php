<?php
defined('ROOTPATH') OR die(http_response_code(404));
function show($stuff) {
    echo "<pre>";
    var_dump($stuff);
    echo "</pre>";
}

function redirect($path) {
    header("Location:" . ROOT . $path);
    die();
}

function checkError($error) {
    if (isset($_SESSION['error'][$error]) && $_SESSION['error'][$error] !== '') {
        echo $_SESSION['error'][$error];
        unset($_SESSION['error'][$error]);
    }
}