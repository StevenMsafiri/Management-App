<?php

require_once '../controllers/Employees.php';

$employeesController = new Employees();

$data = $employeesController->read();
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
            <h2>List of Employees</h2>
            <a href="./employee-create.php" class="create-btn">Add Employee</a>
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
                        <th>Modify</th>
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
                            <td> $row[zone_code]</td>
                            <td> $row[department_id]</td>
                            <td> $row[section_id]</td>
                            <td> $row[position]</td>
                            <td> $row[reporting_to]</td>
                            <td> $row[employed_date]</td>
                            <td> <a href='./employee-edit.php?id=$row[employee_id]' class='update-btn'>Edit</a>
                                 <a href='../helpers/delete.php?id=$row[employee_id]' class='clear-btn'>Delete</a>
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