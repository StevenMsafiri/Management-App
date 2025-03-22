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
    <form method="POST" class="space-y-6">
        <div class="flex flex-row justify-between items-center mb-4">
            <div class="text-2xl font-semibold text-gray-800 text-center">Create department</div>
            <a href="<?= ROOT.'departments'?>" class="text-gray-600 hover:text-gray-800">X</a>
        </div>
        <div>
            <label class="text-sm text-gray-700 font-medium block" for="name:">Name:</label>
            <input class="w-full block mt-1 py-2 px-3 shadow-sm rounded-md focus:border-blue-400 mb-4" type="text" name="name" >
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm text-gray-700 font-medium block" for="department_id:">Department:</label>
                <select class="w-full block mt-1 py-2 px-3 shadow-sm rounded-md focus:border-blue-500 mb-4" name="department"></select>
            </div>

            <div>
                <label class="text-sm text-gray-700 font-medium block" for="supervisor:"> Head of Section:</label>
                <select class="w-full block mt-1 py-2 px-3 shadow-sm rounded-md focus:border-blue-500 mb-4" name="supervisor"></select>
            </div>
        </div>

        <div>
            <label class="text-sm text-gray-700 font-medium block" for="description"> Description</label>
            <textarea class="w-full block rounded-md shadow-sm focus:border-blue-500 mb-4 mt-1 py-2 px-3" name="description"></textarea>
        </div>

        <div class="flex justify-end space-x-2">
            <button type="submit" id="create-btn" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create</button>
            <button type="reset" class="bg-gray-300 hover:bg-gray-400 py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Clear</button>
        </div>

    </form>
</div>
