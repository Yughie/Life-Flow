<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lifeflow_db"; 

    $connect = mysqli_connect($servername, $username, $password, $database);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userType = "donor";
        $don_firstName = $_POST["don_firstName"];
        $don_midName = $_POST["don_midName"];
        $don_lastName = $_POST["don_lastName"];
        $don_bday = isset($_POST["don_bday"]) ? $_POST["don_bday"] : ""; 
        $formatted_bday = date('Y-m-d', strtotime($don_bday));
        $don_age = $_POST["don_age"];
        $don_sex = isset($_POST["don_sex"]) ? $_POST["don_sex"] : ""; 
        $don_bloodType = isset($_POST["don_bloodType"]) ? $_POST["don_bloodType"] : "";
        $don_streetAdd = $_POST["don_streetAdd"];
        $don_city = $_POST["don_city"];
        $don_province = $_POST["don_province"];
        $don_postal = $_POST["don_postal"];
        $don_phoneNum = $_POST["don_phoneNum"];
        $don_ethnicity = isset($_POST["don_ethnicity"]) ? $_POST["don_ethnicity"] : ""; 
        echo "Ethnicity Value: " . $don_ethnicity . "<br>";
        $don_boolBlood = isset($_POST["don_boolBlood"]) ? 1 : 0;
        $don_boolOrganTissue = isset($_POST['don_boolOrganTissue']) ? 1 : 0;
        $don_giftOrgan = isset($_POST["don_giftOrgan"]) ? $_POST["don_giftOrgan"] : "";
        $isDeceased = isset($_POST['isDeceased']) ? 1 : 0;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        }

        // Get the existing image data from the database
        $existingImageData = null;
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $selectStmt = $connect->prepare("SELECT don_userProfile FROM donor_info_tbl WHERE id = ?");
        $selectStmt->bind_param("i", $id);
        $selectStmt->execute();
        $selectStmt->bind_result($existingImageData);
        $selectStmt->fetch();
        $selectStmt->close();

        // Check if a new file is selected
        if (!empty($_FILES['don_userProfile']['tmp_name'])) {
            $uploadedFile = $_FILES['don_userProfile']['tmp_name']; // Get the temporary name/path of the uploaded file

            // Read the image data from the uploaded file
            $imageData = file_get_contents($uploadedFile);
        } else {
            // No new file selected, use the existing image data
            $imageData = $existingImageData;
            $stmt = $connect->prepare("UPDATE donor_info_tbl SET don_firstName = ?, don_midName = ?, don_lastName = ?, don_bday = ?, don_age = ?, don_sex = ?, don_bloodType = ?, don_streetAdd = ?, don_city = ?, don_province = ?, don_postal = ?, don_phoneNum = ?, don_ethnicity = ?, don_boolBlood = ?, don_boolOrganTissue = ?, don_giftOrgan = ?, don_userProfile = ?, isDeceased = ? WHERE id = ?");
            $stmt->bind_param("sssssissssssssssssi", $don_firstName, $don_midName, $don_lastName, $don_bday, $don_age, $don_sex, $don_bloodType, $don_streetAdd, $don_city, $don_province, $don_postal, $don_phoneNum, $don_ethnicity, $don_boolBlood, $don_boolOrganTissue, $don_giftOrgan, $imageData, $isDeceased, $id);
            $stmt->execute();
            echo "don_sex value: " . $don_sex . "<br>";
            // Redirect to dashboard
            header('Location: ../adminOrganDonor.php');
           
            
        }

        // Insert data into the database
        $stmt = $connect->prepare("UPDATE donor_info_tbl SET don_firstName = ?, don_midName = ?, don_lastName = ?, don_bday = ?, don_age = ?, don_sex = ?, don_bloodType = ?, don_streetAdd = ?, don_city = ?, don_province = ?, don_postal = ?, don_phoneNum = ?, don_ethnicity = ?, don_boolBlood = ?, don_boolOrganTissue = ?, don_giftOrgan = ?, don_userProfile = ?, isDeceased = ? WHERE id = ?");
        $stmt->bind_param("sssssissssssssssssi", $don_firstName, $don_midName, $don_lastName, $don_bday, $don_age, $don_sex, $don_bloodType, $don_streetAdd, $don_city, $don_province, $don_postal, $don_phoneNum, $don_ethnicity, $don_boolBlood, $don_boolOrganTissue, $don_giftOrgan, $imageData, $isDeceased, $id);
        $stmt->execute();
        echo "don_sex value: " . $don_sex . "<br>";
        // Redirect to dashboard
        header('Location: ../adminOrganDonor.php');
        exit();
    }
?>
