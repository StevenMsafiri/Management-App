<?php

Class Home extends Controller
{
    function index()
    {
        $data = [];

        $data['page_title'] = "Home";

        $this->view("home", $data);

    }
}