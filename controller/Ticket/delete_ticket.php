<?php

require_once "../../model/Ticket.php";

// Check if the ticket ID is provided in the URL
if (isset($_GET['id'])) {
    $ticketId = $_GET['id'];

    // Create an instance of the Ticket class
    $ticketModel = new Ticket();

    // Attempt to delete the ticket
    $success = $ticketModel->deleteTicket($ticketId);

    if ($success) {
        header("Location: display_tickets.php");
        exit();
    } else {
        echo "Error deleting the ticket.";
    }
} else {
    echo "Ticket ID not provided.";
}


