<?php

class Employees extends Controller

{
    public function index()
    {
        $data['page_title'] = 'Employees';

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $departments = $this->loadModel('department');
        $data['departments'] = $departments->getAllDepartments();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $sections = $this->loadModel('section');
        $data['sections'] = $sections->getAllSections();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view("employees", $data);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['employee_id'])) {
            $employee_id = $_GET['employee_id'];

            $result = $employees->deleteEmployee($employee_id);
            if ($result) {
                $this->view("employees", $data);
            }
        }
    }

    public function create()
    {
        $data['page_title'] = 'Register';


        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $departments = $this->loadModel('department');
        $data['departments'] = $departments->getAllDepartments();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $sections = $this->loadModel('section');
        $data['sections'] = $sections->getAllSections();

        $positions = $this->loadModel('position');
        $data['positions'] = $positions->getAllPositions();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $employees->addEmployee($_POST);
            if ($result) {
                $this->view("employee-create", $data);
            }
        } else {
            $this->view("employee-create", $data);
        }

    }

    function update(): void
    {
        $data['page_title'] = 'Update';

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $departments = $this->loadModel('department');
        $data['departments'] = $departments->getAllDepartments();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $sections = $this->loadModel('section');
        $data['sections'] = $sections->getAllSections();

        $positions = $this->loadModel('position');
        $data['positions'] = $positions->getAllPositions();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $employee_id = intval($_GET['id']);
            $data['employee'] = $employees->getEmployee($employee_id);


            $this->view("employee-edit", $data);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            show($_POST);
            $result = $employees->editEmployee($_POST);
            if ($result) {
                $this->view("employees", $data);
            }
        }

    }

}
