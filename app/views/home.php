<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $data['page_title']?></title>
</head>

<header class="mt-4 bg-blue-300 flex py-8 justify-between items-baseline">
    <div class="ml-8  text-xl font-bold">
        SERVPORTAL
    </div>

    <nav class="mr-8">
        <ul class="flex list-none gap-4 md:gap-12">
            <li class="hover:text-white"><a href="#">HOME</a></li>
            <li class="hover:text-white">STAFF</li>
            <li class="hover:text-white">REPORTS</li>
            <li class="hover:text-white">SETTINGS</li>
            <li class="hover:text-white"><a href="logout">LOGOUT</a></li>
        </ul>
    </nav>
</header>

<p class="text-xl p-4"><?= "Welcome back," . $_SESSION['username']?></p>

<body>

</body>
</html>