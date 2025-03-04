<?php


include_once '../controllers/Sections.php';

$sectionsController = new Sections();


if (isset($_GET['department'])) {
    header('Content-Type: application/json');
    $dept = $_GET['department'];
    $sections = $sectionsController->getSectionByDepartment($dept);
    
    echo json_encode($sections);
    exit;
}