<?php

require_once(__DIR__ . '/../config/Database.php');


class User {
    private $db;



    public function __construct() {
        $this->db = new Database();


    }

    public function setupTable() {
        $query = "CREATE TABLE IF NOT EXISTS user (
                id_user INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                user_email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                user_picture LONGBLOB NOT NULL
              )";

        $this->db->query($query);
        $this->db->execute();
    }

    // Getter methods
    public function getUsername() {
    return $this->username;
    }

    public function getUserEmail() {
    return $this->user_email;
    }

    public function getPassword() {
    return $this->password;
    }

    public function getUserPicture() {
    return $this->user_picture;
    }

    // Setter methods
    public function setUsername($username) {
    $this->username = $username;
    }

    public function setUserEmail($user_email) {
    $this->user_email = $user_email;
    }

    public function setPassword($password) {
    $this->password = $password;
    }

    public function setUserPicture($user_picture) {
    $this->user_picture = $user_picture;
    }



}


