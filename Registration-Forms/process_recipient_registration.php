<?php
$servername = "db4free.net";
//$servername = "localhost";
$username = "lifeflow";
//$username = "root";
$password = "2023LifeFlowProject!";
//$password = "";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $recip_firstName = $_POST["recip_firstName"];
    $recip_midName = $_POST["recip_midName"];
    $recip_lastName = $_POST["recip_lastName"];
    $recip_bDay = $_POST["recip_bDay"];
    $formatted_bDay = date('Y-m-d', strtotime($recip_bDay));
    $recip_age = $_POST["recip_age"];
    $recip_sex= $_POST["recip_sex"];
    $recip_bloodType= $_POST["recip_bloodType"];
    $recip_streetAdd = $_POST["recip_streetAdd"];
    $recip_city = $_POST["recip_city"];
    $recip_province = $_POST["recip_province"];
    $recip_postal = $_POST["recip_postal"];
    $recip_phoneNum = $_POST["recip_phoneNum"];
    $recip_ethnicity = $_POST["recip_ethnicity"];
    //bool
    $recip_boolBlood = isset($_POST["recip_boolBlood"]) ? 1 : 0;
    $recip_bloodUrgency = $_POST["recip_bloodUrgency"];
    $recip_neededOrgan= isset($_POST["recip_neededOrgan"]) ? $_POST["recip_neededOrgan"] : "";
    $recip_organUrgency = $_POST["recip_organUrgency"];


    $stmt = $connect->prepare("INSERT INTO recipient_info_tbl (recip_firstName, recip_midName, recip_lastName, recip_bDay, recip_age, recip_sex, recip_bloodType, recip_streetAdd, recip_city, recip_province, recip_postal, recip_phoneNum, recip_ethnicity, recip_boolBlood, recip_bloodUrgency, recip_neededOrgan, recip_organUrgency) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssisssssssisss", $recip_firstName, $recip_midName, $recip_lastName, $recip_bDay, $recip_age, $recip_sex, $recip_bloodType, $recip_streetAdd, $recip_city, $recip_province, $recip_postal, $recip_phoneNum, $recip_ethnicity, $recip_boolBlood, $recip_bloodUrgency, $recip_neededOrgan, $recip_organUrgency);

    echo "sex: " . $recip_sex . "<br>";
    echo "bloodTYpe : " . $recip_bloodType . "<br>";
    echo "Ethnicity: " . $recip_ethnicity . "<br>";
    echo "needed Organ: " . $recip_neededOrgan;

    $stmt->execute();

    





    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }
}



/*
if ($recip_firstName && $recip_midName && $recip_lastName && $recip_bday && $recip_age && $recip_sex && $recip_bloodType && $recip_streetAdd && $recip_city && $recip_province && $recip_postal && $recip_phoneNum && $recip_ethnicity && $recip_giftOrgan && $recip_boolBlood || $recip_boolOrganTissue) {
    $query = "INSERT INTO recipor_info_tbl(recip_firstName, recip_midName, recip_lastName, recip_bday, recip_age, recip_sex, recip_bloodType, recip_streetAdd, recip_city, recip_province, recip_postal, recip_phoneNum, recip_ethnicity, recip_boolBlood, recip_boolOrganTissue, recip_giftOrgan) VALUES ($recip_firstName, $recip_midName, $recip_lastNam, $recip_bday, $recip_age, $recip_sex, $recip_bloodType, $recip_streetAdd, $recip_city, $recip_province, $recip_postal, $recip_phoneNum, $recip_ethnicity, $recip_boolBlood, $recip_boolOrganTissue, $recip_giftOrgan)";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssssss", $recip_firstName, $recip_midName, $recip_lastName, $recip_bday, $recip_age, $recip_sex, $recip_bloodType, $recip_streetAdd, $recip_city, $recip_province, $recip_postal, $recip_phoneNum, $recip_ethnicity, $recip_boolBlood, $recip_boolOrganTissue, $recip_giftOrgan);
    mysqli_stmt_execute($stmt);
}*/

/*
if ($recip_firstName && $recip_midName && $recip_lastName && $recip_bday && $recip_age && $recip_sex && $recip_bloodType && $recip_streetAdd && $recip_city && $recip_province && $recip_postal && $recip_phoneNum && $recip_ethnicity && $recip_giftOrgan && $recip_boolBlood || $recip_boolOrganTissue) {
    $query = mysqli_query($connect, "INSERT INTO recipor_info_tbl(recip_firstName, recip_midName, recip_lastName, recip_bday, recip_age, recip_sex, recip_bloodType, recip_streetAdd, recip_city, recip_province, recip_postal, recip_phoneNum, recip_ethnicity, recip_boolBlood, recip_boolOrganTissue, recip_giftOrgan) VALUES('$recip_firstName', '$recip_midName', '$recip_lastName', '$recip_bday', '$recip_age', '$recip_sex', '$recip_bloodType', '$recip_streetAdd', '$recip_city', '$recip_province', '$recip_postal', '$recip_phoneNum', '$recip_ethnicity', '$recip_boolBlood', '$recip_boolOrganTissue', '$recip_giftOrgan')");
}*/
?>