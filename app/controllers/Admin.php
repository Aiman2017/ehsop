<?php

class Admin extends Controller
{
    public function index()
    {
        $data = [];
        $user = $this->loadModel('User');
        $userData = $user->checkLogin(true, ['admin']);
        if (is_array($userData)) {
            $data['userData'] = $userData;
        }
        $this->view('admin/index', $data);
    }
}