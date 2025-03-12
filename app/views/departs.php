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

    use controllers\Departments;
    use controllers\Zones;

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
        <div class="one">
        <h2>Departments</h2>
        <a href="./departs-create.php" id ="create-btn">Add Department</a>
        </div>
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
                        <td class= 'actions'> <a href='./departs-edit.php?id=$row[dept_id]' class='update-btn'><img src='./icons/icons8-update-64.png'></a>

                             <a href='../controllers/Departments.php?dept_id=$row[dept_id]' class='clear-btn'><img src='./icons/icons8-delete-48.png'></a>
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