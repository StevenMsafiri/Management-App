<?php

Class Login extends Controller
{
    function index()
    {
        $data['page_title'] = "Login";

        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $user = $this->loadModel('user');
            $user->login($_POST);
        }
        $this->view("login", $data);

    }
}