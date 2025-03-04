<?php

include_once '../controllers/Departments.php';

$departmentsController = new Departments();


if (isset($_GET['zone'])) {
    header('Content-Type: application/json');
    $zone = $_GET['zone'];
    $departments = $departmentsController->getDepartmentsByZone($zone);
    
    echo json_encode($departments);
    exit;
}