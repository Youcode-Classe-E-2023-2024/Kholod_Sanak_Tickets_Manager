<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/css/select2.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>

            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">Ticket Form</p>
                    </div>
                    <!-- Form Title -->
                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
                            </div>

                            <!-- Assignee selection -->
                            <div class="md:col-span-3">
                                <label for="assignee">Add Assignee</label>
                                <select
                                    id="assignee"
                                    name="assignee"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                >
                                    <!-- Options Of Assignee -->
                                    <option value="Assignee 1">Assignee 1</option>
                                    <option value="Assignee 2">Assignee 2</option>
                                    <option value="Assignee 3">Assignee 3</option>
                                </select>
                            </div>
                            <!-- Due Date -->

                            <div class="md:col-span-2">
                                <label for="due_date">Due Date</label>
                                <input type="date" name="due_date" id="due_date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
                            </div>
                            <!-- Priority -->
                            <div class="md:col-span-3">
                                <label for="priority">Priority</label>
                                <select
                                    id="priority"
                                    name="priority"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                >
                                    <!-- Options Of Priority -->
                                    <option >Priority 1</option>
                                    <option >Priority 2</option>
                                    <option >Priority 3</option>
                                </select>
                            </div>
                            <!-- Status -->
                            <div class="md:col-span-2">
                                <label for="status">Status</label>
                                <select
                                    id="status"
                                    name="status"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                >
                                    <!-- Options Of Priority -->
                                    <option >Status 1</option>
                                    <option >Status 2</option>
                                    <option >Status 3</option>
                                </select>
                            </div>
                            <!-- Form Description -->
                            <div class="md:col-span-5">
                                <label for="description">Description</label>
                                <input type="text" name="description" id="description" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"   />
                            </div>
                            <!-- Submit button-->
                            <div class="md:col-span-5 text-right">
                                <div class="inline-flex items-end">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="<?php echo URLROOT;?>\app\views\pages\dashboard.php"  class="md:absolute bottom-0 right-0 p-4 float-right">
            <img src="<?php echo URLROOT;?>\public\img\logo.png" alt="back to dashboard" class="transition-all rounded-full w-14 -rotate-45 hover:shadow-sm shadow-lg ring hover:ring-4 ring-white">
        </a>
    </div>
</div>
<script src="<?php echo URLROOT;?>\public\js\ticket_form.js"></script>

</body>
</html>

