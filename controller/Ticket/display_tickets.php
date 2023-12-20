<?php
require_once "../../model/Ticket.php";
require_once "../../model/Tag.php";
require_once "../../view/inc/sidebar.php";


// Create an instance of the Ticket class
$ticketModel = new Ticket();

// Fetch tickets from the database (replace this with your actual logic)
$tickets = $ticketModel->getTickets();
//var_dump($tickets);



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link rel="stylesheet" href="../../css/profile.css">
</head>
<body >

<div class="absolute bg-white p-8 rounded-md  w-fit top-0 right-0">
    <div class=" flex  justify-end pb-6">
        <!-- Search -->
        <div class='max-w-md mx-auto'>
            <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input
                        class="peer h-full w-full outline-none text-sm text-gray-700 pr-2"
                        type="text"
                        id="search"
                        placeholder="Search something.."
                        oninput="filterTickets()" />
            </div>
        </div>
        <!-- button-->
        <div class=" ml-2 space-x-8">
            <form action="../../view/pages/Ticket/ticket_form.php" method="get">
                <button class="bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" type="submit">New Ticket</button>
            </form>
        </div>
    </div>

    <!-- Afficher filtre -->
    <div id="filteredTickets">
    </div>


    <div>
<div class="flex items-center justify-end">
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto place-content-center">
        <div class="inline-block min-w-fit shadow rounded-lg overflow-hidden">
            <table class="min-w-fit leading-normal">
                <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Ticket Number
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Title
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tags
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Assignees
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Priority
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Due Date
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>

                <!-- Afficher filtre -->
                <div id="filteredTickets">
                </div>
                <div id="container">
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <?php echo $ticket->id_ticket; ?>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            <a href="../../controller/Ticket/ticket.php?id=<?php echo $ticket->id_ticket; ?>" class="text-gray-900 hover:underline">
                                <p class="text-gray-900 whitespace-no-wrap"><?php echo $ticket->title; ?></p>
                            </a>
                        </td>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <?php
                            $ticketModel = new Ticket();
                            $ticketId = $ticket->id_ticket;;

                            // Fetch tags for the current ticket
                            $tags = $ticketModel->getTags($ticketId);
                            //var_dump($tags);

                            // Display tags
                            foreach ($tags as $tag) {
                                echo '<span class="relative inline-block px-3 py-1 font-semibold text-cyan-900 leading-tight">
                    <span aria-hidden class="absolute inset-0 bg-cyan-200 opacity-50 rounded-full"></span>
                    <span class="relative">' . $tag->tag_id . '</span>
              </span>';
                            }
                            ?>
                        </td>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                <?php echo $ticket->assignee; ?>
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative"><?php echo $ticket->status; ?></span>
                                </span>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-red-500">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"></path>
                                        </svg>
                                        <span class="ml-1"><?php echo $ticket->priority; ?></span>
                                    </div>
                                </span>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                <?php echo $ticket->due_date; ?>
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a href="../../view/pages/Ticket/edit_ticket_form.php?id=<?php echo $ticket->id_ticket; ?>" class="text-indigo-600 hover:underline">Edit</a>
                            <a href="delete_ticket.php?id=<?php echo $ticket->id_ticket; ?>" class="ml-3 text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </div>
                </tbody>
            </table>
            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                <span class="text-xs xs:text-sm text-gray-900">
                    Showing 1 to <?php echo count($tickets); ?> of <?php echo count($tickets); ?> Entries
                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    <button
                        class="text-sm text-indigo-50 transition duration-150 bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-l">
                        Prev
                    </button>
                    &nbsp; &nbsp;
                    <button
                        class="text-sm text-indigo-50 transition duration-150 bg-blue-500 hover:bg-blue-700  font-semibold py-2 px-4 rounded-r">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("a#profileLink").click(function (e) {
            e.preventDefault();

            // Load profile content dynamically using AJAX
            $.ajax({
                url: '../User/profile.php',
                type: 'GET',
                success: function (data) {
                    // Update the profile content area with the loaded data
                    $('#profileContent').html(data);
                },
                error: function () {
                    alert('Error loading profile content.');
                }
            });
        });
    });
</script>

<!-- Filter -->

<script type="text/javascript">
    // Define filterTickets function outside of document.ready
    function filterTickets() {
        var assignee = $("#search").val();
        console.log(assignee);

        $.ajax({
            url: 'filter_tickets.php',
            type: 'POST',
            data: { assignee: assignee },
            success: function (data) {
                $('#filteredTickets').html(data);
                $("#container").css("display", "none");

            },
            error: function () {
                $("#container").css("display", "block");

                alert('Error loading filtered tickets.');
            }
        });
    }

    // Wrap the rest of the code in document.ready
    $(document).ready(function () {
        // Use keyup event to trigger the filter function
        $("#search").input(function () {
            filterTickets();
        });
    });
</script>



</body>
</html>
