<?php

require_once(__DIR__ . '/../config/Database.php');
class Tag {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function setupTable() {
        $query = "CREATE TABLE IF NOT EXISTS tag (
            id_tag INT AUTO_INCREMENT PRIMARY KEY,
            libelle VARCHAR(255) NOT NULL
        )";

        $this->db->query($query);
        $this->db->execute();
    }
}
