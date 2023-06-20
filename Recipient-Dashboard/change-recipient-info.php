<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

if (isset($_SESSION['recip_username'])) {
    $recip_username = $_SESSION['recip_username'];

    // Fetch the new form inputs
    $new_recip_username = !empty($_POST['new_recip_username']) ? $_POST['new_recip_username'] : $infoData['recip_username'];
    $new_recip_email = isset($_POST['new_recip_email']) ? $_POST['new_recip_email'] : '';


    // Check if the new username is already taken
    $existingUserQuery = mysqli_query($connect, "SELECT recip_username FROM recipient_info_tbl WHERE recip_username='$new_recip_username'");
    $existingUserCount = mysqli_num_rows($existingUserQuery);

    if (empty($new_recip_username)) {
        echo "<script>alert('Please enter a username.')</script>";
        echo "<script>location.href = 'recipient-dashboard.php';</script>";
    } elseif ($existingUserCount > 0) {
        echo "<script>alert('This username is already taken. Please choose a different one.')</script>";
        echo "<script>location.href = 'recipient-dashboard.php';</script>";
    } else {
        // Update the tables with new data
        if (empty($new_recip_email)) {
            mysqli_query($connect, "UPDATE recipientsignup_tbl SET recip_username='$new_recip_username' WHERE recip_username='$recip_username'");
            mysqli_query($connect, "UPDATE recipient_info_tbl SET recip_username='$new_recip_username' WHERE recip_username='$recip_username'");
        } else {
            mysqli_query($connect, "UPDATE recipientsignup_tbl SET recip_username='$new_recip_username', recip_email='$new_recip_email' WHERE recip_username='$recip_username'");
            mysqli_query($connect, "UPDATE recipient_info_tbl SET recip_username='$new_recip_username' WHERE recip_username='$recip_username'");
        }

        // Fetch the updated recipient information
        $updatedRecipientQuery = mysqli_query($connect, "SELECT * FROM recipient_info_tbl WHERE recip_username='$new_recip_username'");
        $recipient_info = mysqli_fetch_assoc($updatedRecipientQuery);

        // Redirect to a success page or perform any other desired action
        echo "<script>alert('Please log in again.')</script>";
        echo "<script>location.href = '../index.html';</script>";
        exit();
    }
} else {
    // Redirect to the login page if the recipient is not logged in
    header('Location: ../index.html');
    exit();
}
?>