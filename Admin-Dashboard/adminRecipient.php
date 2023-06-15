<?php 
    require_once ('admin-php/connection.php');
    require 'admin-php/functions.php'; 

    $query = "SELECT * FROM recipient_info_tbl";
    $result = mysqli_query($conn, $query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Recipient</title>
</head>

<body>
    <nav class="adminDashboard">

        <div class="adminNavigation .hide-for-mobile">

            <img class="Logo" src="../Images/LOGO.png" alt="">

            <div class="greeting">
                <h1>Hi <span>Admin</span>!</h1>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__Dashboard" href="./adminDashboard.html">
                    <img src="../Images/AdminDashboard/icon-dashboard-standby.svg" alt="Dashboard Icon">
                    <h2>Dashboard</h2>
                </a>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__DonorApplication" href="./adminDonorApplicant.html">
                    <img src="../Images/AdminDashboard/icon-donorApplicant-standby.svg" alt="Donor Applicant Icon">
                    <h2>Donor Applicant</h2>
                </a>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__OrganDonor" href="./adminOrganDonor.html">
                    <img src="../Images/AdminDashboard/icon-organDonor-standby.svg" alt="Organ Donor Icon">
                    <h2>Organ Donor</h2>
                </a>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__BloodDonor" href="./adminBloodDonor.html">
                    <img src="../Images/AdminDashboard/Icon-BloodDonor-standby.svg" alt="Blood Donor Icon">
                    <h2>Blood Donor</h2>
                </a>
            </div>
            <div class="adminLinks  current">
                <a class="adminLinks__Recipient" href="./adminRecipient.html">
                    <img src="../Images/AdminDashboard/Icon-Recipient-current.svg" alt="Recipient Icon">
                    <h2>Recipient</h2>
                </a>
            </div>
            <div class="adminLinks flex">
                <a class="adminLinks__BloodTransfusion" href="./adminTransfusionRegistry.html">
                    <img src="../Images/AdminDashboard/icon-bloodTransfusion-standby.svg" alt="Blood Transfusion Icon">
                    <h2>Transfusion Registry</h2>
                </a>
            </div>
            <div class="adminLinks flex">
                <a class="adminLinks__Transplant" href="./adminTransplantRegistry.html">
                    <img src="../Images/AdminDashboard/Icon-transplant-standby.svg" alt="Blood Transfusion Icon">
                    <h2>Transplant Registry</h2>
                </a>
            </div>
            <div class="adminLinks flex">
                <a class="adminLinks__LogOut" href="../Landing-Page/Landing-Page.html">
                    <img src="../Images/AdminDashboard/Icon-LogOut-standby.svg" alt="Log Out Icon">
                    <h2>Log Out</h2>
                </a>
            </div>
        </div>

        <!---------------ADMIN DASHBOARD CONTENT--------------------->

        <div class="adminDashboardContent">
            <h1 class="dashboard-title">RECIPIENT</h1>
            <div class="content-fixed-container">



                <!-------------GENERAL FUNCTION---------------------->
                <div class="recipient-function_container">
                    <div class="recipient_add_container" onclick="dashboardopenPopup()">

                        <svg class="recipient-add-function-icon width=" 65" height="65" viewBox="0 0 65 65"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_429_255)">
                                <path
                                    d="M42.9502 51.0509C42.9502 46.4757 45.4736 42.5115 49.1755 40.3707C46.8591 39.6298 44.3646 39.0429 41.7427 38.634C47.3763 35.5093 51.1937 29.5077 51.1937 22.6065C51.1937 12.4868 42.9911 4.28418 32.8714 4.28418C22.7517 4.28418 14.5491 12.4868 14.5491 22.6065C14.5491 29.5053 18.3666 35.5093 24.0001 38.634C10.1592 40.7917 0.000976562 47.8613 0.000976562 56.2611H44.1409C43.3977 54.6687 42.9502 52.9199 42.9502 51.0509Z"
                                    fill="#136371" />
                                <path
                                    d="M55.336 41.3882C50.0007 41.3882 45.6709 45.7108 45.6709 51.0533C45.6709 56.391 50.0007 60.716 55.336 60.716C60.6737 60.716 65.0011 56.391 65.0011 51.0533C64.9963 45.7084 60.6737 41.3882 55.336 41.3882ZM61.6455 52.766H57.0535V57.3604H53.6209V52.766H49.0265V49.3286H53.6209V44.7318H57.0535V49.3286H61.6455V52.766Z" />
                            </g>
                            <defs>
                                <clipPath id="clip0_429_255">
                                    <rect width="65" height="65" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <h2 class="recipient-add-function-text">Add &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                            Organ Donor</h2>
                    </div>

                    <div class="recipient-select-function_container">
                        <div class="recipient-search-function">
                            <input class="recipient-search-input" type="text" name="" id="" placeholder="Search">
                        </div>
                        <div class="recipient-filter-function">
                            <svg class="recipient-filter-function-icon" width="30" height="30" viewBox="0 0 30 30"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.7344 30C11.9832 29.9995 11.2628 29.6848 10.7317 29.1251C10.2005 28.5654 9.90194 27.8064 9.90161 27.0149V15.6134L0.73663 4.99172C0.367506 4.56393 0.124269 4.03238 0.0364825 3.46169C-0.0513038 2.89099 0.0201402 2.30571 0.242131 1.77699C0.464123 1.24827 0.827102 0.798866 1.28695 0.483404C1.74681 0.167942 2.28373 3.81238e-06 2.83247 0H27.1675C27.7163 -6.46233e-07 28.2532 0.167926 28.713 0.483373C29.1729 0.798819 29.5358 1.2482 29.7578 1.7769C29.9798 2.30561 30.0513 2.89087 29.9635 3.46155C29.8758 4.03224 29.6326 4.56378 29.2635 4.99157L20.0984 15.6134V23.8318C20.0989 24.3232 19.984 24.8071 19.7639 25.2404C19.5438 25.6736 19.2253 26.0428 18.8369 26.3149L14.3052 29.4979C13.8402 29.8252 13.2936 29.9999 12.7344 30ZM4.11302 3.58106L12.5639 13.3752C13.0385 13.9241 13.3012 14.6401 13.3005 15.3826V25.8996L16.6995 23.5124V15.3826C16.6989 14.6399 16.9617 13.9238 17.4365 13.3748L25.887 3.58106H4.11302Z" />
                            </svg>
                            <h3>Filter</h3>
                        </div>
                        <div class="recipient-sort-function">
                            <svg class="recipient-sort-function-icon" width="45" height="25" viewBox="0 0 45 25"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M37.2414 12.0536C37.2414 12.6929 36.9961 13.3061 36.5596 13.7582C36.1231 14.2103 35.5311 14.4643 34.9138 14.4643H10.0862C9.46889 14.4643 8.87686 14.2103 8.44035 13.7582C8.00385 13.3061 7.75862 12.6929 7.75862 12.0536C7.75862 11.4142 8.00385 10.801 8.44035 10.3489C8.87686 9.89684 9.46889 9.64286 10.0862 9.64286H34.9138C35.5311 9.64287 36.1231 9.89686 36.5596 10.349C36.9961 10.801 37.2414 11.4142 37.2414 12.0536ZM42.6724 0H2.32759C1.71027 0 1.11824 0.253985 0.681734 0.706082C0.245227 1.15818 0 1.77135 0 2.41071C0 3.05008 0.245227 3.66325 0.681734 4.11535C1.11824 4.56744 1.71027 4.82143 2.32759 4.82143H42.6724C43.2897 4.82143 43.8818 4.56744 44.3183 4.11535C44.7548 3.66325 45 3.05008 45 2.41071C45 1.77135 44.7548 1.15818 44.3183 0.706082C43.8818 0.253985 43.2897 0 42.6724 0ZM27.1552 19.2857H17.8448C17.2275 19.2857 16.6355 19.5397 16.199 19.9918C15.7625 20.4439 15.5172 21.0571 15.5172 21.6964C15.5172 22.3358 15.7625 22.949 16.199 23.4011C16.6355 23.8532 17.2275 24.1071 17.8448 24.1071H27.1552C27.7725 24.1071 28.3645 23.8532 28.801 23.4011C29.2375 22.949 29.4828 22.3358 29.4828 21.6964C29.4828 21.0571 29.2375 20.4439 28.801 19.9918C28.3645 19.5397 27.7725 19.2857 27.1552 19.2857Z" />
                            </svg>
                            <h3>Sort</h3>
                        </div>
                    </div>
                </div>


                <!--------------LATEST DONOR APPLICATION----------------->
                <div class="adminRecipient">
                    <div class="adminRecipient__contentTitle">
                        <h2 class="adminRecipient__contentTitle__ID">ID</h2>
                        <h2 class="adminRecipient__contentTitle__Profile">Profile</h2>
                        <h2 class="adminRecipient__contentTitle__Contact">Contact</h2>
                        <h2 class="adminRecipient__contentTitle__BloodType">Blood Type</h2>
                        <h2 class="adminRecipient__contentTitle__Organ">Organ</h2>
                        <h2 class="adminRecipient__contentTitle__DateRequired">Date Required</h2>
                        <h2 class="adminRecipient__contentTitle__Status">Status</h2>
                        <div class="adminRecipient__contentTitle__empty"></div>
                    </div>
                    <div class="recipient_container">

                <!---
                        <div class="recipient1 recipient">
                            <!----ID/DATE-----
                            <div class="recipient__order">
                                <h1 class="recipient__order__ID">1</h1>
                            </div>
                            <!---PERSONAL INFORMATION--
                            <div class="recipient__personal">
                                <div>
                                    <img class="recipient__personal__Image"
                                        src="../Images/AdminDashboard/profile-default.svg" alt="default profile">
                                </div>
                                <div>
                                    <h3 class="recipient__personal__name">Yughie Perez</h3>
                                    <h3 class="recipient__personal__age">Age: <span
                                            class="personal__age__value">21</span></h3>
                                    <h3 class="recipient__personal__sex">Sex: <span
                                            class="personal__sex_value">Male</span></h3>
                                </div>
                            </div>
                            <!---CONTACT INFO----
                            <div class="recipient__contact">
                                <h3 class="recipient__contact__email">yughiep@gmail.com</h3>
                                <h3 class="recipient__contact__number">092381293241</h3>
                            </div>
                            <!---BLOOD TYPE--
                            <h3 class="recipient__bloodtype">O+</h3>
                            <!---ORGAN IMAGE----
                            <img class="recipient__Organ" src="../Images/Organ-Assets/organ-liver.svg"
                                alt="liver image">

                            <!-------DATE REQUIRED--------
                            <h3 class="recipient__daterequired">09-12-01</h3>

                            <!-----------STATUS------------
                            <div class="recipient__status"></div>
                            <!---FUNCTIONS----
                            <div class="recipient-function-container">
                                <img class="recipient-edit" src="../Images/DonorApplicant/icon-editApplicant.svg"
                                    alt="edit applicant icon">
                                <img class="recipient-delete" src="../Images/DonorApplicant/icon-deleteApplicant.svg"
                                    alt="Trash can">
                            </div>
                        </div>
            ---->
                        <?php   
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                              <div class="recipient1 recipient">
                            <!----ID/DATE----->
                            <div class="recipient__order">
                                <h1 class="recipient__order__ID"><?php echo $row['recipID']; ?></h1>
                            </div>
                            <!---PERSONAL INFORMATION-->
                            <div class="recipient__personal">
                                <div>
                                    <img class="recipient__personal__Image"
                                        src="../Images/AdminDashboard/profile-default.svg" alt="default profile">
                                </div>
                                <div>
                                    <h3 class="recipient__personal__name">
                                            <?php echo $row['recip_lastName'] ." " . $row['recip_firstName'] . ",";?>
                                    </h3>
                                    <h3 class="recipient__personal__name">
                                        <?php echo $row['recip_midName']; ?>
                                    </h3>
                                    <h3 class="recipient__personal__age">Age: <span
                                            class="personal__age__value"><?php echo $row['recip_age']; ?></span></h3>
                                    <h3 class="recipient__personal__sex">Sex: <span
                                            class="personal__sex_value"><?php echo $row['recip_sex']; ?></span></h3>
                                </div>
                            </div>
                                <!---CONTACT INFO---->
                            <div class="recipient__contact">
                                <h3 class="recipient__contact__number"><?php echo $row['recip_phoneNum']; ?></h3>
                            </div>
                            <!---BLOOD TYPE-->
                            <h3 class="recipient__bloodtype"><?php echo $row['recip_bloodType']; ?></h3>
                            <!---ORGAN IMAGE---->
                            <img class="recipient__Organ" src="../Images/Organ-Assets/organ-liver.svg"
                                alt="liver image">

                            <!-------DATE REQUIRED-------->
                            <?php
                            if($row['recip_boolBlood']){   
                            ?>
                            <h3 class="recipient__daterequired"><?php echo $row['recip_bloodUrgency']; ?></h3>
                            <?php
                            }
                            else{
                            ?>
                             <h3 class="recipient__daterequired"><?php echo $row['recip_organUrgency']; ?></h3>
                            <?php   
                            }
                            ?>
                            <!-----------STATUS------------>
                            <?php 
                                if($row['recip_status'] == 1){
                            ?>
                               <div class="recipient__status" style="background-color: green;"></div>
                            <?php 
                            }
                            else if($row['recip_status'] == 0){
                            ?>
                                <div class="recipient__status" style="background-color: yellow;"></div>
                            <?php 
                             }   
                                else if($row['recip_status'] == -1){
                            ?>
                            <div class="recipient__status" style="background-color: red;"></div>
                            <?php 
                             } 
                            ?>

                            <!---FUNCTIONS---->
                            <div class="recipient-function-container">
                                <img class="recipient-edit" src="../Images/DonorApplicant/icon-editApplicant.svg"
                                    alt="edit applicant icon">
                                <img class="recipient-delete" src="../Images/DonorApplicant/icon-deleteApplicant.svg"
                                    alt="Trash can">
                            </div>
                        </div>








                        <?php  
                            }
                        ?>

                    </div>

                </div>
            </div>

        </div>
    </nav>
    <!----------POP UP------------------------>
    <div class="dashboard-popup" id="dashboard-popup-1">
        <div class="dashboard-overlay"></div>

        <div class="dashboard-content">
            <div class="dashboard-overflow_container">
                <form class="registrationForm" action="process_recipient_registration.php" method="POST">
                    <h1 class="h1">recipient registration form</h1>
                    <div class="personalInfo">
                        <p class="p">Personal Information</p>
                        <div class="fullname">
                            <label class="label" for="recip_firstName">
                                <input class="input" required type="text" name="recip_firstName">
                                <span class="span">First Name</span>
                            </label>
                            <label class="label" for="recip_midName">
                                <input class="input" required type="text" name="recip_midName">
                                <span class="span">Middle Name</span>
                            </label>
                            <label class="label" for="recip_lastName">
                                <input class="input" required type="text" name="recip_lastName">
                                <span class="span">Last Name</span>
                            </label>
                        </div>

                        <div class="info2">
                            <label class="label" for="recip_bDay">
                                <input class="input" required type="date" name="recip_bDay" value="2023-12-30">
                                <span class="span">Date of Birth</span>
                            </label>
                            <label class="label" for="recip_age">
                                <input class="input" required type="number" name="recip_age" min="18" defaul="18"
                                    minlength="2" maxlength="2">
                                <span class="span">Age</span>
                            </label>
                            <div>
                                <label class="label" for="recip_sex">
                                    <select id="sex" required="" name="recip_sex" class="select">
                                        <option value="" disabled hidden selected>Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span class="span">Sex</span>
                                </label>
                            </div>
                            <label class="label" for="recip_bloodType">
                                <select id="bloodtype" required name="recip_bloodType" class="select">
                                    <option value="" disabled hidden selected>Select</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <span class="span">Blood Type</span>
                            </label class="label">
                        </div>

                        <div class="streetadd">
                            <label class="label" for="recip_streetAdd">
                                <input class="input" required type="text" name="recip_streetAdd">
                                <span class="span">Street Address</span>
                            </label class="label">
                        </div>

                        <div class="address">
                            <label class="label" for="recip_city">
                                <input class="input" required type="text" name="recip_city">
                                <span class="span">City</span>
                            </label class="label">
                            <label class="label" for="recip_province">
                                <input class="input" required type="text" name="recip_province">
                                <span class="span">State/Province</span>
                            </label class="label">
                            <label class="label" for="recip_postal">
                                <input class="input" required type="number" pattern="[0-9]{4}" name="recip_postal">
                                <span class="span">Postal Code</span>
                            </label class="label">
                        </div>

                        <div class="phonenum">
                            <label class="label" for="recip_phoneNum">
                                <input class="input" required type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                    name="recip_phoneNum">
                                <span class="span">Phone Number 9XX-XXX-XXXX</span>
                            </label class="label">
                        </div>
                        <div class="userprofile">
                            <span class="span">Choose Profile Photo</span>
                            <input class="input" type="file" name="" onchange="checkFileSize(this)">
                        </div>
                    </div>

                    <div class="optionalInfo">
                        <p class="p">Optional Information</p>
                        <label class="label" for="recip_ethnicity">

                            <select id="ethnicity" name="recip_ethnicity" class="select">
                                <option value="" disabled hidden selected>Select</option>
                                <option value="African">African</option>
                                <option value="European">European</option>
                                <option value="Indigenous">Indigenous</option>
                                <option value="Middle Eastern">Middle Eastern</option>
                                <option value="North American">North American</option>
                                <option value="South American">South American</option>
                                <option value="Oceanian">Oceanian</option>
                                <option value="South Asian">South Asian</option>
                                <option value="Southeast Asian">Southeast Asian</option>
                            </select>
                            <span class="span">Ethnicity</span>

                        </label class="label">
                    </div>

                    <div class="recipsNeed">
                        <p class="p">Recipient's Need</p>
                        <div class="needsText">
                            <input type="radio" id="recip_boolBlood" name="recip_boolBlood" value="1"
                                class="recip_bloodOrgan" required>
                            <label for="recip_boolBlood">
                                <p>Blood</p>
                            </label>
                        </div>
                        <label class="label">
                            <input class="input" type="date" name="recip_bloodUrgency" id="recip_bloodUrgency"
                                value="2023-12-30">
                            <span class="span">Transfusion Urgency</span>
                        </label class="label">
                        <div class="needsText" id="needsTextbtm">
                            <input type="radio" id="recip_boolOrganTissue" name="recip_boolBlood" value="0"
                                class="recip_bloodOrgan">
                            <label for="recip_boolOrganTissue">
                                <p>Organ and/or Tissue</p>
                            </label>
                        </div>
                        <div class="needOrgan">
                            <label class="label" for="neededOrgan">
                                <select name="recip_neededOrgan" id="recip_neededOrgan neededOrgan" class="select">
                                    <option value="" disabled hidden selected>Select</option>
                                    <option value="">Kidney</option>
                                    <option value="">Liver</option>
                                    <option value="">Lungs</option>
                                    <option value="">Heart</option>
                                    <option value="">Pancreas</option>
                                    <option value="">Intestines</option>
                                    <option value="">Hands and Face</option>
                                    <option value="">Corneas</option>
                                </select>
                                <span class="span">Needed Organ/Tissue</span>
                            </label class="label">
                            <label class="label">
                                <input class="input" type="date" name="recip_organUrgency" id="recip_organUrgency"
                                    value="2023-12-30">
                                <span class="span">Transplant Urgency</span>
                            </label class="label">
                        </div>
                    </div>
                    <div class="btn_wrapper">
                        <button type="submit" id="registerbtn">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="dashboard-close-btn" onclick="dashboardtogglePopup()">&times;</div>
    </div>

    <script src="../app/popUpDashboard.js"></script>
</body>

</html>