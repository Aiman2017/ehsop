<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Cart extends Controller
{
    public function index()
    {
        $data = [];
        $user = $this->loadModel('User');
        // the true in the checklogin its mean that will not access to the page if the user is not logged in
        $result = $user->checkLogin(true);
        if (is_array($result)) {
            $data['userData'] = $result;
        }
        $this->view('cart', $data);
    }
}