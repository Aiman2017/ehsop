<?php
defined('ROOTPATH') OR die(http_response_code(404));

class Signup extends Controller
{
    public function index($a = '')
    {
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->loadModel("User");
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $user->signup($_POST);
        }
        $this->view('signup', $data);
    }
}