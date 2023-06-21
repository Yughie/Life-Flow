<?php
session_start();

// Check if the user is logged in as admin
if (isset($_SESSION['is_admin_logged_in'])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();
    
    // Redirect the admin to the login page
    header('Location: index.html');
    exit();
} else {
    // If the admin is not logged in, redirect to the index page
    header('Location: index.html');
    exit();
}
?>