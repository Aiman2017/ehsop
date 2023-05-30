<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Home extends Controller
{
    public function index()
    {
        $user = $this->loadModel('User');
        $userData = $user->checkLogin();
        if (is_array($userData)) {
            $data['userData'] = $userData;
        }else {
            $this->view("index");
        }
        $this->view("index", $data);
    }
}