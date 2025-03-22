<?php

Class Home extends Controller
{
    function index()
    {
        $data = [];

        $data['page_title'] = "Home";

        $employees = $this->loadModel('employee');

        $data['employees'] = $employees->getAllEmployees();

        $this->view("home", $data);

    }
}