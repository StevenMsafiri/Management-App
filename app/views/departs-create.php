<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?=$data['page_title']?></title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        input, select,textarea {
            border: 1px solid #d1d5db;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        }
    </style>
</head>

<body class="bg-gray-100 p-8   text-gray-900 ">
<div class="w-7/12 mx-auto bg-white rounded-lg shadow-md p-6">
    <div class="flex flex-row justify-between items-center mb-4">
        <div class="text-2xl font-semibold text-gray-800 text-center">Create department</div>
        <a href="<?= ROOT.'departments'?>" class="text-gray-600 hover:text-gray-800">X</a>
    </div>

    <form method="POST" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 py-1">Department name:</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="Zone" class="block text-sm font-medium text-gray-700 py-1">Zone:</label>
                <?php
                if (!empty($data['zones'])) {
                    echo '<select name="Zone" id="zone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3">';
                    echo '<option value="">Select a Zone</option>';
                    foreach ($data['zones'] as $zone) {
                        echo '<option value="' .($zone['zone_code']) . '">' . htmlspecialchars($zone['zone_name']) . '</option>';
                    }
                    echo '</select>';
                } else {
                    echo '<input type="text" name="Zone" placeholder="Zone" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3">';
                }
                ?>
            </div>
            <div>
                <label for="Supervisor" class="block text-sm font-medium text-gray-700 py-1">Head of Department</label>
                <?php
                if (!empty($data['employees'])) {
                    echo '<select name="Supervisor" id="pos" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3">';
                    echo '<option value="">Select Head of department</option>';
                    foreach ($data['employees'] as $employee) {
                        echo '<option value="' . htmlspecialchars($employee['employee_id']) . '">' . htmlspecialchars($employee['f_name']) . " " . htmlspecialchars($employee['l_name']) . '</option>';
                    }
                    echo '</select>';
                } else {
                    echo '<input type="text" name="Supervisor" placeholder="Head of the department" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3">';
                }
                ?>
            </div>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 py-1">Description:</label>
            <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3"></textarea>
        </div>
        <div class="flex justify-end space-x-2">
            <button type="submit" id="create-btn" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create</button>
            <button type="reset" class="bg-gray-300 hover:bg-gray-400 py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Clear</button>
        </div>
    </form>
</div>

</body>

</html>