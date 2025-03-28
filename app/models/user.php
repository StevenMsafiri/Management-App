<?php
Class User{

    function login($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = '';

        if(isset($POST["username"]) && $POST["password"])
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];

            $query = "SELECT * FROM logins WHERE username = :username AND password = :password ";
            $logged_user = $DB->read($query, $arr);

            if(is_array($logged_user) && count($logged_user) > 0){
                //logged in
                $_SESSION['username'] = $logged_user[0]['username'];
                $_SESSION['id'] = $logged_user[0]['id'];

                show($logged_user);

                header("Location: " . ROOT . "home");

            }else
            {
                $_SESSION['errors'] = "Wrong username or password";
            }
        }else
        {
            $_SESSION['errors'] = "Please enter username and password";

        }

    }


    function check_logged_in()
    {
        $DB = new Database();

        if(isset($_SESSION['username']))
        {
            $arr['username'] = $_SESSION['username'];

            $query = "SELECT * FROM logins WHERE username = :user_url limit 1 ";
            $data = $DB->read($query, $arr);
            if(is_array($data)){
                $_SESSION['id'] = $data[0]['id'];

                return true;
            }
        }

        return false;
    }

    function logout()
    {
        unset( $_SESSION['username']);
        unset($_SESSION['id']);

        header("Location: " . ROOT . "login");
        die();
    }
}
