<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/eforms.css">
    <title>Upadate Staffs</title>
</head>

<body>

    <?php

    include_once "./partials/nav.php";
    include '../controllers/Employees.php';

    $employeesController = new Employees();
    $data = $employeesController->readOne($_GET['id']);

    include_once '../controllers/Employees.php';
    include_once '../controllers/Positions.php';
    include_once '../controllers/Zones.php';
    include_once '../controllers/Departments.php';
    include_once '../controllers/Sections.php';



    $employeesController = new Employees();
    $positionsController = new Positions();
    $zonesController = new Zones();
    $departmentsController = new Departments();
    $sectionsController = new Sections();

    $employees = $employeesController->read();
    $positions = $positionsController->getAllPositions();
    $zones = $zonesController->getAllzones();
    $departments = $departmentsController->getAllDepartments();
    $sections = $sectionsController->getAllSections();
    ?>


    <div class="container-reg">
        <a href="./employees.php" class="go-back">X</a>
        <form method="POST" action="../controllers/Employees.php">
            <div class="title">Update employee
                <br>
                <?php flash("update") ?>
                <input type="hidden" name="id" value="<?php echo $data['employee_id'] ?>">
            </div>

            <input type="hidden" name="is_update" value="1">
            <div class=" two">
                <div class="input-box">
                    <label for="Firstname:">First Name:</label>
                    <input type="text" name="Firstname" id="" placeholder="First name" value="<?php echo htmlspecialchars($data['f_name']); ?>">
                </div>
                <div class="input-box">
                    <label for="Second-name:">Second Name:</label>
                    <input type="text" name="Second-name" id="" placeholder="Second name" value="<?php echo htmlspecialchars($data['s_name']); ?>">
                </div>

                <div class="input-box">
                    <label for="Lastname:"> Last Name:</label>
                    <input type="text" name="Lastname" id="" placeholder="Last name" value="<?php echo htmlspecialchars($data['l_name']); ?>">
                </div>

            </div>

            <div class="two">

                <div class="input-box">
                    <label for="Qualification:">Qualification:</label>
                    <select name="Qualification" id="qualify">
                        <option value="" selected>Select qualification</option>
                        <option value="Certificate" class="value" <?php if ($data['qualification'] == 'Certificate') echo 'selected'; ?>>Certificate</option>
                        <option value="Diploma" class="value" <?php if ($data['qualification'] == 'Diploma') echo 'selected'; ?>>Diploma</option>
                        <option value="Bachelor" class="value" <?php if ($data['qualification'] == 'Bachelor') echo 'selected'; ?>>Bachelor</option>
                        <option value="Masters" class="value" <?php if ($data['qualification'] == 'Masters') echo 'selected'; ?>>Masters</option>
                        <option value="PhD" class="value" <?php if ($data['qualification'] == 'PhD') echo 'selected'; ?>>PhD</option>
                        <option value="Other" class="value" <?php if ($data['qualification'] == 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>

                <div class="input-box">
                    <label for="Birthdate:">Birth Date:</label>
                    <input type="date" name="Birthdate" id="" placeholder="birthdate" value="<?php echo htmlspecialchars($data['birth_date']); ?>">
                </div>

            </div>



            <div class="two">
                <div class="input-box">
                    <label for="Zone">Zone:</label>
                    <select name="Zone" id="zone" required>
                    <option> Select Zone </option>
                    <?php
                    if (!empty($zones)) {

                        foreach ($zones as $zone) {
                            echo '<option value="' . htmlspecialchars($zone['zone_code']) . '"';
                            if ($zone['zone_code'] == $data['zone_code']) echo ' selected';
                            echo '>' . htmlspecialchars($zone['zone_name']) . '</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                </div>

                <div class="input-box">
                    <label for="Department">Department:</label>
                    <select name="Department" id="dept" required>
                        <option value="<?php echo htmlspecialchars($data['department_id']) ?> selected">
                            <?php
                            foreach ($departments as $department) {
                                if ($data['department_id'] === $department['dept_id']) {
                                    echo '<option selected value ="' .$department['id'].'">'.$department['department_name']. '</option>';
                                }
                            }

                            ?>
                        </option>
                    </select>
                </div>

                <div class="input-box">
                    <label for="Section">Section:</label>
                    <select name="Section" id="section" required>
                        <option value="<?php echo htmlspecialchars($data['section_id']); ?> selected">
                            <?php
                            foreach ($sections as $section) {
                                if ($data['section_id'] === $section['sect_id']) {
                                    echo '<option selected value ="' .$section['section_id'].'">'.$section['section_name']. '</option>';
                                }
                            }

                            ?>
                        </option>
                    </select>
                </div>

            </div>

            <div class="two">

                <div class="input-box">
                    <label for="Position:"> Position:</label>
                    <?php
                    if (!empty($positions)) {
                        echo '<select name="Position" id="pos">';
                        echo '<option selected>Select a position</option>';
                        foreach ($positions as $pos) {
                            echo '<option value="' . htmlspecialchars($pos['title']) . '"';
                            if ($pos['title'] == $data['position']) echo ' selected';
                            echo '>' . htmlspecialchars($pos['title']) . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo '<input type="text" name="Position" placeholder="position" required>';
                    }
                    ?>
                </div>


                <div class="input-box" id="super">
                    <label for="Supervisor:">Reporting to:</label>
                    <?php
                    if (!empty($employees)) {
                        echo '<select name="Supervisor" id="pos">';
                        echo '<option>Select reporting to</option>';
                        foreach ($employees as $employeeOption) {
                            echo '<option value="' . htmlspecialchars($employeeOption['employee_id']) . '"';
                            if ($employeeOption['employee_id'] === $data['reporting_to']) echo ' selected';
                            echo '>' . htmlspecialchars($employeeOption['f_name'] . " " . $employeeOption['l_name']) . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo '<input type="text" name="Supervisor" placeholder="position" required>';
                    }
                    ?>
                </div>

                <div class="input-box">
                    <label for="Employed-date:">Employed-date:</label>
                    <input type="date" name="Employed-date" id="" placeholder="employed-date" value="<?php echo htmlspecialchars($data['employed_date']); ?>">
                </div>

            </div>

            <div class="form-actions" id="btn">
                <button type="submit" id="create-btn" class="btn">Save</button>
                <button type="reset">Cancel</button>
            </div>

    </div>


    </form>
    </div>
</body>

</html>
<script src="./js/jquery-3.7.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#zone').on('change', function() {
            var zone = $(this).val()
            if (zone) {

                $.getJSON('../helpers/departs_helper.php', {
                    zone: zone

                }, function(data) {
                    $('#dept').empty(); // Clear existing options
                    $('#dept').append('<option value="">Select a Department</option>'); // Default option


                    $.each(data, function(key, value) {
                        $('#dept').append('<option value="' + value['dept_id'] + '">' + value['department_name'] + '</option>');
                    });
                });
            } else {
                $('#dept').empty();
                $('#dept').append('<input type="text" name="Department">');
            }


        });


        $('#dept').on('change', function() {
            var department = $(this).val()
            if (department) {
                $.getJSON('../helpers/sects_helper.php', {
                        department: department
                    },
                    function(data) {


                        $('#section').empty(); // Clear existing options
                        $('#section').append('<option value="">Select a Section</option>');

                        $.each(data, function(key, value) {

                            $('#section').append('<option value="' + value['sect_id'] + '">' + value['section_name'] + '</option>');
                        });
                    })
            } else {
                $('#section').empty();
                $('#section').append('<input type="text" name="Department">');
            }
        });
    });
</script>