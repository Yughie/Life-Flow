<?php
// Start the session
if (!isset($_SESSION)) {
    session_start();
}

/*
$servername = "db4free.net";
$username = "lifeflow";
$password = "2023LifeFlowProject!";
$database = "lifeflow_db"; 
*/

$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db"; 

$connect = mysqli_connect($servername, $username, $password, $database);

// Get user input, variable setup
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

// Check if the user is signing up as a recipient
if ($recip_username && $recip_email && $recip_pass && $recip_pass === $recip_confirmPass) {
    // Check if the recipient username already exists
    $query = mysqli_query($connect, "SELECT * FROM recipientsignup_tbl WHERE recip_username='$recip_username'");
    if (mysqli_num_rows($query) > 0) {
        // Username already taken
        echo "<script language='javascript'>alert('Username is already taken. Please choose a different username.')</script>";
        echo "<script>window.location.href='index.html';</script>";
        exit();
    }
    
    // Check if the email is already in use
    $query = mysqli_query($connect, "SELECT * FROM recipientsignup_tbl WHERE recip_email='$recip_email'");
    if (mysqli_num_rows($query) > 0) {
        // Email already in use
        echo "<script language='javascript'>alert('E-mail is already registered.')</script>";
        echo "<script>window.location.href='index.html';</script>";
        exit();
    }
    
    // Insert into the table
    $query = mysqli_query($connect, "INSERT INTO recipientsignup_tbl(recip_username, recip_email, recip_pass) VALUES('$recip_username', '$recip_email', '$recip_pass')");
    
    // Set session variable to indicate user is signed in as a recipient
    $_SESSION['is_signed_in_recipient'] = true;

    // username retrieval in regform
    $_SESSION['recip_username'] = $recip_username;
    
    // Redirect to the recipient's account page
    header('Location: Registration-Forms/recipient-registration.html');
    exit();
}

// Check if the user is signing up as a donor
if ($don_username && $don_email && $don_pass && $don_pass === $don_confirmPass) {
    // Check if the donor username already exists
    $query = mysqli_query($connect, "SELECT * FROM donorsignup_tbl WHERE don_username='$don_username'");
    if (mysqli_num_rows($query) > 0) {
        // Username already taken
        echo "<script language='javascript'>alert('Username is already taken. Please choose a different username.')</script>";
        echo "<script>window.location.href='index.html';</script>";
        exit();
    }
    
    // Check if the email is already in use
    $query = mysqli_query($connect, "SELECT * FROM donorsignup_tbl WHERE don_email='$don_email'");
    if (mysqli_num_rows($query) > 0) {
        // Email already in use
        echo "<script language='javascript'>alert('E-mail is already registered.')</script>";
        echo "<script>window.location.href='index.html';</script>";
        exit();
    }
    
    // Insert into the table
    $query = mysqli_query($connect, "INSERT INTO donorsignup_tbl(don_username, don_email, don_pass) VALUES('$don_username', '$don_email', '$don_pass')");
    
    // Set session variable to indicate user is signed in as a donor
    $_SESSION['is_signed_in_donor'] = true;

    // username retrieval in regform
    $_SESSION['don_username'] = $don_username;
    
    // Redirect to the donor's account page
    header('Location: Registration-Forms/donor-registration.html');
    exit();
}

// If passwords don't match for recipient sign up
if ($recip_username && $recip_email && $recip_pass && $recip_pass !== $recip_confirmPass) {
    echo "<script language='javascript'>alert('Passwords do not match, please try again.')</script>";
    echo "<script>window.location.href='index.html';</script>";
    exit();
}

// If passwords don't match for donor sign up
if ($don_username && $don_email && $don_pass && $don_pass !== $don_confirmPass) {
    echo "<script language='javascript'>alert('Passwords do not match, please try again.')</script>";
    echo "<script>window.location.href='index.html';</script>";
    exit();
}
?>
