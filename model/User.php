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
    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password) {
        $this->db->query("SELECT * FROM user WHERE user_email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($row) {
            $hashedPasswordFromDatabase = $row->password;

            if (password_verify($password, $hashedPasswordFromDatabase)) {
                // Login successful
                return ['success' => true, 'user_id' => $row->id_user];
            } else {
                // Incorrect password
                return ['success' => false, 'error' => 'Incorrect password'];
            }
        } else {
            // User not found
            return ['success' => false, 'error' => 'User not found'];
        }
    }

    ////////////////////////////       Get all users          //////////////////////////////////////////
    ///
    public function getAllUsers()
    {
        $query = "SELECT * FROM user";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    ///////////         get user
    public function getUser($userId)
    {
        $query = "SELECT * FROM user WHERE id_user = :id";
        $this->db->query($query);
        $this->db->bind(':id', $userId);
        return $this->db->single();
    }






}


