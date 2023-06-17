<?php
/*
$servername = "db4free.net";
$username = "lifeflow";
$password = "2023LifeFlowProject!";
$database = "lifeflow_db";\
*/

$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $recip_firstName = $_POST["recip_firstName"];
    $recip_midName = $_POST["recip_midName"];
    $recip_lastName = $_POST["recip_lastName"];
    $recip_bDay = $_POST["recip_bDay"];
    $formatted_bDay = date('Y-m-d', strtotime($recip_bDay));
    $recip_age = $_POST["recip_age"];
    $recip_sex= isset($_POST["recip_sex"]) ? $_POST["recip_sex"] : "";
    $recip_bloodType= isset($_POST["recip_bloodType"]) ? $_POST["recip_bloodType"] : "";
    $recip_streetAdd = $_POST["recip_streetAdd"];
    $recip_city = $_POST["recip_city"];
    $recip_province = $_POST["recip_province"];
    $recip_postal = $_POST["recip_postal"];
    $recip_phoneNum = $_POST["recip_phoneNum"];
    $recip_ethnicity = isset($_POST["recip_ethnicity"]) ? $_POST["recip_ethnicity"] : "";
    //bool
    $recip_boolBlood = isset($_POST["recip_boolBlood"]) ? $_POST["recip_boolBlood"] : "";
    $recip_Urgency = $_POST["recip_Urgency"];
    $recip_neededOrgan= isset($_POST["recip_neededOrgan"]) ? $_POST["recip_neededOrgan"] : "";
    $recip_Urgency = isset($_POST["recip_Urgency"]) ? $_POST["recip_Urgency"] : ""; 


    $stmt = $connect->prepare("INSERT INTO recipient_info_tbl (recip_firstName, recip_midName, recip_lastName, recip_bDay, recip_age, recip_sex, recip_bloodType, recip_streetAdd, recip_city, recip_province, recip_postal, recip_phoneNum, recip_ethnicity, recip_boolBlood, recip_Urgency, recip_neededOrgan ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssissssssssiss", $recip_firstName, $recip_midName, $recip_lastName, $recip_bDay, $recip_age, $recip_sex, $recip_bloodType, $recip_streetAdd, $recip_city, $recip_province, $recip_postal, $recip_phoneNum, $recip_ethnicity, $recip_boolBlood, $recip_Urgency, $recip_neededOrgan);

    


    if ($stmt->execute()) {
         // Display an alert message using JavaScript
        echo '<script>alert("Register successfully!");</script>';

        // Redirect to a different page using JavaScript
        echo '<script>window.location.href = "../adminRecipient.php";</script>'; 
    }
    else{
        echo '<script>alert("Error Occur!");</script>';

        // Redirect to a different page using JavaScript
        echo '<script>window.location.href = "../adminRecipient.php";</script>'; 
    }


    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }
}




