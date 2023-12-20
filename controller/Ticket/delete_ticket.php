<?php

require_once "../../model/Ticket.php";

// Check if the ticket ID is provided in the URL
if (isset($_POST['id'])) {
    $ticketId = $_POST['id'];
    echo "Ticket ID: $ticketId";

    // Create an instance of the Ticket class
    $ticketModel = new Ticket();

    $rowCount = $ticketModel->deleteTicket($ticketId);

    if ($rowCount > 0) {
        header("Location: display_tickets.php");
        exit();
    } else {
        echo "Error deleting the ticket.";
    }
} else {
    echo "Ticket ID not provided.";
}


