<?php

class Profile extends Controller
{
    public function index()
    {
        $data = [];
        $user = $this->loadModel('User');
        $userData = $user->checkLogin();
        if (is_array($userData)) {
            $data['userData'] = $userData;
        }
        $this->view('profile', $data);
    }
}