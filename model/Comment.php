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
    /////////////////////////////////////  Display comment  ///////////////////////////////////////////////
    function displayComments()
    {
        $sql = "SELECT comment.*, user.* FROM comment
                INNER JOIN user ON comment.user_id=user.user_id
                WHERE ticket_id=?";
        $this->db->query($sql);
        $this->db->bind(1, $this->ticket_id, PDO::PARAM_INT);
        $this->db->execute();
        $comments = $this->db->resultSet();
        return $comments;
    }
    /////////////////////////////////////  Create comment  ///////////////////////////////////////////////

    function createComment()
    {
        $sql = "INSERT INTO comment (comment, ticket_id, user_id) VALUES (?, ?, ?)";
        $this->db->query($sql);
        $this->db->bind(1, $this->comment, PDO::PARAM_STR);
        $this->db->bind(2, $this->ticket_id, PDO::PARAM_INT);
        $this->db->bind(3, $this->comment_user_id, PDO::PARAM_INT);
        $this->db->execute();
    }

}