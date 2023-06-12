<?php
// to connect to remote database
$servername = "db4free.net";
$username = "lifeflow";
$password = "2023LifeFlowProject!";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

// get user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recip_username = $_POST["recip_username"];
    $recip_email = $_POST["recip_email"];
    $recip_pass = $_POST["recip_pass"];
    $recip_confirmPass = $_POST["recip_confirmPass"];
}


// insert user input into table
if ($recip_username && $recip_email && $recip_pass && $recip_pass === $recip_confirmPass) {
    $query = mysqli_query($connect, "INSERT INTO recipientsignup_tbl(recip_username, recip_email, recip_pass) VALUES('$recip_username', '$recip_email', '$recip_pass')");
    echo "<script>window.location.href='../Recipient-Registration-Form/recipient-registration.html';</script>";
} else {
    // Passwords don't match or missing required fields
    echo "<script language='javascript'>alert('Passwords do not match, please try again.')</script>";
    echo "<script>window.location.href='Landing-Page.html';</script>";
}
?>