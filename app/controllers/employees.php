<?php

Class Employees extends Controller

{
    public function index()
    {
        $data['page_title'] = 'Employees';

        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $employees = $this->loadModel('employee');
            $data['employees'] = $employees->getAllEmployees();

            $this->view("employees", $data);
        }

//        $this->view("employees", $data);
    }
}
