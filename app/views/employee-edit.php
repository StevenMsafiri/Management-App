<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $data['title_name'] ?></title>
</head>

<body class="bg-gray-300">
<div class="container-reg w-11/12 mx-auto mt-32 bg-white p-4 lg:w-7/12">
        <button class="">X</button>
        <form method="POST" action="" class="p-8">
        <div class="title">UPDATE EMPLOYEE
            <br>
            <input type="hidden" name="id" value="<?php echo $data['employee'][0]['employee_id'] ?>">
        </div>
        <div class="flex flex-row p-2 gap-4 items-center">
            <div class="w-full flex flex-col gap-2">
                <label for="Firstname:">First Name:</label>
                <input class="bg-gray-200 py-2 indent-2" type="text" name="Firstname" id="" placeholder="First name"
                       value="<?php echo htmlspecialchars($data['employee'][0]['f_name']); ?>">
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="Second-name:">Second Name:</label>
                <input class="bg-gray-200 py-2 indent-2" type="text" name="Second-name" id="" placeholder="Second name"
                       value="<?php echo htmlspecialchars($data['employee'][0]['s_name']); ?>">
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="Lastname:"> Last Name:</label>
                <input class="bg-gray-200 py-2 indent-2" type="text" name="Lastname" id="" placeholder="Last name"
                       value="<?php echo htmlspecialchars($data['employee'][0]['l_name']); ?>">

            </div>
        </div>

        <div class="flex flex-row p-2 gap-4 items-center">
            <div class="w-full flex flex-col gap-2">
                <label for="Qualification:">Qualification:</label>
                <select class="bg-gray-200 py-2 indent-2" name="Qualification" id="qualify">
                    <option value="" selected>Select qualification</option>
                    <option value="Certificate"
                            class="value" <?php if ($data['employee'][0]['qualification'] == 'Certificate') echo 'selected'; ?>>
                        Certificate
                    </option>
                    <option value="Diploma"
                            class="value" <?php if ($data['employee'][0]['qualification'] == 'Diploma') echo 'selected'; ?>>
                        Diploma
                    </option>
                    <option value="Bachelor"
                            class="value" <?php if ($data['employee'][0]['qualification'] == 'Bachelor') echo 'selected'; ?>>
                        Bachelor
                    </option>
                    <option value="Masters"
                            class="value" <?php if ($data['employee'][0]['qualification'] == 'Masters') echo 'selected'; ?>>
                        Masters
                    </option>
                    <option value="PhD"
                            class="value" <?php if ($data['employee'][0]['qualification'] == 'PhD') echo 'selected'; ?>>
                        PhD
                    </option>
                    <option value="Other"
                            class="value" <?php if ($data['employee'][0]['qualification'] == 'Other') echo 'selected'; ?>>
                        Other
                    </option>
                </select>
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="Birthdate:">Birth Date:</label>
                <input class="bg-gray-200 py-1 indent-2" type="date" name="Birthdate" id="" placeholder="birthdate"
                       value="<?php echo htmlspecialchars($data['employee'][0]['birth_date']); ?>">
            </div>
        </div>


        <div class="flex flex-row p-2 gap-4">
            <div class="w-full flex flex-col gap-2">
                <label for="Zone">Zone:</label>
                <select class="bg-gray-200 py-2 indent-2" name="Zone" id="zone" required>
                    <option> Select Zone</option>
                    <?php
                    if (!empty($data['zones'])) {

                        foreach ($data['zones'] as $zone) {
                            echo '<option value="' . htmlspecialchars($zone['zone_code']) . '"';
                            if ($zone['zone_code'] == $data['employee'][0]['zone_code']) echo ' selected';
                            echo '>' . htmlspecialchars($zone['zone_name']) . '</option>';
                        }
                        echo '</select>';
                    }
                    ?>
            </div>

            <div class="w-full flex flex-col gap-2">
                <label for="Department">Department:</label>
                <select class="bg-gray-200 py-2 indent-2" name="Department" id="dept" required>
                    <option value="<?php echo htmlspecialchars($data['employee'][0]['department_id']) ?> selected">
                        <?php
                        foreach ($data['departments'] as $department) {
                            if ($data['employee'][0]['department_id'] === $department['dept_id']) {
                                echo '<option selected value ="' . $department['dept_id'] . '">' . $department['department_name'] . '</option>';
                            }
                        }

                        ?>
                    </option>
                </select>
            </div>

            <div class="w-full flex flex-col gap-2">
                <label for="Section">Section:</label>
                <select class="bg-gray-200 py-2 indent-2" name="Section" id="section" required>
                    <option value="<?php echo htmlspecialchars($data['employee'][0]['section_id']); ?> selected">
                        <?php
                        foreach ($data['sections'] as $section) {
                            if ($data['employee'][0]['section_id'] === $section['sect_id']) {
                                echo '<option selected value ="' . $section['sect_id'] . '">' . $section['section_name'] . '</option>';
                            }
                        }

                        ?>
                    </option>
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
                        if ($pos['title'] == $data['employee'][0]['position']) echo ' selected';
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
                        if ($employeeOption['employee_id'] === $data['employee'][0]['reporting_to']) echo ' selected';
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
                <input class="bg-gray-200 py-2 indent-2" type="date" name="Employed-date" id="" placeholder="employed-date"
                       value="<?php echo htmlspecialchars($data['employee'][0]['employed_date']); ?>">
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