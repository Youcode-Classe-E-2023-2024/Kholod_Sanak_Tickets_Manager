<?php
require_once '../../config/Database.php';
require_once "../../model/Ticket.php";
require_once "../../model/Tag.php";
require_once "../../model/Ticket.php";


session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Instantiate the Ticket and Tag classes
    $ticketManager = new Ticket();
    $tagManager = new Tag();

    //$ticketManager->setupTable();
    //$tagManager->setupTable();

    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $dateTicket = date('Y-m-d H:i:s');
    $dueDate = $_POST['due_date'];
    $assignee = $_POST['assignee'];
    $userId = $_SESSION['id_user'];

    // Add the ticket
    $ticketId = $ticketManager->addTicket($title, $description, $priority, $status, $dateTicket, $dueDate, $assignee, $userId);

    if ($ticketId) {

        // Get selected tags from the form
        $selectedTags = isset($_POST['tag']) ? $_POST['tag'] : [];
        var_dump($selectedTags);

        // Assign tags to the newly added ticket
        $tagManager->assignTagsToTicket($ticketId, $selectedTags);


        header("location: ../../../controller/Ticket/display_tickets.php");
        exit();
    } else {
        // Error adding the ticket
        echo "Error adding the ticket.";
    }
}

