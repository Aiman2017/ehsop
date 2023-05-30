<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Request
{
    protected static function parseURL()
    {
        $url = $_GET['url'] ?? "home";
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }

    public static function getURl()
    {
        return static::parseURL();
    }
}