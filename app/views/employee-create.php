<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $data['page_title'] ?></title>
</head>

<body class="bg-gray-300">
<div class="container-reg w-11/12 mx-auto mt-32 bg-white p-4 lg:w-7/12">
    <button class="">X</button>
    <form method="POST" action="" class="p-8">
        <div class="title">CREATE EMPLOYEE
            <br>
        </div>
        <div class="flex flex-row p-2 gap-4 items-center">
            <div class="w-full flex flex-col gap-2">
                <label for="Firstname:">First Name:</label>
                <input class="bg-gray-200 py-2 indent-2" type="text" name="Firstname" id="" placeholder="First name">
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="Second-name:">Second Name:</label>
                <input class="bg-gray-200 py-2 indent-2" type="text" name="Second-name" id="" placeholder="Second name">
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="Lastname:"> Last Name:</label>
                <input class="bg-gray-200 py-2 indent-2" type="text" name="Lastname" id="" placeholder="Last name">

            </div>
        </div>

        <div class="flex flex-row p-2 gap-4 items-center">
            <div class="w-full flex flex-col gap-2">
                <label for="Qualification:">Qualification:</label>
                <select class="bg-gray-200 py-2 indent-2" name="Qualification" id="qualify">
                    <option value="" selected>Select qualification</option>
                    <option value="Certificate">
                        Certificate
                    </option>
                    <option value="Diploma">
                        Diploma
                    </option>
                    <option value="Bachelor">
                        Bachelor
                    </option>
                    <option value="Masters">
                        Masters
                    </option>
                    <option value="PhD">
                        PhD
                    </option>
                    <option value=" Other">
                        Other
                    </option>
                </select>
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="Birthdate:">Birth Date:</label>
                <input class="bg-gray-200 py-1 indent-2" type="date" name="Birthdate" id="" placeholder="birthdate">
            </div>
        </div>


        <div class="flex flex-row p-2 gap-4">
            <div class="w-full flex flex-col gap-2">
                <label for="Zone">Zone:</label>
                <select class="bg-gray-200 py-2 indent-2" name="Zone" id="zone" required>
                    <option> Select Zone</option>
                    <?php
                        foreach ($data['zones'] as $zone) {
                            echo '<option value="' . htmlspecialchars($zone['zone_code']). '">' . htmlspecialchars($zone['zone_name']) . '</option>';
                        }
                    ?>
                </select>
            </div>


            <div class="w-full flex flex-col gap-2">
                <label for="Department">Department:</label>
                <select class="bg-gray-200 py-2 indent-2" name="Department" id="dept" required>

                    <option selected>Select a department</option>
                        <?php
                        foreach ($data['departments'] as $department) {
                                echo '<option value ="' . $department['dept_id'] . '">' . $department['department_name'] . '</option>';
                        }

                        ?>
                </select>
            </div>

            <div class="w-full flex flex-col gap-2">
                <label for="Section">Section:</label>
                <select class="bg-gray-200 py-2 indent-2" name="Section" id="section" required>
                    <option selected>Select a section </option>
                        <?php
                        foreach ($data['sections'] as $section) {
                                echo '<option value ="' . $section['sect_id'] . '">' . $section['section_name'] . '</option>';
                        }

                        ?>
                </select>
            </div>
        </div>

        <div class="flex flex-row p-2 gap-4">

            <div class="w-full flex flex-col gap-2">
                <label for="Position:"> Position:</label>
                <?php
                if (!empty($data['positions'])) {
                    echo '<select class="bg-gray-200 py-2 indent-2" name="position" id="pos">';
                    echo '<option selected>Select a position</option>';
                    foreach ($data['positions'] as $pos) {
                        echo '<option value="' . htmlspecialchars($pos['title']) . '"';
                        echo '>' . htmlspecialchars($pos['title']) . '</option>';
                    }
                    echo '</select>';
                } else {
                    echo '<input class="bg-gray-200 py-2 indent-2" type="text" name="position" placeholder="position" required>';
                }
                ?>
            </div>
            <div class="w-full flex flex-col gap-2" id="super">
                <label for="Supervisor:">Reporting to:</label>
                <?php
                if (!empty($data['employees'])) {
                    echo '<select class="bg-gray-200 py-2 indent-2" name="Supervisor" id="pos">';
                    echo '<option>Select reporting to</option>';
                    foreach ($data['employees'] as $employeeOption) {
                        echo '<option value="' . htmlspecialchars($employeeOption['employee_id']) . '"';
                        echo '>' . htmlspecialchars($employeeOption['f_name'] . " " . $employeeOption['l_name']) . '</option>';
                    }
                    echo '</select>';
                } else {
                    echo '<input type="text" name="Supervisor" placeholder="position" required>';
                }
                ?>
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="Employed-date:">Employed-date:</label>
                <input class="bg-gray-200 py-2 indent-2" type="date" name="Employed-date" id=""
                       placeholder="employed-date">
            </div>

        </div>

        <div class="form-actions" id="btn">
            <button type="submit" id="create-btn" class="btn">Save</button>
            <button type="reset">Cancel</button>
        </div>

</form>
</div>
</body>
</html>

<script>

</script>

