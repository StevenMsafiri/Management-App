<?php

require_once "../models/Department.php";


class Departments
{

    private $departmentModel;

    public function __construct()
    {
        $this->departmentModel = new Department();
    }


    public function getAllDepartments()
    {

        $departments = $this->departmentModel->getAll();

        return $departments;
    }


    public function getDepartmentsByZone($zone)
    {

        return $this->departmentModel->getByzone($zone);
    }


    public function getOneDepartment($id)
    {

        $department = $this->departmentModel->getById($id);
        return $department;
    }

    public function deleteDepartment($id)
    {

        $result = $this->departmentModel->deleteById($id);

        if($result){

            header("Location: ../views/departs.php");
            exit();

        }
        
    }

    public function createDepartment($data)
    {
        $result = $this->departmentModel->createNew($data);

        if ($result) {
            redirect("../views/departs.php");
            exit();
        } 
        else {
            flash("create", "Head of department exists");
            redirect("../views/departs-create.php");
        }
    }


    public function editDepartment($id, $data)
    {

        $result = $this->departmentModel->updateById($id, $data);
        if ($result) {
            header("Location: ../views/departs.php");
            exit();
        } 
        else {
            flash("update", "Entered H.O.D exists");
            redirect("../views/departs-edit.php");
        }
    }
}


$method = new Departments; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['is_update']) && intval($_POST['is_update']) == 1){
        
        $id = $_POST['id'];
        var_dump($_POST['id']);
        return $method->editDepartment($id, $_POST);

    }else{

        return $method->createDepartment($_POST);

    }
}

if($_SERVER['REQUEST_METHOD']==='GET' &&  !empty($_GET['dept_id'])){

    // echo "<pre>";

    // var_dump($_SERVER);

    // echo "</pre>";
    

    $id = $_GET['dept_id'];
    $method->deleteDepartment($id);
}


  