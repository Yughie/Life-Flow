<?php
session_start();

// Check if the logout button was clicked
if (isset($_POST['logout'])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();

    // Redirect the user to the login page
    header('Location: index.html');
    exit();
}
?>