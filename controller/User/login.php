<?php

require_once "../../model/User.php";

$userModel = new User();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($userModel->login($email, $password)) {
        // Login successful
        // You might want to set session variables or redirect the user to the dashboard
        session_start();
        $_SESSION['email'] = $email;
        header("location: ../../view/pages/Ticket/dashboard.php");
        exit();
    } else {
        // Login failed
        $login_err = "Invalid username or password";
        include_once "../../view/pages/User/login.php?invalid";
    }
}


