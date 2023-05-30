<?php
defined('ROOTPATH') OR die(http_response_code(404));

$PATH = str_replace("\\", "/", __DIR__);
$server = trim($_SERVER['REQUEST_URI'], '/');
$PATH= str_replace("C:/xampp/htdocs/", "", $PATH);
if ($PATH === $server) {
    http_response_code(404);
    die();
}