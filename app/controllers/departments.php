<?php

Class Departments extends Controller
{
    function index()
    {
        $data['page_title'] = "Departments";

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $departments = $this->loadModel('department');
        $data['departments'] = $departments->getAllDepartments();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $this->view("departments", $data);
    }

    function create()
    {
        $data['page_title'] = "Create Department";

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $this->view("departs-create", $data);

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $department = $this->loadModel('department');
            $result = $department->addDepartment($_POST);
            show($_POST);
            if ($result) {
                header('Location:' .ROOT.'/departments');
                exit();
            }
        }

    }

    function update()
    {
        $data['page_title'] = "Update Department";

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $departments = $this->loadModel('department');
        $data['department'] = $departments->getDepartment(intval($_GET['id']));

        $this->view("departs-edit", $data);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']))
        {
            $result = $departments->editDepartment($_POST);
            if ($result) {
                header('Location:' .ROOT.'/departments');
                exit();
            }
        }
    }

    function delete()
    {
        if($_SERVER['REQUEST_METHOD']==="GET" && isset($_GET['id']))
        {
            $departments = $this->loadModel('department');

            $result = $departments->deleteDepartment($_GET['id']);
            if ($result) {
                header('Location:' .ROOT.'/departments');
                exit();
              }
        }
    }
}
