<?php
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


$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
