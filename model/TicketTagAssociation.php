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

    /**
     * @param $ticketId
     * @return mixed
     */
    public function getTagsForTicket($ticketId) {
        $this->db->query("SELECT tag_id FROM ticket_tag WHERE ticket_id = :ticketId");
        $this->db->bind(':ticketId', $ticketId);

        return $this->db->resultSet();
    }





    ///////////////////////       Assign Tags to Ticket          ///////////////////////////////////
    public function assignTagsToTicket1($ticketId, $tagIds) {
        $query = "INSERT INTO ticket_tag (ticket_id, tag_id) VALUES (:ticketId, :tagId)";
        $this->db->query($query);

        foreach ($tagIds as $tagId) {
            $this->db->bind(':ticketId', $ticketId);
            $this->db->bind(':tagId', $tagId);
            $this->db->execute();
        }
    }

}
