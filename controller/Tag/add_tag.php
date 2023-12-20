<?php
require_once '../../config/Database.php';
require_once "../../model/Tag.php";

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tagManager = new Tag();

    $tagName = $_POST['name'];
    $tagId = $tagManager->addTagLibelle($tagName);

    if ($tagId) {
        header("location: display_tags.php");
    exit();
} else {
    // Error adding the ticket
    echo "Error adding the ticket.";
}
}
