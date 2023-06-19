<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeflow_db"; 

$connect = mysqli_connect($servername, $username, $password, $database);

if (isset($_SESSION['recip_username'])) {
    $recip_username = $_SESSION['recip_username'];

    $signupQuery = mysqli_query($connect, "SELECT * FROM recipientsignup_tbl WHERE recip_username='$recip_username'");
    $signupData = mysqli_fetch_assoc($signupQuery); 

    $infoQuery = mysqli_query($connect, "SELECT * FROM recipient_info_tbl WHERE recip_username='$recip_username'");
    $infoData = mysqli_fetch_assoc($infoQuery);
    $recip_dp = $infoData['recip_userProfile'];

    if ($recip_dp !== null) {
        $base64Image = base64_encode($recip_dp);
        $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
    } else {
        // Use a placeholder image if no image data is available
        $imageSrc = '../Images/Recipient-Donor-Dashboard/nav-icons/pinkProfile.png';
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recipient Dashboard · Life Flow</title>
        <link rel="icon" type="tab-icon" href="../Images/landing-page-assets/LOGO1x1.png">
        <link rel="stylesheet" href="../style.css">
        <script src="https://code.jquery.com/jquery-1.11.0.min.js"
            integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous">
        </script>
    </head>

    <body class="recip_dashb_body">
    <script src="recipientdashbscript.js"></script>
        <nav id="sidebar">
            <div class="logoandcorner">
                <div class="logo">
                    <a href="../index.html"><img src="../Images/LOGO.png"></a>
                </div>
                <!--<div class="toggler">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg>
                </div> !-->
            </div>
            <div class="user">
                <img src="<?php echo $imageSrc ?>">
                <h1><?php echo $infoData['recip_firstName']; ?></h1>
                <p>RECIPIENT</p>
            </div>
            <div class="menu-bar sizedmenubar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="#" onclick="openDashB()">
                                <svg width="37" height="33" viewBox="0 0 37 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1163 0.436774C17.728 -0.145591 18.6887 -0.145591 19.3004 0.436774L31.967 12.5003L35.9254 16.2702C36.5585 16.8731 36.5829 17.8754 35.9798 18.5087C35.3769 19.1419 34.3746 19.1662 33.7413 18.5632L32.4583 17.3413V29.2917C32.4583 31.0406 31.0406 32.4583 29.2917 32.4583H21.375H15.0417H7.125C5.3761 32.4583 3.95834 31.0406 3.95834 29.2917V17.3413L2.6753 18.5632C2.04206 19.1662 1.03986 19.1419 0.436785 18.5087C-0.166285 17.8754 -0.141841 16.8731 0.491383 16.2702L4.44971 12.5003L17.1163 0.436774ZM7.125 14.3254V29.2917H13.4583V21.375C13.4583 18.7516 15.5849 16.625 18.2083 16.625C20.8318 16.625 22.9583 18.7516 22.9583 21.375V29.2917H29.2917V14.3254L18.2083 3.76983L7.125 14.3254ZM19.7917 29.2917V21.375C19.7917 20.5005 19.0828 19.7917 18.2083 19.7917C17.3339 19.7917 16.625 20.5005 16.625 21.375V29.2917H19.7917Z" fill="#C11A1D"/>
                                </svg>
                                <span class="text">Dashboard</span>
                            </a>
                            <a href="#" onclick="openDonors()">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.10049 9.90041H8.80126C9.40437 9.90041 9.90176 9.40708 9.90176 8.79991V1.1005C9.90041 0.494682 10.3951 0 11.0009 0H21.9991C22.6036 0 23.0996 0.493326 23.0996 1.1005V8.79991C23.0996 9.40573 23.5943 9.90041 24.2001 9.90041H31.8995C32.504 9.90041 33 10.3937 33 11.0009V22.0005C33 22.6049 32.5053 23.101 31.8995 23.101H24.2001C23.5956 23.101 23.0996 23.5943 23.0996 24.2014V31.9022C23.0996 32.508 22.6049 33.0027 21.9991 33.0027H10.9995C10.3964 33.0027 9.89905 32.5094 9.89905 31.9022V24.2014C9.89905 23.5956 9.40572 23.101 8.79855 23.101H1.09779C0.494682 23.101 -0.00271225 22.6076 -0.00271225 22.0005V11.0009C0 10.3937 0.494678 9.90041 1.10049 9.90041ZM11.6867 21.56C13.3659 25.0322 18.9551 25.4117 20.9759 22.5819C22.5277 20.4093 22.2729 17.814 20.0949 15.3202C18.2504 13.2019 17.3193 11.1825 17.7082 8.53834C12.5785 11.4861 9.6429 17.3437 11.6867 21.56Z" fill="#C11A1D"/>
                                </svg>
                                <span class="text">Donors</span>
                            </a>
                            <a href="#" class="learndon">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 0.5C13.7366 0.5 10.5465 1.46771 7.8331 3.28075C5.11969 5.09379 3.00484 7.67074 1.756 10.6857C0.507149 13.7007 0.180394 17.0183 0.81705 20.219C1.45371 23.4197 3.02518 26.3597 5.33275 28.6673C7.64031 30.9748 10.5803 32.5463 13.781 33.183C16.9817 33.8196 20.2993 33.4929 23.3143 32.244C26.3293 30.9952 28.9062 28.8803 30.7193 26.1669C32.5323 23.4535 33.5 20.2634 33.5 17C33.4948 12.6255 31.7548 8.43167 28.6616 5.33844C25.5683 2.24521 21.3745 0.505161 17 0.5ZM17 30.5C14.33 30.5 11.7199 29.7082 9.49981 28.2248C7.27975 26.7414 5.54942 24.633 4.52763 22.1662C3.50585 19.6994 3.23851 16.985 3.75941 14.3663C4.28031 11.7475 5.56606 9.34207 7.45407 7.45406C9.34207 5.56605 11.7475 4.2803 14.3663 3.7594C16.985 3.2385 19.6994 3.50584 22.1662 4.52763C24.633 5.54941 26.7414 7.27974 28.2248 9.4998C29.7082 11.7199 30.5 14.33 30.5 17C30.4956 20.5791 29.0719 24.0103 26.5411 26.5411C24.0103 29.0719 20.5791 30.4956 17 30.5ZM18.5 23.75V26.75H15.5V23.75H18.5ZM23 13.25C23.0016 14.1496 22.8001 15.0379 22.4105 15.8488C22.021 16.6597 21.4533 17.3721 20.75 17.933C19.6139 18.8134 18.8456 20.0848 18.5945 21.5H15.5465C15.6791 20.3435 16.042 19.2254 16.6136 18.2114C17.1853 17.1974 17.9542 16.3081 18.875 15.596C19.2445 15.3003 19.5388 14.9213 19.7339 14.49C19.9289 14.0588 20.0192 13.5875 19.9972 13.1147C19.9753 12.6419 19.8418 12.181 19.6076 11.7697C19.3735 11.3583 19.0453 11.0082 18.65 10.748C18.2094 10.46 17.7024 10.2895 17.1773 10.2528C16.6522 10.216 16.1264 10.3142 15.65 10.538C15.1418 10.7816 14.7153 11.1676 14.4224 11.649C14.1295 12.1305 13.9827 12.6867 14 13.25C14 13.6478 13.842 14.0294 13.5607 14.3107C13.2794 14.592 12.8978 14.75 12.5 14.75C12.1022 14.75 11.7207 14.592 11.4393 14.3107C11.158 14.0294 11 13.6478 11 13.25C10.9777 12.0972 11.2958 10.9633 11.9145 9.99031C12.5332 9.01729 13.425 8.2483 14.4785 7.7795C15.4123 7.36217 16.4362 7.1867 17.4557 7.26927C18.4752 7.35185 19.4575 7.68982 20.312 8.252C21.1377 8.79859 21.8152 9.54104 22.2843 10.4131C22.7533 11.2852 22.9992 12.2598 23 13.25Z" fill="#C11A1D"/>
                                </svg>
                                <span class="text">Learn About <br> Donation</span>
                            </a>
                            <a href="#" class="aLogout">
                                <svg class="logout" fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"/><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"/></svg>
                                <span class="text">Log Out</span>
                            </a>
                            <div class="toggleWrapper">
                                <input type="checkbox" class="dn" id="dn" onclick="darkMode(this.checked);">
                                <label for="dn" class="toggle">
                                    <span class="toggle__handler">
                                        <span class="crater crater--1"></span>
                                        <span class="crater crater--2"></span>
                                        <span class="crater crater--3"></span>
                                    </span>
                                    <span class="star star--1"></span>
                                    <span class="star star--2"></span>
                                    <span class="star star--3"></span>
                                    <span class="star star--4"></span>
                                    <span class="star star--5"></span>
                                    <span class="star star--6"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            
        </nav>
        <div class="contentWrapper">
            <div class="corner"></div>
            <div class="allBody">
                <label for="check" class="menuButton" id="menubtn">
                    <input type="checkbox" onclick="openSidebar(this.checked);" class="slidecheck" id="check">
                    <span class="top"></span>
                    <span class="mid"></span>
                    <span class="bot"></span>
                </label>
                <div class="recipDashb">
                    <div class="recipTop">
                        <h1>Hello</h1>
                        <h1 class="user">User!</h1>
                    </div>
                    <div class="recipBottom" id="recipBottomID">
                        <div class="recipLeft">
                            <div class="organDon">
                                <p class="orgtxt">Organ Donations</p>
                                <div class="orgsWrapper">
                                    <div class="orgRow1">
                                        <div class="org1">
                                            <div class="orgimg">
                                                <img src="../Images/Recipient-Donor-Dashboard/organs-asset/liver.svg">
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS liver_count FROM donor_info_tbl WHERE don_giftOrgan = 'Liver' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $liverCount = $row['liver_count'];
                                            ?>
                                            <p class="orgCount"><?php echo $liverCount; ?></p>
                                        </div>
                                        <div class="org1">
                                            <div class="orgimg">
                                                <img src="../Images/Recipient-Donor-Dashboard/organs-asset/cornea.svg">
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS cornea_count FROM donor_info_tbl WHERE don_giftOrgan = 'Corneas' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $corneaCount = $row['cornea_count'];
                                            ?>
                                            <p class="orgCount"><?php echo $corneaCount; ?></p>
                                        </div>
                                        <div class="org1">
                                            <div class="orgimg">
                                                <img src="../Images/Recipient-Donor-Dashboard/organs-asset/heart.svg">
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS heart_count FROM donor_info_tbl WHERE don_giftOrgan = 'Heart' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $heartCount = $row['heart_count'];
                                            ?>
                                            <p class="orgCount"><?php echo $heartCount; ?></p>
                                        </div>
                                        <div class="org1">
                                            <div class="orgimg">
                                                <img src="../Images/Recipient-Donor-Dashboard/organs-asset/pancreas.svg">
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS pancreas_count FROM donor_info_tbl WHERE don_giftOrgan = 'Pancreas' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $pancreasCount = $row['pancreas_count'];
                                            ?>
                                            <p class="orgCount"><?php echo $pancreasCount; ?></p>
                                        </div>
                                    </div>
                                    <div class="orgRow2">
                                        <div class="org2">
                                            <div class="orgimg">
                                                <img src="../Images/Recipient-Donor-Dashboard/organs-asset/lungs.svg">
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS lungs_count FROM donor_info_tbl WHERE don_giftOrgan = 'Lungs' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $lungsCount = $row['lungs_count'];
                                            ?>
                                            <p class="orgCount"><?php echo $lungsCount; ?></p>
                                        </div>
                                        <div class="org2">
                                            <div class="orgimg">
                                                <img src="../Images/Recipient-Donor-Dashboard/organs-asset/kidneys.svg">
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS kidney_count FROM donor_info_tbl WHERE don_giftOrgan = 'Kidney' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $kidneyCount = $row['kidney_count'];
                                            ?>
                                            <p class="orgCount"><?php echo $kidneyCount; ?></p>
                                        </div>
                                        <div class="org2">
                                            <div class="orgimg">
                                                <img src="../Images/Recipient-Donor-Dashboard/organs-asset/intestines.svg">
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS intestine_count FROM donor_info_tbl WHERE don_giftOrgan = 'Intestines' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $intestineCount = $row['intestine_count'];
                                            ?>
                                            <p class="orgCount"><?php echo $intestineCount; ?></p>
                                        </div>
                                        <div class="org2">
                                            <div class="orgimg">
                                                <img class="orghnf" src="../Images/Recipient-Donor-Dashboard/organs-asset/handsface.svg">
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS handsface_count FROM donor_info_tbl WHERE don_giftOrgan = 'Hands and Face' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $HandsFaceCount = $row['handsface_count'];
                                            ?>
                                            <p class="orgCount"><?php echo $HandsFaceCount; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bloodDon">
                                <p class="bloodtxt">Blood Donations</p>
                                <div class="bloodsWrapper">
                                    <div class="bloodRow1">
                                        <div class="blood1">
                                            <div class="btype">
                                                <p class="bloodtype">O-</p>
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS ONeg_count FROM donor_info_tbl WHERE don_bloodType = 'O-' AND don_boolBlood = 1 AND isNewApplicant = 0 AND isBloodAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $ONeg_count = $row['ONeg_count'];
                                            ?>
                                            <p class="bloodCount"><?php echo $ONeg_count; ?></p>
                                        </div>
                                        <div class="blood1">
                                            <div class="btype">
                                                <p class="bloodtype">O+</p>
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS OPos_count FROM donor_info_tbl WHERE don_bloodType = 'O+' AND don_boolBlood = 1 AND isNewApplicant = 0 AND isBloodAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $OPos_count = $row['OPos_count'];
                                            ?>
                                            <p class="bloodCount"><?php echo $OPos_count; ?></p>
                                        </div>
                                        <div class="blood1">
                                            <div class="btype">
                                                <p class="bloodtype">B-</p>
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS BNeg_count FROM donor_info_tbl WHERE don_bloodType = 'B-' AND don_boolBlood = 1 AND isNewApplicant = 0 AND isBloodAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $BNeg_count = $row['BNeg_count'];
                                            ?>
                                            <p class="bloodCount"><?php echo $BNeg_count; ?></p>
                                        </div>
                                        <div class="blood1">
                                            <div class="btype">
                                                <p class="bloodtype">B+</p>
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS BPos_count FROM donor_info_tbl WHERE don_bloodType = 'B+' AND don_boolBlood = 1 AND isNewApplicant = 0 AND isBloodAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $BPos_count = $row['BPos_count'];
                                            ?>
                                            <p class="bloodCount"><?php echo $BPos_count; ?></p>
                                        </div>
                                    </div>
                                    <div class="bloodRow2">
                                        <div class="blood2">
                                            <div class="btype">
                                                <p class="bloodtype">A-</p>
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS ANeg_count FROM donor_info_tbl WHERE don_bloodType = 'A-' AND don_boolBlood = 1 AND isNewApplicant = 0 AND isBloodAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $ANeg_count = $row['ANeg_count'];
                                            ?>
                                            <p class="bloodCount"><?php echo $ANeg_count; ?></p>
                                        </div>
                                        <div class="blood2">
                                            <div class="btype">
                                                <p class="bloodtype">A+</p>
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS APos_count FROM donor_info_tbl WHERE don_bloodType = 'A+' AND don_boolBlood = 1 AND isNewApplicant = 0 AND isBloodAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $APos_count = $row['APos_count'];
                                            ?>
                                            <p class="bloodCount"><?php echo $APos_count; ?></p>
                                        </div>
                                        <div class="blood2">
                                            <div class="btype">
                                                <p class="bloodtype">AB-</p>
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS ABNeg_count FROM donor_info_tbl WHERE don_bloodType = 'AB-' AND don_boolBlood = 1 AND isNewApplicant = 0 AND isBloodAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $ABNeg_count = $row['ABNeg_count'];
                                            ?>
                                            <p class="bloodCount"><?php echo $ABNeg_count; ?></p>
                                        </div>
                                        <div class="blood2">
                                            <div class="btype">
                                                <p class="bloodtype">AB+</p>
                                            </div>
                                            <?php 
                                            $query = "SELECT COUNT(*) AS ABPos_count FROM donor_info_tbl WHERE don_bloodType = 'AB+' AND don_boolBlood = 1 AND isNewApplicant = 0 AND isBloodAvailable = 1";
                                            $result = mysqli_query($connect, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $ABPos_count = $row['ABPos_count'];
                                            ?>
                                            <p class="bloodCount"><?php echo $ABPos_count; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="recipRight">
                            <p class="righttxt">Recent Donation Registrations</p>
                            <?php
                                $query = "SELECT don_firstName, don_bloodType, don_giftOrgan, don_userProfile FROM donor_info_tbl ORDER BY created_at DESC LIMIT 7";
                                $result = mysqli_query($connect, $query);
                            ?>
                            <table class="recentdons_tbl">
                                <tbody>
                                    <?php
                                        // Loop through the results and display the recent donations in table rows
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $don_FirstName = $row['don_firstName'];
                                            $don_BloodType = $row['don_bloodType'];
                                            $don_GiftOrgan = $row['don_giftOrgan'];
                                            $don_dp = $row['don_userProfile'];
                                        
                                            // Check if the image data exists
                                            if ($don_dp !== null) {
                                                $base64Image = base64_encode($don_dp);
                                                $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                                            } else {
                                                // Use a placeholder image if no image data is available
                                                $imageSrc = '../Images/Recipient-Donor-Dashboard/nav-icons/pinkProfile.png';
                                            }
                                            ?>
                                            <tr class="rowWrapper">
                                                <td class="don_row">
                                                    <div class="don_dp">
                                                        <img src="<?php echo $imageSrc; ?>">
                                                        <p class="don_FName">
                                                            <?php echo $don_FirstName; ?>
                                                        </p>
                                                    </div>
                                                    
                                                    <p class="don_BType">
                                                        <?php echo $don_BloodType; ?>
                                                    </p>
                                                    <p class="don_organ">
                                                    <?php if ($don_GiftOrgan === 'Liver') { ?>
                                                        <img src="../Images/Recipient-Donor-Dashboard/organs-asset/liver.svg">
                                                        <?php } elseif ($don_GiftOrgan === 'Corneas') { ?>
                                                            <img src="../Images/Recipient-Donor-Dashboard/organs-asset/cornea.svg">
                                                        <?php } elseif ($don_GiftOrgan === 'Heart') { ?>
                                                            <img src="../Images/Recipient-Donor-Dashboard/organs-asset/heart.svg">
                                                        <?php } elseif ($don_GiftOrgan === 'Pancreas') { ?>
                                                            <img src="../Images/Recipient-Donor-Dashboard/organs-asset/pancreas.svg">
                                                        <?php } elseif ($don_GiftOrgan === 'Lungs') { ?>
                                                            <img src="../Images/Recipient-Donor-Dashboard/organs-asset/lungs.svg">
                                                        <?php } elseif ($don_GiftOrgan === 'Kidney') { ?>
                                                            <img src="../Images/Recipient-Donor-Dashboard/organs-asset/kidneys.svg">
                                                        <?php } elseif ($don_GiftOrgan === 'Intestines') { ?>
                                                            <img src="../Images/Recipient-Donor-Dashboard/organs-asset/intestines.svg">
                                                        <?php } elseif ($don_GiftOrgan === 'Hands and Face') { ?>
                                                            <img class="hnf" src="../Images/Recipient-Donor-Dashboard/organs-asset/handsface.svg">
                                                        <?php } ?>
                                                    </p>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="donors" id="donorsDIV">
                    <div id="donors-table"></div>
                    <div id="pagination"></div>
                </div>
            </div>
        </div>
    </body>

</html>
