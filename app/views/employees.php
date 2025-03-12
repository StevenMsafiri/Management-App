<?php

use controllers\Departments;
use controllers\Employees;
use controllers\Zones;

include '../helpers/functions.php';
require_once '../controllers/Employees.php';
require_once '../controllers/Zones.php';
require_once '../controllers/Departments.php';

$employeesController = new Employees();
$departsController = new Departments;
$zonesController = new Zones;

$data = $employeesController->read();
$zones = $zonesController->getAllzones();
$departments =$departsController->getAllDepartments();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/read.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>Staffs</title>
</head>

<body>
    <?php

    include "./partials/nav.php"

    ?>

    <body>
        <div class="container-staff">
            <div class="one">
            <h2>List of Employees</h2>
            <a href="./employee-create.php" id ="create-btn">Add Employee</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Second Name</th>
                        <th>Last Name</th>
                        <th>Birth Date</th>
                        <th>Qualification</th>
                        <th>Zone</th>
                        <th>Department</th>
                        <th>Section</th>
                        <th>Position</th>
                        <th>Reporting to</th>
                        <th>Date of Employment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        foreach ($data as $row) {
                            echo "
                            <tr class='horizontal'>
                            <td> $row[employee_id]</td>
                            <td> $row[f_name]</td>
                            <td>$row[s_name]</td>
                            <td> $row[l_name]</td>
                            <td> $row[birth_date]</td>
                            <td> $row[qualification]</td>
                            <td>";

                            foreach($zones as $zone){
                                if($row['zone_code'] === $zone['zone_code']){
                                    echo $zone['zone_name'];
                                    break;
                                }
                            }
                            
                            echo "</td>
                            <td>";
                            foreach($departments as $department){
                                if($row['department_id'] === $department['dept_id']){
                                    echo $department['department_name'];
                                    break;
                                }
                            }
                            echo "</td>
                            <td> $row[section_id]</td>
                            <td> $row[position]</td>
                            <td> $row[reporting_to]</td>
                            <td> $row[employed_date]</td>
                            <td>
                            <div class='actions'>
                            <a name='update-btn' href='./employee-edit.php?id=$row[employee_id]' class='update-btn'>
                            <img src='./icons/icons8-update-64.png'>
                            </a>
                                 <a  name='delete' href='../controllers/Employees.php?employee_id=$row[employee_id]' class='clear-btn'>
                                 <img src='./icons/icons8-delete-48.png'>
                                 </a>
                            </div> 
                            </td>
                            </tr>
                            </tbody>";
                        }
                    } else {
                        echo "<tr><td colspan='13'>No employees found</td></tr>";
                    }
                    ?>
            </table>
        </div>

    </body>

</html>