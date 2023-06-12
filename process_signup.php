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

// ------------ RECIPIENT SIGN UP ------------ //
// check if the recipient username already exists
if ($recip_username && $recip_email && $recip_pass && $recip_pass === $recip_confirmPass) {
    $query = mysqli_query($connect, "SELECT * FROM recipientsignup_tbl WHERE recip_username='$recip_username'");
    if (mysqli_num_rows($query) > 0) {
        // Username already taken
        echo "<script language='javascript'>alert('Username is already taken. Please choose a different username.')</script>";
        echo "<script>window.location.href='Landing-Page.html';</script>";
    } else {
        // Insert into the table
        $query = mysqli_query($connect, "INSERT INTO recipientsignup_tbl(recip_username, recip_email, recip_pass) VALUES('$recip_username', '$recip_email', '$recip_pass')");
        echo "<script>window.location.href='../Registration-Forms/recipient-registration.html';</script>";
    }
}

// if passwords don't match
if ($recip_username && $recip_email && $recip_pass && $recip_pass !== $recip_confirmPass) {
    echo "<script language='javascript'>alert('Passwords do not match, please try again.')</script>";
    echo "<script>window.location.href='Landing-Page.html';</script>";
}

// ------------ DONOR SIGN UP ------------ //
// check if the donor username already exists
if ($don_username && $don_email && $don_pass && $don_pass === $don_confirmPass) {
    $query = mysqli_query($connect, "SELECT * FROM donorsignup_tbl WHERE don_username='$don_username'");
    if (mysqli_num_rows($query) > 0) {
        // Username already taken
        echo "<script language='javascript'>alert('Username is already taken. Please choose a different username.')</script>";
        echo "<script>window.location.href='Landing-Page.html';</script>";
    } else {
        // Insert into the table
        $query = mysqli_query($connect, "INSERT INTO donorsignup_tbl(don_username, don_email, don_pass) VALUES('$don_username', '$don_email', '$don_pass')");
        echo "<script>window.location.href='../Registration-Forms/donor-registration.html';</script>";
    }
}

// if passwords don't match
if ($don_username && $don_email && $don_pass && $don_pass !== $don_confirmPass) {
    echo "<script language='javascript'>alert('Passwords do not match, please try again.')</script>";
}

?>