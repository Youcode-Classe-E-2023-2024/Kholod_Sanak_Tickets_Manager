<?php

require_once(__DIR__ . '/../config/Database.php');

class Comment {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function setupTable() {
        $query = "CREATE TABLE IF NOT EXISTS comment (
            id_cmt INT AUTO_INCREMENT PRIMARY KEY,
            comment VARCHAR(500) NOT NULL,
            ticket_id INT,
            user_id INT,
            FOREIGN KEY (ticket_id) REFERENCES ticket(id_ticket),
            FOREIGN KEY (user_id) REFERENCES user(id_user)
        )";

        $this->db->query($query);
        $this->db->execute();
    }
    /////////////////////////////////////  Display comment for a ticket  ///////////////////////////////////////////////
    public function getCommentsForTicket($ticketId) {
        $query = "SELECT * FROM comment WHERE ticket_id = :ticket_id";
        $this->db->query($query);
        $this->db->bind(':ticket_id', $ticketId);
        $this->db->execute();

        return $this->db->resultSet();
    }

    /////////////////////////////////////  Display user comment for a ticket  ///////////////////////////////////////////////

    public function getCommentsForTicketByUser($ticketId, $userId) {
        $query = "SELECT * FROM comment WHERE ticket_id = :ticket_id AND user_id = :user_id";
        $this->db->query($query);
        $this->db->bind(':ticket_id', $ticketId);
        $this->db->bind(':user_id', $userId);
        $this->db->execute();

        return $this->db->resultSet();
    }
    /////////////////////////////////////  Create comment  ///////////////////////////////////////////////




    public function createComment($ticketId, $userId, $commentText) {
        $query = "INSERT INTO comment (comment, ticket_id, user_id) VALUES (:comment, :ticket_id, :user_id)";
        $this->db->query($query);
        $this->db->bind(':comment', $commentText);
        $this->db->bind(':ticket_id', $ticketId);
        $this->db->bind(':user_id', $userId);

        return $this->db->execute();
    }
}