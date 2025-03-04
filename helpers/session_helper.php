<?php

if(!isset($_SESSION)){
    session_start();
}

function flash ($name = '',$message ='', $class = 'form-message'){
    if(!empty($name)){

        if(!empty($message) && empty($_SESSION[$name])){
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;

            echo $_SESSION[$name];
            echo $_SESSION[$name.'_class'];

        }else if(empty($message) && !empty($_SESSION[$name])){
            
            $class = !empty($_SESSION[$name.'_class'])? $_SESSION[$name.'_class'] : $class;
            echo '<div class= "'. $class .'">' . $_SESSION[$name]. '</div>';
            
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);

        }
    }
}


function redirect($location){
    header(
    "location: ". $location);
    echo $location;
    exit();

}
