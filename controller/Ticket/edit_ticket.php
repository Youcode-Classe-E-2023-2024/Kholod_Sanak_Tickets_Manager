<?php

require_once "../../model/Ticket.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure to validate and sanitize user inputs before updating the database

    $ticketId = $_POST['ticket_id'];
    $title = $_POST['title'];
    $assignee = $_POST['assignee'];
    $dueDate = $_POST['due_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $tags = isset($_POST['tag']) ? $_POST['tag'] : [];
    $description = $_POST['description'];

    // Update the ticket in the database (You need to implement this method in your Ticket class)
    $ticketModel = new Ticket();
    $success = $ticketModel->updateTicket($ticketId, $title, $assignee, $dueDate, $priority, $status, $description);
    var_dump($success);

    if ($success) {
        // Redirect to the display_tickets.php page or show a success message
        header("Location: display_tickets.php");
        exit();
    } else {
        // Handle the case where the update failed
        echo "Failed to update the ticket.";
    }
} else {
    // Handle the case where it's not a POST request
    echo "Invalid request method.";
}

