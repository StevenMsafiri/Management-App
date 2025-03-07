<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/eforms.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>Upadate Department</title>
</head>

<body>

    <?php
    include "./partials/nav.php";
    include "../controllers/Employees.php";
    include "../controllers/Zones.php";
    include "../controllers/Departments.php";

    $employeesController = new Employees();
    $zonesController = new Zones();
    $departsController = new Departments();

    $zones = $zonesController->getAllzones();
    $employees = $employeesController->read();
    $id = $_GET['id'];
    $department = $departsController->getOneDepartment($id);
    ?>

    <div class="container-reg">
        <a href="./departs.php" class="go-back">X</a>
        <form method = "POST" action="../controllers/Departments.php">
            <div class="title">Update departmet</div>
            <br>
            <?php flash("update") ?>
            <div class="form-info">
            <input type="hidden" name="is_update" value="1">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($department['dept_id'])?>">
                <div class="input-box">
                    <label for="name:"> Department name:</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($department['department_name'])?>">
                </div>

                <div class="two">
                    <div class="input-box">
                        <label for="Zone">Zone:</label>
                        <select name="Zone" id="zone">
                        <option> Select a Zone </option>
                        <?php
                        if (!empty($zones)) {
                            foreach ($zones as $zone) {
                                echo '<option value="' . htmlspecialchars($zone['zone_code']).'"';
                                if($zone['zone_code'] === $zone['zone_code'])
                                {
                                   echo 'selected';
                                } 
                                   echo '>'. htmlspecialchars($zone['zone_name']) . '</option>';
            
                        }
                    }
                        ?>
                        </select>
                    </div>

                    <div class="input-box" id="super">
                        <label for="Supervisor:">Reporting to:</label>
                        <select name="Supervisor" id="pos">
                        <option> Select Head of Department </option>
                        <?php
                        if (!empty($employees)) {
                            foreach ($employees as $employee) {
                                echo '<option value="' . htmlspecialchars($employee['employee_id']).'"';
                                if($employee['employee_id'] == $department['head_of_dept'])
                                {
                                     echo 'selected';
                                }
                                   
                                   echo '>' . htmlspecialchars($employee['f_name']) ." " .htmlspecialchars($employee['l_name']) . '</option>';
                            
                        }
                    }
                        ?>
                        </select>
                    </div>
                </div>

                <div class="input-box">
                    <label for="description:">Description</label>
                    <textarea name="description" id=""><?php echo htmlspecialchars($department['description'])?></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" id="create-btn">Update</button>
                    <button type="reset">Reset</button>
                </div>

            </div>


        </form>
    </div>
</body>

</html>