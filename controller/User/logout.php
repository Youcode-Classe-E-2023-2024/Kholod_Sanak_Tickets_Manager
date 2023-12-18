<?php
// Start the session
session_start();

$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to the login page or any other page you prefer
header("location: ../../view/pages/User/login.php");
exit();

