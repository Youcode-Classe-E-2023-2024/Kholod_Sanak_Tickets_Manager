<?php

require_once "../../model/User.php";

$userModel = new User();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginResult = $userModel->login($email, $password);

    if ($loginResult['success']) {
        // Login successful
        // You might want to set session variables or redirect the user to the dashboard
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id_user'] = $loginResult['user_id'];
        header("location: ../../view/inc/sidebar.php");
        exit();
    } else {
        // Login failed
        $login_err = $loginResult['error'];
        include_once "../../view/pages/User/login.php";
        exit(); // Ensure the script stops execution after including the login page
    }
}
