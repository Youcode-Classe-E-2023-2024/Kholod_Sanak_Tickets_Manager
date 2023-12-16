<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-full overflow-hidden flex bg-gray-100">

<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<main class="flex flex-col w-full overflow-y-scroll p-6 ">
    <?php require APPROOT . '/views/pages/dashboard.php'; ?>
</main>

</body>
</html>
