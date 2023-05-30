<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Login extends Controller
{
    public function index()
    {
        $user = $this->loadModel("User");
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['email'] = $_POST['email'];
            $user->login($_POST);
        }
        $this->view('login', $data);
    }

}