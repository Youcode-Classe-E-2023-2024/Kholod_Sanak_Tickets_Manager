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

    ////////////////////////////////     Add  ticket     ////////////////////////////////////////////
    ///
    public function addTicket($title, $description, $priority, $status, $dateTicket, $dueDate, $assignee, $userId) {
        $this->db->query("INSERT INTO ticket (title, description, priority, status, date_ticket, due_date, assignee, user_id) 
                      VALUES (:title, :description, :priority, :status, :dateTicket, :dueDate, :assignee, :userId)");

        $this->db->bind(':title', $title);
        $this->db->bind(':description', $description);
        $this->db->bind(':priority', $priority);
        $this->db->bind(':status', $status);
        $this->db->bind(':dateTicket', $dateTicket);
        $this->db->bind(':dueDate', $dueDate);
        $this->db->bind(':assignee', $assignee);
        $this->db->bind(':userId', $userId);

        return $this->db->execute();
    }

    /////////////////////////////////     Assign ticket     ////////////////////////////////////////////
    ///

    public function assignTicket($ticketId, $newAssignee) {
        $this->db->query("UPDATE ticket SET assignee = :assignee WHERE id_ticket = :ticketId");

        $this->db->bind(':assignee', $newAssignee);
        $this->db->bind(':ticketId', $ticketId);

        return $this->db->execute();
    }



}
