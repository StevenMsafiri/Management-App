<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/eforms.css">
    <title>Registration Form</title>
</head>

<body>

    <?php

    use controllers\Employees;
    use controllers\Positions;
    use controllers\Zones;

    include "./partials/nav.php";
    include_once '../controllers/Employees.php';
    include_once '../controllers/Positions.php';
    include_once '../controllers/Zones.php';
    include_once '../helpers/session_helper.php';

    $employeesController = new Employees();
    $positionsController = new Positions();
    $zonesController = new Zones();

    $employees = $employeesController->read();
    $positions = $positionsController->getAllPositions();
    $zones = $zonesController->getAllzones();

    ?>

    <div class="container-reg">
        <a href="./employees.php" class="go-back">X</a>
        <form method="POST">
            <input type="hidden" name="is_update" value="0">
            <div class="form-content">
                <div class="title">Register Employee</div>
                <?php flash("create") ?>
                <div class=" two">
                    <div class="input-box">
                        <label for="Firstname:">First Name:</label>
                        <input type="text" name="Firstname" id="" placeholder="First name" required>
                    </div>
                    <div class="input-box">
                        <label for="Second-name:">Second Name:</label>
                        <input type="text" name="Second-name" id="" placeholder="Second name" required>
                    </div>

                    <div class="input-box">
                        <label for="Lastname:"> Last Name:</label>
                        <input type="text" name="Lastname" id="" placeholder="Last name" required>
                    </div>

                </div>

                <div class="two">

                    <div class="input-box">
                        <label for="Qualification:">Qualification:</label>
                        <select type="text" name="Qualification" id="qualify">
                            <option value="" selected>Select qualification</option>
                            <option value="Certificate" class="value">Certificate</option>
                            <option value="Diploma" class="value">Diploma</option>
                            <option value="Bachelor" class="value">Bachelor</option>
                            <option value="Masters" class="value">Masters</option>
                            <option value="PhD" class="value">PhD</option>
                            <option value="Other" class="value">Other</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <label for="Birthdate:">Birth Date:</label>
                        <input type="date" name="Birthdate" id="" placeholder="birthdate" required>
                    </div>

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

                    <div class="input-box">
                        <label for="Department">Department:</label>
                        <select name="Department" id="dept" required>
                            <option value="">Select a Department</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <label for="Section">Section:</label>
                        <select name="Section" id="section" required>
                            <option value="">Select a section</option>
                        </select>
                    </div>

                </div>

                <div class="two">

                    <div class="input-box">
                        <label for="Position:"> Position:</label>
                        <?php
                        if (!empty($positions)) {
                            echo '<select name="Position" id="pos">';
                            echo '<option selected> Select a position </option>';
                            foreach ($positions as $pos) {
                                echo '<option value="' . htmlspecialchars($pos['title']) . '">' . htmlspecialchars($pos['title']) . '</option>';
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
                            echo '<option selected> Select reporting to </option>';
                            foreach ($employees as $employee) {
                                echo '<option value="' . htmlspecialchars($employee['employee_id']) . '">' . htmlspecialchars($employee['f_name'] . " " . $employee['l_name']) . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo '<input type="text" name="Zone" placeholder="position" required>';
                        }
                        ?>
                    </div>

                    <div class="input-box">
                        <label for="Employed-date:">Employed-date:</label>
                        <input type="date" name="Employed-date" id="" required>
                    </div>

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

<script src="./js/jquery-3.7.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#zone').on('change', function() {
            var zone = $(this).val()
            if (zone) {
                $.getJSON('../helpers/departs_helper.php', {
                    zone: zone

                }, function(data) {
                    $('#dept').empty();
                    $('#dept').append('<option value="">Select a Department</option>');

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