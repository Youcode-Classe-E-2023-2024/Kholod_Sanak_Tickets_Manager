<?php

require_once '../../config/Database.php';
require_once "../../model/Comment.php";

$ticket = new Comment();

$ticket_id = $_SESSION["id_ticket"];

if (isset($_POST["comment"])) {
    // Form was submitted, process the data
    $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id = $_POST["id_user"];
    $ticket_id = $_POST["id_ticket"];
    if ($comment !== "") {
        $ticket->insertComment($comment, $user_id, $ticket_id);
    }
    // Send a response back to the client (this is just an example)
}


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


