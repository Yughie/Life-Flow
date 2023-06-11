<?php
// to connect to remote database
$servername = "db4free.net";
$username = "lifeflow";
$password = "2023LifeFlowProject!";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

// get user input, variable setup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recip_username = isset($_POST["recip_username"]) ? $_POST["recip_username"] : "";
    $recip_email = isset($_POST["recip_email"]) ? $_POST["recip_email"] : "";
    $recip_pass = isset($_POST["recip_pass"]) ? $_POST["recip_pass"] : "";
    $recip_confirmPass = isset($_POST["recip_confirmPass"]) ? $_POST["recip_confirmPass"] : "";

    $don_username = isset($_POST["don_username"]) ? $_POST["don_username"] : "";
    $don_email = isset($_POST["don_email"]) ? $_POST["don_email"] : "";
    $don_pass = isset($_POST["don_pass"]) ? $_POST["don_pass"] : "";
    $don_confirmPass = isset($_POST["don_confirmPass"]) ? $_POST["don_confirmPass"] : "";
}

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
}

// ------------ recipient sign up ------------ //
// insert user input into table
if ($recip_username && $recip_email && $recip_pass && $recip_pass === $recip_confirmPass) {
    $query = mysqli_query($connect, "INSERT INTO recipientsignup_tbl(recip_username, recip_email, recip_pass) VALUES('$recip_username', '$recip_email', '$recip_pass')");
    echo "<script>window.location.href='../Registration-Form/recipient-registration.html';</script>";
} 

if ($recip_username && $recip_email && $recip_pass && $recip_pass !== $recip_confirmPass) {
    echo "<script language='javascript'>alert('Passwords do not match, please try again.')</script>";
    echo "<script>window.location.href='Landing-Page.html';</script>";
} 

// ------------ donor sign up ------------ //
if ($don_username && $don_email && $don_pass && $don_pass === $don_confirmPass) {
    $query = mysqli_query($connect, "INSERT INTO donorsignup_tbl(don_username, don_email, don_pass) VALUES('$don_username', '$don_email', '$don_pass')");
    echo "<script>window.location.href='../Registration-Form/donor-registration.html';</script>";
} 

if ($don_username && $don_email && $don_pass && $don_pass !== $don_confirmPass) {
    echo "<script language='javascript'>alert('Passwords do not match, please try again.')</script>";
    echo "<script>window.location.href='Landing-Page.html';</script>";
} 
?>