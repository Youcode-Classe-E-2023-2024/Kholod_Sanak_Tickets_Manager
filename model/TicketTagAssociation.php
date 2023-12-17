<?php
require_once(__DIR__ . '/../config/Database.php');
class TicketTagAssociation {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function setupTable() {
        $query = "CREATE TABLE IF NOT EXISTS ticket_tag (
            ticket_id INT,
            tag_id INT,
            PRIMARY KEY (ticket_id, tag_id),
            FOREIGN KEY (ticket_id) REFERENCES ticket(id_ticket),
            FOREIGN KEY (tag_id) REFERENCES tag(id_tag)
        )";

        $this->db->query($query);
        $this->db->execute();
    }
}
