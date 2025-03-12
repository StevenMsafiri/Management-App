
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $data['page_title']?></title>
</head>

<body class="bg-gray-200 w-full h-screen flex flex-col items-center justify-center">

    <div class="bg-white w-full p-8">
        <div class="w-7/12 mx-auto">
            <div class="">
                <div class="title">
                    <h2 id="title">PLEASE LOG ON</h2>
                </div>
            </div>

            <form class="" method="POST">
                <div class="flex gap-8 my-4 items-center">
                    <label for="username">Username</label>
                    <input class = "w-full py-2" type="text" name="username">
                </div>
                <div class="flex gap-8 my-4 items-center">
                    <label for="password">Password</label>
                    <input class ="w-full py-2 " type="password" name="password">
                </div>

                <div class="flex justify-end">
                    <button class="bg-blue-400 py-2 w-full" type="submit" name="submit" id="login-btn">Log on</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>