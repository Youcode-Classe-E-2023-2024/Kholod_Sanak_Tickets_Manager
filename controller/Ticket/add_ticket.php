<?php

require_once '../../config/Database.php';
require_once "../../model/Ticket.php";
session_start();


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Instantiate the Ticket class
    $ticketManager = new Ticket();

    // Setup the ticket table if not exists
    $ticketManager->setupTable();

    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $dateTicket = date('Y-m-d H:i:s');
    $dueDate = $_POST['due_date'];
    $assignee = $_POST['assignee'];
    $userId = $_SESSION['id_user'] ;

    // Add the ticket
    if ($ticketManager->addTicket($title, $description, $priority, $status, $dateTicket, $dueDate, $assignee, $userId)) {
        // Ticket added successfully
        header("location: ../../view/inc/sidebar.php");
        exit();
    } else {
        // Error adding the ticket
        echo "Error adding the ticket.";
    }
}

