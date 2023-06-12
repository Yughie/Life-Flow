<?php
// to connect to remote database
$servername = "db4free.net";
$username = "lifeflow";
$password = "2023LifeFlowProject!";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

// check if connected to database (redirects to "connected")
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo "Connected";
}

// get user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recip_username = $_POST["recip_username"];
    $recip_email = $_POST["recip_email"];
    $recip_pass = $_POST["recip_pass"];
    $recip_confirmPass = $_POST["recip_confirmPass"];
}

/*  checks if passwords match
    matches = redirect to registration form
    doesn't match = nothing happens
*/
if ($recip_pass !== $recip_confirmPass) {
} else {
    header("Recipient Registration Form/recipient-registration.html");
    exit();
}


// insert user input into table
if ($recip_username && $recip_email && $recip_pass) {
    $query = mysqli_query($connect, "INSERT INTO recipient_tbl(recip_username, recip_email, recip_pass) VALUES('$recip_username', '$recip_email', '$recip_pass')");
}



?>



