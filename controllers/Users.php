<?php

require_once '../models/User.php';
require_once '../helpers/session_helper.php';


class Users
{

    private $userModel;

    public function __construct()
    {

        $this->userModel = new User;
    }

    public function login()
    {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $data = [
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password'])
        ];

        if (empty($data['username']) || empty($data['password'])) {

            flash("login", "Please fill in all inputs");
            redirect("../views/login.php");
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['username'])) {
            flash("login", "Invalid username");
            redirect("../views/login.php");
        }

        if (is_array($this->userModel->getUserByUsernameAndPassword($data['username'], $data['password']))) {
            redirect("../views/home.php");
        } else {
            flash("login", "Access denied, User not found!");
            redirect("../views/login.php");
        }
    }
}

$init = new Users;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    switch ($_POST['type']) {

        case 'login':
            $init->login();
            break;
    }
}
