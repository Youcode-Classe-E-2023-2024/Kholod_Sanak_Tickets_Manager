<?php

require_once(__DIR__ . '/../config/Database.php');

class Ticket {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function setupTable() {
        $query = "CREATE TABLE IF NOT EXISTS ticket (
            id_ticket INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description VARCHAR(500) NOT NULL,
            priority VARCHAR(255) NOT NULL,
            status VARCHAR(255) NOT NULL,
            date_ticket VARCHAR(50) NOT NULL, 
            due_date VARCHAR(50) NOT NULL, 
            assignee VARCHAR(255) NOT NULL,
            user_id INT,
            FOREIGN KEY (user_id) REFERENCES user(id_user)
        )";

        $this->db->query($query);
        $this->db->execute();
    }
}
