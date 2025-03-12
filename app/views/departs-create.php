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

    use controllers\Departments;
    use controllers\Employees;
    use controllers\Zones;

    include "./partials/nav.php";
    include_once "../controllers/Employees.php";
    include "../controllers/Zones.php";
    include "../controllers/Departments.php";

    $employeesController = new Employees();
    $zonesController = new Zones();
    $departsController = new Departments();

    $zones = $zonesController->getAllzones();
    $employees = $employeesController->read();
    ?>


    <div class="container-reg">
        <a href="./departs.php" class="go-back">X</a>
        <form action="" method="post">
        <div class="title">Create New Departmet</div>
        <?php 
         flash("create");
        ?>
            <div class="form-info">
                <div class="input-box">
                    <label for="name:"> Department name:</label>
                    <input type="text" name="name">
                </div>

                <div class="two">
                    <div class="input-box">
                        <label for="Zone">Zone:</label>
                        <?php
                        if (!empty($zones)) {
                            echo '<select name="Zone" id="zone">';
                            echo '<option selected> Select a Zone </option>';
                            foreach ($zones as $zone) {
                                echo '<option value="' . htmlspecialchars($zone['zone_code']) . '">' . htmlspecialchars($zone['zone_name']) . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo '<input type="text" name="Zone" placeholder="Zone" required>';
                        }
                        ?>
                    </div>

                    <div class="input-box" id="super">
                        <label for="Supervisor:">Reporting to:</label>
                        <?php
                        if (!empty($employees)) {
                            echo '<select name="Supervisor" id="pos">';
                            echo '<option selected> Select Head of Department </option>';
                            foreach ($employees as $employee) {
                                echo '<option value="' . htmlspecialchars($employee['employee_id']) . '">' .htmlspecialchars($employee['f_name'])." ". htmlspecialchars($employee['l_name']) . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo '<input type="text" name="Zone" placeholder="Head of the Department" required>';
                        }
                        ?>
                    </div>
                </div>

                <div class="input-box">
                    <label for="description:">Description</label>
                    <textarea name="description" id=""></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" id="create-btn">Create</button>
                    <button type="reset">Clear</button>
                   
                </div>

            </div>

        </form>
    </div>
</body>

</html>