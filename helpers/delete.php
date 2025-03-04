<?php



include_once '../controllers/Employees.php';


$employeeController = new Employees;


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $employeeController->deleteEmployeeById($id);

    redirect("../views/employees.php");
}
