<?php

require_once(__DIR__ . '/../config/Database.php');
require_once 'TicketTagAssociation.php';

class Tag {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }


    public function setupTable() {
        // Create the tag table if it doesn't exist
        $query = "CREATE TABLE IF NOT EXISTS tag (
            id_tag INT AUTO_INCREMENT PRIMARY KEY,
            libelle VARCHAR(255) NOT NULL
        )";

        $this->db->query($query);
        $this->db->execute();

        $defaultTags = ['documentation', 'bug', 'question', 'invalid', 'enhancement', 'help wanted'];

        foreach ($defaultTags as $tag) {
            $this->addTag($tag);
        }
    }

    // Method to add a single tag
    public function addTag($tagName) {
        $query = "INSERT INTO tag (libelle) VALUES (:tagName)";
        $this->db->query($query);
        $this->db->bind(':tagName', $tagName);
        $this->db->execute();
    }
    /// get all tags
    ///
    public function getAllTags()
    {
        $this->db->query("SELECT * FROM tag");
        return $this->db->resultSet();
    }

   ///////////////////// Assign Tags
    ///
    //////////////////////////////       Assign Tags to Ticket          ///////////////////////////////////

    public function assignTagsToTicket($ticketId, $selectedTags) {


        foreach ($selectedTags as $tagId) {
            $query = "INSERT INTO ticket_tag (ticket_id, tag_id)
                      SELECT t.id_ticket, tt.id_tag
                      FROM ticket t
                      JOIN tag tt ON tt.id_tag = :tagId
                      WHERE t.id_ticket = :ticketId";

            // Debugging statement
            echo "Debugging: SQL Query: " . $query . "<br>";

            // Execute the query with proper bindings
            $this->db->query($query);
            $this->db->bind(':ticketId', $ticketId);
            $this->db->bind(':tagId', $tagId);
            $this->db->execute();
        }

        // Debugging statement
        echo "Debugging: Tags assigned successfully<br>";

        // Return some indication of success (if applicable)
        return "Tags assigned successfully";
    }


    ///////////////////////////              Get tags             /////////////////////////////////////////
    ///
    public function getTagsForTicket($ticketId) {


            $query = "SELECT tag.* FROM tag
                  JOIN ticket_tag ON tag.id_tag = ticket_tag.tag_id
                  WHERE ticket_tag.ticket_id = :ticketId";

            $this->db->query($query);
            $this->db->bind(':ticketId', $ticketId);

            // Debugging statement
            echo "Debugging: Binding ticketId: " . $ticketId . "<br>";

            $result = $this->db->resultSet();
            // Debugging statement
            echo "Debugging: Result from the database:<br>";
            var_dump($result);

            return $result;
        }







}
