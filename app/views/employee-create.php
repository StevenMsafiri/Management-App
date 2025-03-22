<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans antialiased">
<div class="container-reg w-11/12 mx-auto mt-20 bg-white rounded-lg shadow-md p-6 lg:w-8/12">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-semibold text-gray-800">Create Employee</h2>
        <a href="<?= ROOT.'employees'?>" class="text-gray-600 hover:text-gray-800 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
    </div>
    <form method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label for="Firstname" class="block text-sm font-medium text-gray-700">First Name:</label>
                <input type="text" name="Firstname" id="Firstname" placeholder="First name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">
            </div>
            <div class="space-y-2">
                <label for="Second-name" class="block text-sm font-medium text-gray-700">Second Name:</label>
                <input type="text" name="Second-name" id="Second-name" placeholder="Second name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">
            </div>
            <div class="space-y-2">
                <label for="Lastname" class="block text-sm font-medium text-gray-700">Last Name:</label>
                <input type="text" name="Lastname" id="Lastname" placeholder="Last name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label for="Qualification" class="block text-sm font-medium text-gray-700">Qualification:</label>
                <select name="Qualification" id="qualify"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">
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
            <div class="space-y-2">
                <label for="Birthdate" class="block text-sm font-medium text-gray-700">Birth Date:</label>
                <input type="date" name="Birthdate" id="Birthdate"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label for="Zone" class="block text-sm font-medium text-gray-700">Zone:</label>
                <select name="Zone" id="zone" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">
                    <option>Select Zone</option>
                    <?php
                    foreach ($data['zones'] as $zone) {
                        echo '<option value="' . htmlspecialchars($zone['zone_code']) . '">' . htmlspecialchars($zone['zone_name']) . '</option>';
                    }
                    ?>
                </select>
            </div>


            <div class="space-y-2">
                <label for="Department" class="block text-sm font-medium text-gray-700">Department:</label>
                <select name="Department" id="dept" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">

                    <option selected>Select a department</option>
                    <?php
                    foreach ($data['departments'] as $department) {
                        echo '<option value ="' . $department['dept_id'] . '">' . $department['department_name'] . '</option>';
                    }

                    ?>
                </select>
            </div>

            <div class="space-y-2">
                <label for="Section" class="block text-sm font-medium text-gray-700">Section:</label>
                <select name="Section" id="section" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">
                    <option selected>Select a section </option>
                    <?php
                    foreach ($data['sections'] as $section) {
                        echo '<option value ="' . $section['sect_id'] . '">' . $section['section_name'] . '</option>';
                    }

                    ?>
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
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2" style="border: 1px solid #d1d5db; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);">
            </div>

        </div>

        <div class="flex justify-end space-x-3 mt-8">
            <button type="submit" id="create-btn"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow-md py-2.5 px-5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                Create
            </button>
            <button type="reset"
                    class="bg-gray-300 hover:bg-gray-400 hover:text-white text-gray-700 font-semibold rounded-md shadow-md py-2.5 px-5 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                Clear
            </button>
        </div>

    </form>
</div>
</body>

</html>
