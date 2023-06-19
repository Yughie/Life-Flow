<?php
session_start();

// Check if the 'recip_username' session variable is set
if (isset($_SESSION['recip_username'])) {
    // Retrieve the 'recip_username' value
    $recip_username = $_SESSION['recip_username'];

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


        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        }
    
        // Check if the username already exists in the database
        $checkStmt = $connect->prepare("SELECT * FROM recipient_info_tbl WHERE recip_username = ?");
        $checkStmt->bind_param("s", $recip_username);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Username already exists, display an alert message
            echo "<script>alert('Account already registered.');</script>";
        } else {
            // Username doesn't exist, proceed with the registration

            $uploadedFile = $_FILES['recip_userProfile']['tmp_name']; // Get the temporary name/path of the uploaded file

            // Read the image data from the uploaded file
            $imageData = file_get_contents($uploadedFile);

            if ($imageData !== false) {
                // File read successful

                // Insert data into the database

                $stmt = $connect->prepare("INSERT INTO recipient_info_tbl (recip_username, recip_firstName, recip_midName, recip_lastName, recip_bDay, recip_age, recip_sex, recip_bloodType, recip_streetAdd, recip_city, recip_province, recip_postal, recip_phoneNum, recip_ethnicity, recip_boolBlood, recip_Urgency, recip_neededOrgan, recip_userProfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
                $stmt->bind_param("sssssissssssssisss", $recip_username, $recip_firstName, $recip_midName, $recip_lastName, $recip_bDay, $recip_age, $recip_sex, $recip_bloodType, $recip_streetADD, $recip_city, $recip_province, $recip_postal, $recip_phoneNum, $recip_ethnicity, $recip_boolBlood, $recip_Urgency, $recip_neededOrgan, $imageData);
            
                $stmt->execute();

                // Get the ID of the newly inserted row
                $newlyInsertedId = mysqli_insert_id($connect);

                // Generate the base64-encoded image string
                $base64Image = base64_encode($imageData);

                header("Location: ../Recipient-Dashboard/recipient-dashboard.php");
                exit();
            }
        }
    }
} else {
    // 'recip_username' session variable is not set, handle the case accordingly
    echo "Recipient Username not found.";
}

?>