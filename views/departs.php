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

error_reporting(E_ALL);
ini_set('display_errors', 1);
    
    include "./partials/nav.php";

    include "../controllers/Departments.php";
    include "../controllers/Zones.php";


    $departsController = new Departments();
    $zonesController = new Zones();

    $zones = $zonesController->getAllzones();
    $departments = $departsController->getAllDepartments();


    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $departsController->deleteDepartment($id);

    }

    ?>


    <div class="container-staff">
        <h2>Departments</h2>
        <a href="./departs-create.php" class="create-btn">Add Department</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Zone</th>
                    <th>Manager's ID</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($departments){
                    foreach($departments as $row){
                        echo "<tr class='horizontal'>
                        <td> $row[dept_id]</td>
                        <td> $row[department_name]</td>
                        <td> $row[description]</td>
                        <td>
                        ";
                        foreach($zones as $zone){
                            if($row['zone']===$zone['zone_code']){

                                echo  $zone['zone_name'];

                            }

                        }
                        
                    
                        echo "
                        </td>
                        <td> $row[head_of_dept]</td>
                        <td> <a href='./departs-edit.php?id=$row[dept_id]' class='update-btn'>Edit</a>
                             <a href='./departs.php?id=$row[dept_id]' class='clear-btn'>Delete</a>
                        </td>
                        </tr>
                        ";
                    }
                }else{
                    echo "No departments found";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>