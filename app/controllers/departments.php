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
        $data['page_title'] = "Add Department";

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $this->view("departs-create", $data);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']))
        {
            $department = $this->loadModel('department');
            $result = $department->createDepartment($_POST);
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

        $department = $this->loadModel('department');
        $data['department'] = $department->getDepartment(intval($_GET['id']));

        $this->view("departs-edit", $data);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']))
        {
            $department = $this->loadModel('department');
            $result = $department->updateDepartment($_POST);
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
            $department = $this->loadModel('department');

            $result = $department->deleteDepartment($_GET['id']);
            if ($result) {
                header('Location:' .ROOT.'/departments');
                exit();
              }
        }
    }
}
