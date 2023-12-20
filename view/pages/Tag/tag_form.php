<?php
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Add Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/css/select2.min.css" />

    <!-- Add Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/js/select2.min.js" defer></script>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">Tag Form</p>
                    </div>
                    <!-- Form Title -->
                    <div class="lg:col-span-2">
                        <form action="../../../controller/Tag/add_tag.php" method="POST">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="title">Tag libelle</label>
                                <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
                            </div>
                            <!-- Submit button -->
                            <div class="md:col-span-5 text-right">
                                <div class="inline-flex items-end">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <a href="../../../controller/Tag/display_tags.php"  class="md:absolute bottom-0 right-0 p-4 float-right">
            <img src="../../../img/logo.png" alt="back to dashboard" class="transition-all rounded-full w-14 -rotate-45 hover:shadow-sm shadow-lg ring hover:ring-4 ring-white">
        </a>
    </div>
</div>


</body>

</html>

