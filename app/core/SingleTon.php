<?php

trait SingleTon
{

    protected static ?self $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        return self::$instance ?? self::$instance = new self();
    }
}