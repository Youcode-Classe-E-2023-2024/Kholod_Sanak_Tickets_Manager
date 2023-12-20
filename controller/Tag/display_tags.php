<?php
require_once "../../model/Tag.php";
require_once "../../view/inc/sidebar.php";

$TagModel = new Tag();

$tags = $TagModel->getAllTags();
//var_dump($tags);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link rel="stylesheet" href="../../css/profile.css">
</head>

<body>

<div class="absolute bg-white p-8 rounded-md  w-1/2 top-0 right-0 ">
    <div class="flex items-center justify-end pb-6">
        <div class="lg:ml-40 ml-10 space-x-8">
            <form action="../../view/pages/Tag/tag_form.php" method="get">
                <button class="bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" type="submit">New Tag</button>
            </form>
        </div>
    </div>
    <div>
        <div class="flex items-center  justify-center">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto place-content-center">
                <div class="inline-block min-w-fit shadow rounded-lg overflow-hidden">
                    <table class="min-w-fit leading-normal">
                        <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Tag Number
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Libelle
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tags as $tag): ?>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $tag->id_tag; ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <?php echo $tag->libelle; ?>
                                    </p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
