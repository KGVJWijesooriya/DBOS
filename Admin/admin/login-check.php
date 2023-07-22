<?php
//authorization - Access Control
//Check Whether the user is logged in or not
session_start(); // Start session

// Make sure SITEURL is defined before using it
if (!defined('SITEURL')) {
    define('SITEURL', 'http://localhost/DBOS/Admin/'); // Change the URL to your actual website URL
}

if (!isset($_SESSION['user'])) {
    // User is not logged in
    // Redirect to login page with a message
    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access the admin panel.</div>";
    // Redirect to login page
    header('location: ' . SITEURL . 'login.php'); // Use SITEURL to construct the full URL
    exit(); // Terminate script after redirecting to avoid further execution.
}
?>
