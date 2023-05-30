<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Cart extends Controller
{
    public function index()
    {
        $data = [];
        $user = $this->loadModel('User');
        $result = $user->checkLogin();
        if (is_array($result)) {
            $data['userData'] = $result;
        }
        $this->view('cart', $data);
    }
}