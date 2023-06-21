<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["pass"]) ? $_POST["pass"] : "";

    // Check if the user is logging in as an admin
    if ($username === "admin" && $password === "adminlogin") {
        // Redirect to the admin dashboard
        $_SESSION['is_admin_logged_in'] = true;
        $_SESSION['admin_loggedin'] = $username;
        header('Location: Admin-Dashboard/adminDashboard.php');
        exit();
    }

    $donquery = "SELECT * FROM donorsignup_tbl WHERE don_username='$username' AND don_pass='$password'";
    $donresult = mysqli_query($connect, $donquery);

    if ($donresult && mysqli_num_rows($donresult) > 0) {
        // Login successful
        $_SESSION['is_signed_in_donor'] = true;
        $_SESSION['don_username'] = $username;
        // Redirect to the recipient dashboard
        header('Location: Donor-Dashboard/donor-dashboard.php');
        exit();
    }

    $recipquery = "SELECT * FROM recipientsignup_tbl WHERE recip_username='$username' AND recip_pass='$password'";
    $recipresult = mysqli_query($connect, $recipquery);

    if ($recipresult && mysqli_num_rows($recipresult) > 0) {
        // Login successful
        $_SESSION['is_signed_in_recipient'] = true;
        $_SESSION['recip_username'] = $username;
        // Redirect to the recipient dashboard
        header('Location: Recipient-Dashboard/recipient-dashboard.php');
        exit();
    }

    // Login failed
    echo "<script>alert('Invalid username or password. Please try again.');</script>";
    echo "<script>location.href = 'index.html';</script>";
}
?>
