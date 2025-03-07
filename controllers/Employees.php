<?php

require_once '../models/Employee.php';
require_once '../helpers/session_helper.php';

class Employees
{

    private $employeeModel;

    public function __construct()
    {

        $this->employeeModel = new Employeee;
    }

    public function read()
    {



        $employee_list = $this->employeeModel->getAllEmployee();
        return $employee_list;
    }


    public function readOne($id)
    {
        $employee = $this->employeeModel->getEmployeeById($id);
        return $employee;
    }

    public function edit($id, $data)
    {

        if (
            empty($data['f_name']) || empty($data['l_name']) || empty($data['s_name'])
        ) {

            flash("update", "Please fill in all inputs");
        }
        $result = $this->employeeModel->updateEmployee($id, $data);

        if ($result) {
            header("Location: employees.php");
            exit();
        } else {
            flash("create", "Failed to update");
            redirect("../views/employee-edit.php");
        }
    }

    public function create($data)
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['f_name']) || $_POST['s_name'] || $_POST['l_name']) {
            flash("create", "Invalid name(s)");
            redirect("../views/employee-create.php");
        }
            
        $result = $this->employeeModel->createEmployee($data);

        if ($result) {
            header("Location: employees.php");
            exit();
        } 
        else {
            flash("create", "Failed to create");
            redirect("../views/employee-create.php");
        }

    }

    public function deleteEmployeeById($id)
    {

        $result =  $this->employeeModel->deleteEmployee($id);

        if ($result) {
            header("Location: employees.php");
            exit();
        } else {
            flash("create", "Failed to delete");
            header("Location:../views/employees.php");
        }
    }
}



$controller = new Employees;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['is_update']) && $_POST['is_update'] == 1) {

            $id = $_POST['id'];

            $controller->edit($id, $_POST);

        }else{

            $controller->create($_POST);

        }

}


if($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['delete']){

    $id = $_GET['employee_id'];

    $controller->deleteEmployeeById($id);


}