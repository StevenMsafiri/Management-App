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


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $departsController->processForm($data);
        if ($result) {
            header("Location: departs.php");
            exit();
        } else {
            flash("create", "Internal Error");
            redirect("../views/departs-create.php");
        }
    }


    ?>


    <div class="container-reg">
        <a href="./read_staff.php" class="go-back">X</a>
        <form method="POST">
            <div class="title">Create New Departmet</div>
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
                    <button type="reset">Clear</button>
                    <button type="submit" id="create-btn">Create</button>
                </div>

            </div>


        </form>
    </div>
</body>

</html>