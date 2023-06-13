<?php

$servername = "db4free.net";
$username = "lifeflow";
$password = "2023LifeFlowProject!";
$database = "lifeflow_db";

$connect = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recip_firstName = filter_input(INPUT_POST, "recip_firstName", FILTER_SANITIZE_STRING);
    $recip_midName = filter_input(INPUT_POST, "recip_midName", FILTER_SANITIZE_STRING);
    $recip_lastName = filter_input(INPUT_POST, "recip_lastName", FILTER_SANITIZE_STRING);
    $recip_bDay = filter_input(INPUT_POST, "recip_bDay", FILTER_SANITIZE_STRING);
    $recip_age = filter_input(INPUT_POST, "recip_age", FILTER_SANITIZE_NUMBER_INT);
    $recip_sex = filter_input(INPUT_POST, "recip_sex", FILTER_SANITIZE_STRING);
    $recip_bloodType = filter_input(INPUT_POST, "recip_bloodType", FILTER_SANITIZE_STRING);
    $recip_streetAdd = filter_input(INPUT_POST, "recip_streetAdd", FILTER_SANITIZE_STRING);
    $recip_city =filter_input(INPUT_POST, "recip_city", FILTER_SANITIZE_STRING);
    $recip_province = filter_input(INPUT_POST, "recip_province", FILTER_SANITIZE_STRING);
    $recip_postal = filter_input(INPUT_POST, "recip_postal", FILTER_SANITIZE_STRING);
    $recip_phoneNum = filter_input(INPUT_POST, "recip_phoneNum", FILTER_SANITIZE_STRING);
    $recip_ethnicity = filter_input(INPUT_POST, "recip_ethnicity", FILTER_SANITIZE_STRING);
    $recip_boolBlood = filter_input(INPUT_POST, "recip_boolBlood", FILTER_SANITIZE_BOOLEAN);
    $recip_bloodUrgency = filter_input(INPUT_POST, "recip_bloodUrgency", FILTER_SANITIZE_STRING);
    $recip_boolOrganTissue = filter_input(INPUT_POST, "recip_boolOrganTissue", FILTER_SANITIZE_BOOLEAN);
    $recip_neededOrgan = filter_input(INPUT_POST, "recip_neededOrgan", FILTER_SANITIZE_STRING);
    $recip_organUrgency = filter_input(INPUT_POST, "recip_organUrgency", FILTER_SANITIZE_STRING);
}

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
}

$stmt = $connect->prepare("INSERT INTO Recipient_tbl (recip_firstName, recip_midName, recip_lastName, recip_bDay, recip_age, recip_sex, recip_bloodType, recip_streetAdd, recip_city, recip_province, recip_postal, recip_phoneNum, recip_ethnicity, recip_boolBlood, recip_bloodUrgency, recip_boolOrganTissue, recip_neededOrgan, recip_organUrgency) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssissssssssisiss", $recip_firstName, $recip_midName, $recip_lastName, $recip_bDay, $recip_age, $recip_sex, $recip_bloodType, $recip_streetAdd, $recip_city, $recip_province, $recip_postal, $recip_phoneNum, $recip_ethnicity, $recip_boolBlood, $recip_bloodUrgency, $recip_boolOrganTissue, $recip_neededOrgan, $recip_organUrgency);


$stmt->execute();


