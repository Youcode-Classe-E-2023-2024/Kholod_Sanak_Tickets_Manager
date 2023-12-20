<?php

require_once(__DIR__ . '/../config/Database.php');
require_once 'TicketTagAssociation.php';
require_once 'UserTicketAssociation.php';

require_once 'Tag.php';


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
            FOREIGN KEY (user_id) REFERENCES user(id_user) ON DELETE CASCADE
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

        $this->db->execute();

        return $this->db->lastInsertId();
    }

    /////////////////////////////////     Assign ticket     ////////////////////////////////////////////
    ///
    public function assignTicket($ticketId, $newAssignee) {
        $this->db->query("UPDATE ticket SET assignee = :assignee WHERE id_ticket = :ticketId");

        $this->db->bind(':assignee', $newAssignee);
        $this->db->bind(':ticketId', $ticketId);

        return $this->db->execute();
    }
    ///////////////////////////////      Display tickets     ///////////////////////////////////////////
    ///
    public function getTickets() {
        $this->db->query("SELECT * FROM ticket ORDER BY id_ticket DESC ");
        return $this->db->resultSet();
    }


    /////////////////////////////     Display ticket value        //////////////////////////////////////////
    ///
    private function getTicketDetails1($ticketId) {
        $this->db->query("SELECT * FROM ticket WHERE id_ticket = :ticketId");
        $this->db->bind(':ticketId', $ticketId);
        return $this->db->single();
    }


    private function getTicketDetails($ticketId) {
        $this->db->query("SELECT t.id_ticket, t.title, t.description, t.priority, t.status, t.date_ticket, t.due_date, t.assignee, t.user_id, u.id_user AS user_id
                      FROM ticket t
                      JOIN user u ON t.user_id = u.id_user
                      WHERE t.id_ticket = :ticketId");
        $this->db->bind(':ticketId', $ticketId);
        return $this->db->single();
    }



    public function getTicketAttributes($ticketId)
    {
        // Assuming you have a method to retrieve ticket details from the database
        $ticketDetails = $this->getTicketDetails1($ticketId);

        if ($ticketDetails) {
            // Convert the object to an array
            $ticketDetailsArray = json_decode(json_encode($ticketDetails), true);
            //var_dump($ticketDetails);

            // Return ticket details as an associative array
            return $ticketDetailsArray;
        } else {
            // Handle case where ticket details are not found
            return ['error' => 'Ticket not found.'];
        }
    }


    //////////////////////////////         Get Ticket tags        /////////////////////////:////////////////
    /////
    public function getTags($ticketId) {
        $ticketTagAssociation = new TicketTagAssociation();

        $tags = $ticketTagAssociation->getTagsForTicket($ticketId);
       // print_r($tags);
        return $tags;

    }

    //////////////////////////////         Get Ticket users       /////////////////////////:////////////////
    public function getUsers($ticketId) {
        $UserTicketAssociation = new UserTicketAssociation();

        $users = $UserTicketAssociation->getUsersForTicket($ticketId);
        // print_r($tags);
        return $users;

    }

    ///////////////////////////////      filter tickets        //////////////////////////////////////////:
    public function getFilteredTickets($assignee)
    {
        $this->db->query("SELECT * FROM ticket WHERE assignee = :assignee ORDER BY id_ticket DESC");
        $this->db->bind(':assignee', $assignee);

        return $this->db->resultSet();
    }


    //////////////////////////////         Get Ticket id       /////////////////////////:////////////////

    public function getTicketById($ticketId) {
        $this->db->query("SELECT * FROM ticket WHERE id_ticket = :ticket_id");
        $this->db->bind(':ticket_id', $ticketId);

        return $this->db->single();
    }

    ///////////////////////////////         Update ticket               /////////////////////////////////////
    ///
    public function updateTicket($ticketId, $title, $assignee, $dueDate, $priority, $status, $description) {
        $this->db->query("UPDATE ticket 
                          SET title = :title,
                              assignee = :assignee,
                              due_date = :due_date,
                              priority = :priority,
                              status = :status,
                              description = :description
                          WHERE id_ticket = :ticket_id");

        $this->db->bind(':ticket_id', $ticketId);
        $this->db->bind(':title', $title);
        $this->db->bind(':assignee', $assignee);
        $this->db->bind(':due_date', $dueDate);
        $this->db->bind(':priority', $priority);
        $this->db->bind(':status', $status);
        $this->db->bind(':description', $description);

        $this->db->execute();

        return $this->db->rowCount();
    }

    //////////////////////////////////       Delete Ticket       //////////////////////////////////////////
    public function deleteTicket($ticketId) {
        $this->db->query("DELETE FROM ticket WHERE id_ticket = :ticket_id");
        $this->db->bind(':ticket_id', $ticketId);

        $this->db->execute();

        return $this->db->rowCount();
    }






}
