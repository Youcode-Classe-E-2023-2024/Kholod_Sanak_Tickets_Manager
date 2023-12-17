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



    ///////////////////////////////////  Find user by mail  ///////////////////////////////////////////////////
    ///
    public function findUserByEmail($email) {
        $this->db->query("SELECT * FROM user WHERE user_email = :email");
        $this->db->bind(':email', $email);
        $this->db->execute();
        $row = $this->db->single();

        return ($row) ? true : false;
    }

    ///////////////////////////////////  Register  ///////////////////////////////////////////////////
    ///
    public function register($username, $email, $password, $photo)
    {
        $this->db->query("INSERT INTO user (username, user_email, password, user_picture) 
                      VALUES (:username, :email, :password, :photo)");
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':photo', $photo);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
   }

    ///////////////////////////////////  Login  ///////////////////////////////////////////////////
    ///
    public function login($email, $password){
        $this->db->query("SELECT * FROM user WHERE user_email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($row) {
            $hashedPasswordFromDatabase = $row->password;
            if (password_verify($password, $hashedPasswordFromDatabase)) {
                return true;
            } else {
                return false;

            }
        } else {
            return false;
        }
    }


}


