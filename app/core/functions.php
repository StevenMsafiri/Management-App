<?php

function  show($stuff)
{
    echo "<pre>";
    var_dump($stuff);
    echo "</pre>";
}


function show_error()
{
    if(isset($_SESSION['errors']) && !empty($_SESSION['errors']))
    {
        echo $_SESSION['errors'];
    }
}