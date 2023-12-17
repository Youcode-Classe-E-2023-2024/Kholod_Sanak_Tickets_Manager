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
}