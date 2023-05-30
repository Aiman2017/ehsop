<?php
defined('ROOTPATH') OR die(http_response_code(404));

class _404 extends Controller
{
    public function index()
    {
        $this->view('404');
    }
}