<?php
require_once '../../config/Database.php';
require_once "../../model/Ticket.php";
require_once "../../model/Tag.php";

session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Instantiate the Ticket and Tag classes
    $ticketManager = new Ticket();
    $tagManager = new Tag();

    // ... (your existing code)

    // Add the ticket
    $ticketId = $ticketManager->addTicket('hello', 'description', 'Urgent', 'Done', date('Y-m-d H:i:s'), '2024-01-10', 'lili', '1');

    // Display the result
    var_dump($ticketId);

    // ... (the rest of your code)
}
?>
