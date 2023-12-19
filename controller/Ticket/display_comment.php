<?php

require_once '../../config/Database.php';
require_once "../../model/Comment.php";

$commentModel = new Comment();

// Check if the user is logged in and has a valid ticket ID
if (isset($_SESSION["id_ticket"])) {
    $ticket_id = $_SESSION["id_ticket"];

    // Section for retrieving all comments
    $comments = $commentModel->getCommentsForTicket($ticket_id);

    $commentsData = [];

    foreach ($comments as $oneComment) {
        $commentsData[] = array(
            "comment" => $oneComment->comment,
            "user" => $oneComment->username,
            "picture" => $oneComment->picture,
        );
    }

    // Send the comments data as JSON response to the client
    echo json_encode($commentsData);
    var_dump($commentsData);
} else {
    // Handle the case where the user is not logged in or doesn't have a valid ticket ID
    echo json_encode(["error" => "Invalid session or ticket ID"]);
}
