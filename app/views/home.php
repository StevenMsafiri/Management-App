
<?php

include "../app/views/head.php";
include "../app/views/navbar.php";

?>

<div class="container mx-auto px-4 py-8">
    <p class="text-2xl font-semibold mb-4">Welcome back, <?= htmlspecialchars($_SESSION['username']) ?></p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-2">Total Employees</h2>
            <p class="text-3xl font-bold"><?= htmlspecialchars(count($data['employees'])) ?></p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-2">Recent Reports</h2>
            <!--            <p class="text-3xl font-bold">--><?php //= htmlspecialchars($data['recent_reports']) ?><!--</p>-->
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-2">System Status</h2>
            <p class="text-3xl font-bold text-green-500">Online</p>
        </div>
    </div>

</div>

<body>
<main>
</main>
</body>

</html>