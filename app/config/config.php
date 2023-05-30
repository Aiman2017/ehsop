<?php
defined('ROOTPATH') OR die(http_response_code(404));
//import the css js images
//http://localhost/eshop/public/index.php
$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace('index.php', "", $path);
define("ROOT", $path);
const ASSETS = ROOT . 'assets';

//database
const WEBSITE = 'my shop';
const DB_TYPE = "mysql";
const DB_NAME = 'eshop';
const DB_USER = 'root';
const DB_HOST= 'localhost';
const DB_PASS = '';

//отключение ошибок
const DEBUG = true;
if (DEBUG) {
    ini_set('display_errors', 1);
}else {
    ini_set('display_errors', 0);
}

//THEME
const THEME = "eshop/";