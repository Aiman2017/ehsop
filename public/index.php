<?php
session_start();

define("ROOTPATH", $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME']. "/eshop/app/");
include_once "../app/config/bootstrap.php";

$app = new Router();
$app->getRouterURL(Request::getURl());
