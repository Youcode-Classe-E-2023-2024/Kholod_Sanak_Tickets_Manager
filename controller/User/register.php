<?php
require_once "../../model/User.php";

$userModel = new User();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_FILES['profile_picture'];


    // Initialize error variables
    $username_err = $email_err = $password_err = $upload_err = "";

    // Validate username
    if (empty($username)) {
        $username_err = "Username is required";
    }

    // Validate email
    if (empty($email)) {
        $email_err = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    }

    // Validate password
    if (empty($password)) {
        $password_err = "Password is required";
    } elseif (strlen($password) < 6) {
        $password_err = "Password must be at least 6 characters long";
    }

    // If no validation errors, proceed with registration
    if (empty($username_err) && empty($email_err) && empty($password_err)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Move uploaded file to a permanent location (you may need to adjust the path)

        $uploadDir = "../../uploads/";
        $uploadFile = $uploadDir . basename($photo['name']);

        if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
            if ($userModel->findUserByEmail($email)) {
                $email_err = "Email already exists";
                include_once "../../view/pages/User/register.php";
            } else {
                if ($userModel->register($username, $email, $password, $uploadFile)) {
                    header("location:../../view/pages/User/login.php?success");
                } else {
                    header("location:../../view/pages/User/register.php?error");
                }
            }
        } else {
            // Handle file upload error
            $upload_err = "File upload failed!";
            include_once "../../view/pages/User/register.php";
        }
    } else {
        // If there are validation errors, include the registration form with errors
        include_once "../../view/pages/User/register.php";
    }
}
