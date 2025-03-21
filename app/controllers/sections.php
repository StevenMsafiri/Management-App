<?php

Class Sections extends Controller
{

    function index()
    {
        $sections = $this->loadModel('section');
        $data['sections'] = $sections->getAllSections();

        $department = $this->loadModel('department');
        $data['departments'] = $department->getAllDepartments();

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $this->view('sections', $data);
    }

    function create()
    {
        $department = $this->loadModel('department');
        $data['departments'] = $department->getAllDepartments();

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']))
        {
            $section = $this->loadModel('section');
            $result = $section->createSection($_POST);
            if($result)
            {
                header('Location:' .ROOT. '/sections');
                exit();
            }
        }

        $this->view('section-create', $data);
    }

    function update()
    {
        $department = $this->loadModel('department');
        $data['departments'] = $department->getAllDepartments();

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $sections = $this->loadModel('section');
        $data['section'] =$sections->getSection($_GET['id']);


        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']))
        {

            $result = $sections->updateSection($_POST);
            if($result)
            {
                header('Location:' .ROOT. '/sections');
                exit();
            }
        }

        $this->view('section-edit', $data);
    }

    function  delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']))
        {
            $section = $this->loadModel('section');
            $result = $section->deleteSection($_POST['id']);
            if($result)
            {
                header('Location:' .ROOT. '/sections');
                exit();
            }
        }
    }
}