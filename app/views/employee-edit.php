<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@latest"></script>
    <title><?= $data['page_title'] ?></title>
</head>
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
</style>
</head>

<body class="bg-gray-100 font-sans antialiased">
<div class="container-reg w-11/12 mx-auto mt-20 bg-white rounded-lg shadow-lg p-6 lg:w-8/12" ">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-semibold text-gray-800">Update Employee</h2>
        <a href="<?= ROOT.'employees'?>" class="text-gray-600 hover:text-gray-800 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
    </div>
    <form method="POST" action="" class="space-y-6">
        <input type="hidden" name="id" value="<?php echo $data['employee'][0]['employee_id'] ?>">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label for="Firstname" class="block text-sm font-medium text-gray-700">First Name:</label>
                <input type="text" name="Firstname" id="Firstname" placeholder="First name"
                       value="<?php echo htmlspecialchars($data['employee'][0]['f_name']); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                       style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                />
            </div>
            <div class="space-y-2">
                <label for="Second-name" class="block text-sm font-medium text-gray-700">Second Name:</label>
                <input type="text" name="Second-name" id="Second-name" placeholder="Second name"
                       value="<?php echo htmlspecialchars($data['employee'][0]['s_name']); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                       style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                />
            </div>
            <div class="space-y-2">
                <label for="Lastname" class="block text-sm font-medium text-gray-700">Last Name:</label>
                <input type="text" name="Lastname" id="Lastname" placeholder="Last name"
                       value="<?php echo htmlspecialchars($data['employee'][0]['l_name']); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                       style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label for="Qualification" class="block text-sm font-medium text-gray-700">Qualification:</label>
                <select name="Qualification" id="qualify"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                        style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                >
                    <option value="">Select qualification</option>
                    <option value="Certificate" <?php if ($data['employee'][0]['qualification'] == 'Certificate') echo 'selected'; ?>>Certificate</option>
                    <option value="Diploma" <?php if ($data['employee'][0]['qualification'] == 'Diploma') echo 'selected'; ?>>Diploma</option>
                    <option value="Bachelor" <?php if ($data['employee'][0]['qualification'] == 'Bachelor') echo 'selected'; ?>>Bachelor</option>
                    <option value="Masters" <?php if ($data['employee'][0]['qualification'] == 'Masters') echo 'selected'; ?>>Masters</option>
                    <option value="PhD" <?php if ($data['employee'][0]['qualification'] == 'PhD') echo 'selected'; ?>>PhD</option>
                    <option value="Other" <?php if ($data['employee'][0]['qualification'] == 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="space-y-2">
                <label for="Birthdate" class="block text-sm font-medium text-gray-700">Birth Date:</label>
                <input type="date" name="Birthdate" id="Birthdate"
                       value="<?php echo ($data['employee'][0]['birth_date']); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                       style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label for="Zone" class="block text-sm font-medium text-gray-700">Zone:</label>
                <select name="Zone" id="zone" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                        style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                >
                    <option>Select Zone</option>
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
                </select>
            </div>
            <div class="space-y-2">
                <label for="Department" class="block text-sm font-medium text-gray-700">Department:</label>
                <select name="Department" id="dept" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                        style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                >
                    <option value="<?php echo htmlspecialchars($data['employee'][0]['department_id']) ?> selected">
                        <?php
                        foreach ($data['departments'] as $department) {
                            if ($data['employee'][0]['department_id'] === $department['dept_id']) {
                                echo '<option selected value ="' . $department['dept_id'] . '">' . htmlspecialchars($department['department_name']) . '</option>';
                            }
                        }
                        ?>
                    </option>
                </select>
            </div>
            <div class="space-y-2">
                <label for="Section" class="block text-sm font-medium text-gray-700">Section:</label>
                <select name="Section" id="section" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                        style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                >
                    <option value="<?php echo htmlspecialchars($data['employee'][0]['section_id']); ?> selected">
                        <?php
                        foreach ($data['sections'] as $section) {
                            if ($data['employee'][0]['section_id'] === $section['sect_id']) {
                                echo '<option selected value ="' . htmlspecialchars($section['sect_id']) . '">' . htmlspecialchars($section['section_name']) . '</option>';
                            }
                        }
                        ?>
                    </option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label for="Position" class="block text-sm font-medium text-gray-700">Position:</label>
                <?php
                if (!empty($data['positions'])) {
                    echo '<select name="position" id="pos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">';
                    echo '<option selected>Select a position</option>';
                    foreach ($data['positions'] as $pos) {
                        echo '<option value="' . htmlspecialchars($pos['title']) . '"';
                        if ($pos['title'] == $data['employee'][0]['position']) echo ' selected';
                        echo '>' . htmlspecialchars($pos['title']) . '</option>';
                    }
                    echo '</select>';
                } else {
                    echo '<input type="text" name="position" placeholder="position" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">';
                }
                ?>
            </div>
            <div class="space-y-2" id="super">
                <label for="Supervisor" class="block text-sm font-medium text-gray-700">Reporting to:</label>
                <?php
                if (!empty($data['employees'])) {
                    echo '<select name="Supervisor" id="pos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">';
                    echo '<option>Select reporting to</option>';
                    foreach ($data['employees'] as $employeeOption) {
                        echo '<option value="' . htmlspecialchars($employeeOption['employee_id']) . '"';
                        if ($employeeOption['employee_id'] === $data['employee'][0]['reporting_to']) echo ' selected';
                        echo '>' . htmlspecialchars($employeeOption['f_name'] . " " . $employeeOption['l_name']) . '</option>';
                    }
                    echo '</select>';
                } else {
                    echo '<input type="text" name="Supervisor" placeholder="position" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">';
                }
                ?>
            </div>
            <div class="space-y-2">
                <label for="Employed-date" class="block text-sm font-medium text-gray-700">Employed Date:</label>
                <input type="date" name="Employed-date" id="Employed-date"
                       value="<?php echo ($data['employee'][0]['employed_date']); ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"
                       style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);"
                />
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-8">
            <button type="submit" id="create-btn"
                    class="bg-green-400 hover:bg-green-500 text-grey-500 font-semibold rounded-md shadow-md py-2.5 px-5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                    "
            >
                Save
            </button>
            <button type="reset"
                    class="bg-gray-200 hover:bg-gray-300 text-grey-500 font-semibold rounded-md shadow-md py-2.5 px-5 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50""
            >
                Cancel
            </button>
        </div>
    </form>
</div>
</body>
</html>
