<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

if (isset($_SESSION['don_username'])) {
    $don_username = $_SESSION['don_username'];

    // Fetch the new form inputs
    $new_don_username = !empty($_POST['new_don_username']) ? $_POST['new_don_username'] : $infoData['don_username'];
    $new_don_email = isset($_POST['new_don_email']) ? $_POST['new_don_email'] : '';


    // Check if the new username is already taken
    $existingUserQuery = mysqli_query($connect, "SELECT don_username FROM donor_info_tbl WHERE don_username='$new_don_username'");
    $existingUserCount = mysqli_num_rows($existingUserQuery);

    if (empty($new_don_username)) {
        echo "<script>alert('Please enter a username.')</script>";
        echo "<script>location.href = 'donor-dashboard.php';</script>";
    } elseif ($existingUserCount > 0) {
        echo "<script>alert('This username is already taken. Please choose a different one.')</script>";
        echo "<script>location.href = 'donor-dashboard.php';</script>";
    } else {
        // Update the tables with new data
        if (empty($new_don_email)) {
            mysqli_query($connect, "UPDATE donorsignup_tbl SET don_username='$new_don_username' WHERE don_username='$don_username'");
            mysqli_query($connect, "UPDATE donor_info_tbl SET don_username='$new_don_username' WHERE don_username='$don_username'");
        } else {
            mysqli_query($connect, "UPDATE donorsignup_tbl SET don_username='$new_don_username', don_email='$new_don_email' WHERE don_username='$don_username'");
            mysqli_query($connect, "UPDATE donor_info_tbl SET don_username='$new_don_username' WHERE don_username='$don_username'");
        }

        // Fetch the updated donor information
        $updateddonorQuery = mysqli_query($connect, "SELECT * FROM donor_info_tbl WHERE don_username='$new_don_username'");
        $donor_info = mysqli_fetch_assoc($updateddonorQuery);

        // Redirect to a success page or perform any other desired action
        echo "<script>alert('Please log in again.')</script>";
        echo "<script>location.href = '../index.html';</script>";
        exit();
    }
} else {
    // Redirect to the login page if the donor is not logged in
    header('Location: ../index.html');
    exit();
}
?>