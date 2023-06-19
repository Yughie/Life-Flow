<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lifeflow_db";

    $connect = mysqli_connect($servername, $username, $password, $database);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userType = "recipient";
        $recip_firstName = $_POST["recip_firstName"];
        $recip_midName = $_POST["recip_midName"];
        $recip_lastName = $_POST["recip_lastName"];
        $recip_bDay = $_POST["recip_bDay"];
        $formatted_bDay = date('Y-m-d', strtotime($recip_bDay));
        $recip_age = $_POST["recip_age"];
        $recip_sex= isset($_POST["recip_sex"]) ? $_POST["recip_sex"] : "";
        $recip_bloodType= isset($_POST["recip_bloodType"]) ? $_POST["recip_bloodType"] : "";
        $recip_streetADD = $_POST["recip_streetAdd"];
        $recip_city = $_POST["recip_city"];
        $recip_province = $_POST["recip_province"];
        $recip_postal = $_POST["recip_postal"];
        $recip_phoneNum = $_POST["recip_phoneNum"];
        $recip_ethnicity = isset($_POST["recip_ethnicity"]) ? $_POST["recip_ethnicity"] : "";
        //bool
        $recip_boolBlood = isset($_POST["recip_boolBlood"]) ? $_POST["recip_boolBlood"] : "";
        $recip_Urgency = $_POST["recip_Urgency"];
        $formatted_Urgency = date('Y-m-d', strtotime($recip_Urgency));
        $recip_neededOrgan= isset($_POST["recip_neededOrgan"]) ? $_POST["recip_neededOrgan"] : "";
        $id = isset($_POST["id"]) ? $_POST["id"] : "";


        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        }
    
    
            // Check if a new file is selected
    if ($_FILES['recip_userProfile']['size'] > 0) {
        $uploadedFile = $_FILES['recip_userProfile']['tmp_name'];
        $imageData = file_get_contents($uploadedFile);

        if ($imageData !== false) {
            // File read successful
            // ... Your existing code to update the database ...
            $stmt = $connect->prepare("UPDATE recipient_info_tbl SET  recip_firstName = ?, recip_midName = ?, recip_lastName = ?,  recip_bDay = ?, recip_age = ?, recip_sex = ?, recip_bloodType = ?, recip_streetAdd = ?, recip_city = ?, recip_province = ?, recip_postal = ?, recip_phoneNum = ?, recip_ethnicity = ?, recip_boolBlood = ?, recip_Urgency = ?, recip_neededOrgan = ?, recip_userProfile = ? WHERE recipID = ?");

            $stmt->bind_param("ssssissssssssisssi",  $recip_firstName, $recip_midName, $recip_lastName, $recip_bDay, $recip_age, $recip_sex, $recip_bloodType, $recip_streetADD, $recip_city, $recip_province, $recip_postal, $recip_phoneNum, $recip_ethnicity, $recip_boolBlood, $recip_Urgency, $recip_neededOrgan, $imageData, $id);

            $stmt->execute();
            header('Location: ../adminRecipient.php');
        }
    } else {
        // No new file selected, retain the existing image in the database

        // Update the query without the image column
        $stmt = $connect->prepare("UPDATE recipient_info_tbl SET recip_firstName = ?, recip_midName = ?, recip_lastName = ?,  recip_bDay = ?, recip_age = ?, recip_sex = ?, recip_bloodType = ?, recip_streetAdd = ?, recip_city = ?, recip_province = ?, recip_postal = ?, recip_phoneNum = ?, recip_ethnicity = ?, recip_boolBlood = ?, recip_Urgency = ?, recip_neededOrgan = ? WHERE recipID = ?");
        $stmt->bind_param("ssssissssssssissi", $recip_firstName, $recip_midName, $recip_lastName, $recip_bDay, $recip_age, $recip_sex, $recip_bloodType, $recip_streetADD, $recip_city, $recip_province, $recip_postal, $recip_phoneNum, $recip_ethnicity, $recip_boolBlood, $recip_Urgency, $recip_neededOrgan, $id);

        $stmt->execute();

        // Redirect to dashboard
        header('Location: ../adminRecipient.php');
        exit();
    }
}
            
        


?>