<?php

require_once(__DIR__ . '/../config/Database.php');
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

        // Add default tags
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
}
