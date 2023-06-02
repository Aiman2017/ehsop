<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Home extends Controller
{
    public function index()
    {
        $data = [];
        $user = $this->loadModel('User');
        // the false in the checklogin its mean that user can access to the home page even if the user is not logged in
        $userData = $user->checkLogin(false);
        if (is_array($userData)) {
            $data['userData'] = $userData;
        }
        $this->view("index", $data);
    }
}