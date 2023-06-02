<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Checkout extends Controller
{
    public function index()
    {
        $data = [];
        $user = $this->loadModel("User");
        // the true in the checklogin its mean that will not access to the page if the user is not logged in
        $userData = $user->checkLogin(true);
        if (is_array($userData)) {
            $data['userData'] = $userData;
        }
        $this->view('checkout', $data);
    }

}