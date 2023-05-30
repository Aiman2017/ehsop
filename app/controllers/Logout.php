<?php

class Logout extends Controller
{
    public function index()
    {
       $this->loadModel('User')->logout();
    }

}