<?php
require_once '../../config/Database.php';
require_once "../../model/Ticket.php";

$ticket = new Ticket(); // Assuming your class name is Ticket
$ticket_id = $_SESSION["id_ticket"];



$comments = $ticket->displayComments($ticket_id);

$commentsData = [];

foreach ($comments as $oneComment) {
    $commentsData[] = array(
        "comment" => $oneComment->comment,
        "user" => $oneComment->username,
        "picture" => $oneComment->picture,
    );
}

echo json_encode($commentsData);

