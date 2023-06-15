<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $don_username = isset($_POST["don_username"]) ? $_POST["don_username"] : "";
    $don_pass = isset($_POST["don_pass"]) ? $_POST["don_pass"] : "";
    $userType = isset($_POST["userType"]) ? $_POST["userType"] : "";

    // Validate and sanitize the input

    // Check if the user is logging in as a donor
    if ($userType === "donor") {
        $query = "SELECT * FROM donorsignup_tbl WHERE don_username='$don_username' AND don_pass='$don_pass'";
        $result = mysqli_query($connect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Login successful
            $_SESSION['is_signed_in_donor'] = true;
            header('Location: donor-account.php'); // Replace with the donor's account page
            exit();
        } else {
            // Login failed
            echo "<script>alert('Invalid username or password. Please try again.');</script>";
        }
    }
}
?>
