<?php
require_once "../../model/Ticket.php";
require_once "../../model/Tag.php";

// Create an instance of the Ticket class
$ticketModel = new Ticket();

// Get the assignee value from the AJAX request
$assignee = $_POST['assignee'];
var_dump($assignee);

// Fetch filtered tickets from the database based on the assignee
$filteredTickets = $ticketModel->getFilteredTickets($assignee);

// Output the HTML structure for each filtered ticket
foreach ($filteredTickets as $ticket) {
    ?>
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
            <p class="text-gray-900 whitespace-no-wrap">
                <?php echo $ticket->assignee; ?>
            </p>
        </td>    </tr>
    <?php
}
?>
