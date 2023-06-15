<?php
session_start();

// Check if the 'don_username' session variable is set
if (isset($_SESSION['don_username'])) {
    // Retrieve the 'don_username' value
    $don_username = $_SESSION['don_username'];

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
        $don_bday = $_POST["don_bday"];
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

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        }

        // Check if the username already exists in the database
        $checkStmt = $connect->prepare("SELECT * FROM donor_info_tbl WHERE don_username = ?");
        $checkStmt->bind_param("s", $don_username);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Username already exists, display an alert message
            echo "<script>alert('Account already registered.');</script>";
        } else {
            // Username doesn't exist, proceed with the registration

            $uploadedFile = $_FILES['don_userProfile']['tmp_name']; // Get the temporary name/path of the uploaded file

            // Read the image data from the uploaded file
            $imageData = file_get_contents($uploadedFile);

            if ($imageData !== false) {
                // File read successful

                // Insert data into the database
                $stmt = $connect->prepare("INSERT INTO donor_info_tbl (don_username, don_firstName, don_midName, don_lastName, don_bday, don_age, don_sex, don_bloodType, don_streetAdd, don_city, don_province, don_postal, don_phoneNum, don_ethnicity, don_boolBlood, don_boolOrganTissue, don_giftOrgan, don_userProfile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->bind_param("sssssissssssssssss", $don_username, $don_firstName, $don_midName, $don_lastName, $don_bday, $don_age, $don_sex, $don_bloodType, $don_streetAdd, $don_city, $don_province, $don_postal, $don_phoneNum, $don_ethnicity, $don_boolBlood, $don_boolOrganTissue, $don_giftOrgan, $imageData);

                $stmt->execute();

                // Get the ID of the newly inserted row
                $newlyInsertedId = mysqli_insert_id($connect);

                $uploadDir = 'C:\xampp\htdocs\Life-Flow\User-Profiles\\';  // Directory where the uploaded files will be stored
                $uploadedFile = $_FILES['don_userProfile']['name'];  // Get the filename of the uploaded file
                $tempName = $_FILES['don_userProfile']['tmp_name'];  // Get the temporary name/path of the uploaded file
                $fileExtension = pathinfo($uploadedFile, PATHINFO_EXTENSION);  // Get the file extension

                $newFileName = uniqid('profile_', true) . '.' . $fileExtension;
                $uploadPath = $uploadDir . $newFileName;  // Complete path to the uploaded file

                $fileError = $_FILES['don_userProfile']['error'];  // Retrieve the file upload error status

                if ($fileError === 0) {
                    if (move_uploaded_file($tempName, $uploadPath)) {
                        // File upload successful
                        // Store the $newFileName or $uploadPath variable in the database column 'don_userProfile'

                        // Update the previously inserted row with the profile filename
                        $updateStmt = $connect->prepare("UPDATE donor_info_tbl SET don_userProfile = ? WHERE id = ?");
                        $updateStmt->bind_param("si", $newFileName, $newlyInsertedId);
                        $updateStmt->execute();

                        // Redirect to dashboard
                        header("Location: donor-registration.html");
                        exit();
                    } else {
                        // File upload failed
                        // Handle the error accordingly
                    }
                }
            }
        }
    }
} else {
    // 'don_username' session variable is not set, handle the case accordingly
    echo "Donor Username not found.";
}
?>
