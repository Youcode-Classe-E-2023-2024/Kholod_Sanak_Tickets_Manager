<?php

require_once '../../config/Database.php';
require_once "../../model/Comment.php";
session_start();

$ticket = new Comment();

// Check if the user is logged in and has a valid ticket ID
if (isset($_SESSION["id_ticket"])) {
    $ticket_id = $_SESSION["id_ticket"];

    // Section for adding a new comment
    if (isset($_POST["comment"], $_POST["id_user"])) {
        $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_id = $_POST["id_user"];

        if ($comment !== "") {
            // Insert the comment into the database
            $ticket->createComment($ticket_id, $user_id, $comment);
        }
    }
    $comments = $ticket->getCommentsForTicket($ticket_id);

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
} else {
    // Handle the case where the user is not logged in or doesn't have a valid ticket ID
    echo json_encode(["error" => "Invalid session or ticket ID"]);
}
