<?php

class Admin extends Controller
{
    public function index()
    {
        $data = [];
        $user = $this->loadModel('User');
        $userData = $user->checkLogin(true, ['admin']);
        if (is_array($userData) && $userData['rank'] === 'admin') {
            $data['userData'] = $userData;
        }else {
            redirect('');
        }
        $this->view('admin/index', $data);
    }
}