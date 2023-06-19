<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recip_username = isset($_POST["recip_username"]) ? $_POST["recip_username"] : "";
        $recip_pass = isset($_POST["recip_pass"]) ? $_POST["recip_pass"] : "";
        $userType = isset($_POST["userType"]) ? $_POST["userType"] : "";

        // Validate and sanitize the input

        // Check if the user is logging in as a recipient
        if ($userType === "recipient") {
            $query = "SELECT * FROM recipientsignup_tbl WHERE recip_username='$recip_username' AND recip_pass='$recip_pass'";
            $result = mysqli_query($connect, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // Login successful
                $_SESSION['is_signed_in_recipient'] = true;
                $_SESSION['recip_username'] = $recip_username;
                // Redirect to the recipient dashboard
                header('Location: Recipient-Dashboard/recipient-dashboard.php');
                exit();
            } else {
                // Login failed
                echo "<script>alert('Invalid username or password. Please try again.');</script>";
            }
        }
    }
?>
