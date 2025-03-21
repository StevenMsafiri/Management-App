<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $data['page_title']?></title>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-semibold text-gray-800">PLEASE LOG ON</h2>
    </div>

    <form method="POST" class="space-y-4">
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <div class="mt-1">
                <input type="text" name="username" id="username" class="w-full bg-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3">
            </div>
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1">
                <input type="password" name="password" id="password" class="w-full bg-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3">
            </div>
        </div>

        <div>
            <button type="submit" name="submit" id="login-btn" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Log on</button>
        </div>
    </form>
</div>

</body>

</html>