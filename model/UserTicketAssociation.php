<?php

require_once(__DIR__ . '/../config/Database.php');

class UserTicketAssociation {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function setupTable() {
        $query = "CREATE TABLE IF NOT EXISTS user_ticket (
            user_id INT,
            ticket_id INT,
            PRIMARY KEY (user_id, ticket_id),
            FOREIGN KEY (user_id) REFERENCES user(id_user),
            FOREIGN KEY (ticket_id) REFERENCES ticket(id_ticket)
        )";

        $this->db->query($query);
        $this->db->execute();
    }
}
