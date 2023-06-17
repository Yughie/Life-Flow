<?php 
    require_once ('admin-php/connection.php');
    require 'admin-php/functions.php'; 

    $query = "SELECT * FROM recipient_info_tbl WHERE recip_boolBlood =0 AND recip_status != '1'";
    $result = mysqli_query($conn, $query);

    $query_donor = "SELECT * FROM donor_info_tbl WHERE don_boolBlood = 1 AND isNewApplicant =0 AND isOrganAvailable=1 AND isDeceased=1";
    $result_donor = mysqli_query($conn, $query_donor);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Transplant Registry</title>
</head>

<body>
    <nav class="adminDashboard">

        <div class="adminNavigation .hide-for-mobile">

            <img class="Logo" src="../Images/LOGO.png" alt="">

            <div class="greeting">
                <h1>Hi <span>Admin</span>!</h1>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__Dashboard" href="./adminDashboard.php">
                    <img src="../Images/AdminDashboard/icon-dashboard-standby.svg" alt="Dashboard Icon">
                    <h2>Dashboard</h2>
                </a>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__DonorApplication" href="./adminDonorApplicant.php">
                    <img src="../Images/AdminDashboard/icon-donorApplicant-standby.svg" alt="Donor Applicant Icon">
                    <h2>Donor Applicant</h2>
                </a>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__OrganDonor" href="./adminOrganDonor.php">
                    <img src="../Images/AdminDashboard/icon-organDonor-standby.svg" alt="Organ Donor Icon">
                    <h2>Organ Donor</h2>
                </a>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__BloodDonor" href="./adminBloodDonor.php">
                    <img src="../Images/AdminDashboard/Icon-BloodDonor-standby.svg" alt="Blood Donor Icon">
                    <h2>Blood Donor</h2>
                </a>
            </div>
            <div class="adminLinks">
                <a class="adminLinks__Recipient" href="./adminRecipient.php">
                    <img src="../Images/AdminDashboard/Icon-Recipient-standby.svg" alt="Recipient Icon">
                    <h2>Recipient</h2>
                </a>
            </div>
            <div class="adminLinks flex">
                <a class="adminLinks__BloodTransfusion" href="./adminTransfusionRegistry.php">
                    <img src="../Images/AdminDashboard/icon-bloodTransfusion-standby.svg" alt="Blood Transfusion Icon">
                    <h2>Transfusion Registry</h2>
                </a>
            </div>
            <div class="adminLinks current">
                <a class="adminLinks__Transplant" href="./adminTransplantRegistry.php">
                    <img src="../Images/AdminDashboard/icon-transplant-current.svg" alt="Blood Transfusion Icon">
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
            <h1 class="dashboard-title">TRANSPLANT REGISTRY</h1>
            <div class="content-fixed-container">



                <!-------------GENERAL FUNCTION---------------------->
                <div class="transplantRecipient-function_container">

                    <div class="transplantRecipient-select-function_container">
                        <div class="transplantRecipient-search-function">
                            <input class="transplantRecipient-search-input" type="text" name="" id=""
                                placeholder="Search">
                        </div>
                        <div class="transplantRecipient-filter-function">
                            <svg class="transplantRecipient-filter-function-icon" width="30" height="30"
                                viewBox="0 0 30 30" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.7344 30C11.9832 29.9995 11.2628 29.6848 10.7317 29.1251C10.2005 28.5654 9.90194 27.8064 9.90161 27.0149V15.6134L0.73663 4.99172C0.367506 4.56393 0.124269 4.03238 0.0364825 3.46169C-0.0513038 2.89099 0.0201402 2.30571 0.242131 1.77699C0.464123 1.24827 0.827102 0.798866 1.28695 0.483404C1.74681 0.167942 2.28373 3.81238e-06 2.83247 0H27.1675C27.7163 -6.46233e-07 28.2532 0.167926 28.713 0.483373C29.1729 0.798819 29.5358 1.2482 29.7578 1.7769C29.9798 2.30561 30.0513 2.89087 29.9635 3.46155C29.8758 4.03224 29.6326 4.56378 29.2635 4.99157L20.0984 15.6134V23.8318C20.0989 24.3232 19.984 24.8071 19.7639 25.2404C19.5438 25.6736 19.2253 26.0428 18.8369 26.3149L14.3052 29.4979C13.8402 29.8252 13.2936 29.9999 12.7344 30ZM4.11302 3.58106L12.5639 13.3752C13.0385 13.9241 13.3012 14.6401 13.3005 15.3826V25.8996L16.6995 23.5124V15.3826C16.6989 14.6399 16.9617 13.9238 17.4365 13.3748L25.887 3.58106H4.11302Z" />
                            </svg>
                            <h3>Filter</h3>
                        </div>
                        <div class="transplantRecipient-sort-function">
                            <svg class="transplantRecipient-sort-function-icon" width="45" height="25"
                                viewBox="0 0 45 25" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M37.2414 12.0536C37.2414 12.6929 36.9961 13.3061 36.5596 13.7582C36.1231 14.2103 35.5311 14.4643 34.9138 14.4643H10.0862C9.46889 14.4643 8.87686 14.2103 8.44035 13.7582C8.00385 13.3061 7.75862 12.6929 7.75862 12.0536C7.75862 11.4142 8.00385 10.801 8.44035 10.3489C8.87686 9.89684 9.46889 9.64286 10.0862 9.64286H34.9138C35.5311 9.64287 36.1231 9.89686 36.5596 10.349C36.9961 10.801 37.2414 11.4142 37.2414 12.0536ZM42.6724 0H2.32759C1.71027 0 1.11824 0.253985 0.681734 0.706082C0.245227 1.15818 0 1.77135 0 2.41071C0 3.05008 0.245227 3.66325 0.681734 4.11535C1.11824 4.56744 1.71027 4.82143 2.32759 4.82143H42.6724C43.2897 4.82143 43.8818 4.56744 44.3183 4.11535C44.7548 3.66325 45 3.05008 45 2.41071C45 1.77135 44.7548 1.15818 44.3183 0.706082C43.8818 0.253985 43.2897 0 42.6724 0ZM27.1552 19.2857H17.8448C17.2275 19.2857 16.6355 19.5397 16.199 19.9918C15.7625 20.4439 15.5172 21.0571 15.5172 21.6964C15.5172 22.3358 15.7625 22.949 16.199 23.4011C16.6355 23.8532 17.2275 24.1071 17.8448 24.1071H27.1552C27.7725 24.1071 28.3645 23.8532 28.801 23.4011C29.2375 22.949 29.4828 22.3358 29.4828 21.6964C29.4828 21.0571 29.2375 20.4439 28.801 19.9918C28.3645 19.5397 27.7725 19.2857 27.1552 19.2857Z" />
                            </svg>
                            <h3>Sort</h3>
                        </div>
                    </div>




                    <div class="transplantDonor-select-function_container">
                        <div class="transplantDonor-search-function">
                            <input class="transplantDonor-search-input" type="text" name="" id="" placeholder="Search">
                        </div>
                        <div class="transplantDonor-filter-function">
                            <svg class="transplantDonor-filter-function-icon" width="30" height="30" viewBox="0 0 30 30"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.7344 30C11.9832 29.9995 11.2628 29.6848 10.7317 29.1251C10.2005 28.5654 9.90194 27.8064 9.90161 27.0149V15.6134L0.73663 4.99172C0.367506 4.56393 0.124269 4.03238 0.0364825 3.46169C-0.0513038 2.89099 0.0201402 2.30571 0.242131 1.77699C0.464123 1.24827 0.827102 0.798866 1.28695 0.483404C1.74681 0.167942 2.28373 3.81238e-06 2.83247 0H27.1675C27.7163 -6.46233e-07 28.2532 0.167926 28.713 0.483373C29.1729 0.798819 29.5358 1.2482 29.7578 1.7769C29.9798 2.30561 30.0513 2.89087 29.9635 3.46155C29.8758 4.03224 29.6326 4.56378 29.2635 4.99157L20.0984 15.6134V23.8318C20.0989 24.3232 19.984 24.8071 19.7639 25.2404C19.5438 25.6736 19.2253 26.0428 18.8369 26.3149L14.3052 29.4979C13.8402 29.8252 13.2936 29.9999 12.7344 30ZM4.11302 3.58106L12.5639 13.3752C13.0385 13.9241 13.3012 14.6401 13.3005 15.3826V25.8996L16.6995 23.5124V15.3826C16.6989 14.6399 16.9617 13.9238 17.4365 13.3748L25.887 3.58106H4.11302Z" />
                            </svg>
                            <h3>Filter</h3>
                        </div>
                        <div class="transplantDonor-sort-function">
                            <svg class="transplantDonor-sort-function-icon" width="45" height="25" viewBox="0 0 45 25"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M37.2414 12.0536C37.2414 12.6929 36.9961 13.3061 36.5596 13.7582C36.1231 14.2103 35.5311 14.4643 34.9138 14.4643H10.0862C9.46889 14.4643 8.87686 14.2103 8.44035 13.7582C8.00385 13.3061 7.75862 12.6929 7.75862 12.0536C7.75862 11.4142 8.00385 10.801 8.44035 10.3489C8.87686 9.89684 9.46889 9.64286 10.0862 9.64286H34.9138C35.5311 9.64287 36.1231 9.89686 36.5596 10.349C36.9961 10.801 37.2414 11.4142 37.2414 12.0536ZM42.6724 0H2.32759C1.71027 0 1.11824 0.253985 0.681734 0.706082C0.245227 1.15818 0 1.77135 0 2.41071C0 3.05008 0.245227 3.66325 0.681734 4.11535C1.11824 4.56744 1.71027 4.82143 2.32759 4.82143H42.6724C43.2897 4.82143 43.8818 4.56744 44.3183 4.11535C44.7548 3.66325 45 3.05008 45 2.41071C45 1.77135 44.7548 1.15818 44.3183 0.706082C43.8818 0.253985 43.2897 0 42.6724 0ZM27.1552 19.2857H17.8448C17.2275 19.2857 16.6355 19.5397 16.199 19.9918C15.7625 20.4439 15.5172 21.0571 15.5172 21.6964C15.5172 22.3358 15.7625 22.949 16.199 23.4011C16.6355 23.8532 17.2275 24.1071 17.8448 24.1071H27.1552C27.7725 24.1071 28.3645 23.8532 28.801 23.4011C29.2375 22.949 29.4828 22.3358 29.4828 21.6964C29.4828 21.0571 29.2375 20.4439 28.801 19.9918C28.3645 19.5397 27.7725 19.2857 27.1552 19.2857Z" />
                            </svg>
                            <h3>Sort</h3>
                        </div>
                    </div>
                </div>


                <!--------------LATEST DONOR APPLICATION----------------->
                <div class="admintransplantRecipient">



                    <!--------------TRANSPLANT RECIPIENT------------------------>

                    <div class="transplantRecipient_container">
                        <div class="transplantRecipient__TITLE">
                            <h1>RECIPIENT</h1>
                        </div>
                        <div class="transplant_Container">

                            <?php   
                            while($row = mysqli_fetch_assoc($result)){
                            ?>

                            <div class="transplantRecipient1 transplantRecipient">
                                <label class="" for="transplantRecipient1">
                                    <input type="radio" name="transplantRecipient" id="transplantRecipient1" value="<?php echo $row['recipID']; ?>"
                                        class="option hide-radio">



                                    <div class="transplantRecipient__personal">
                                        <!----ID/DATE------>
                                        <div class="transplantRecipient__order">
                                            <h1 class="transplantRecipient__order__ID"><?php echo $row['recipID']; ?></h1>
                                        </div>
                                        <!---PERSONAL INFORMATION-->
                                        <div>
                                            <img class="transplantRecipient__personal__Image"
                                                src="../Images/AdminDashboard/profile-default.svg"
                                                alt="default profile">
                                        </div>
                                        <div>
                                            <h3 class="transplantRecipient__personal__name">
                                                <?php echo $row['recip_lastName'] ." " . $row['recip_firstName'] . ",";?>
                                            </h3>
                                            <h3 class="transplantRecipient__personal__name">
                                                <?php echo $row['recip_midName']; ?>
                                            </h3>
                                            <h3 class="transplantRecipient__personal__age">Age: <span
                                                    class="personal__age__value"><?php echo $row['recip_age']; ?></span></h3>
                                            <h3 class="transplantRecipient__personal__sex">Sex: <span
                                                    class="personal__sex_value"><?php echo $row['recip_sex']; ?></span></h3>
                                        </div>


                                        <!---BLOOD TYPE--->
                                        <h3 class="transplantRecipient__bloodtype"><?php echo $row['recip_bloodType']; ?></h3>
                                        <!---ORGAN IMAGE----->
                                        <img class="transplantRecipient__Organ"
                                            src="../Images/Organ-Assets/organ-liver.svg" alt="liver image">

                                        <!-------DATE REQUIRED--------->
                                        <h3 class="transplantRecipient__daterequired"><?php echo $row['recip_Urgency']; ?>
                                        <?php 
                                            if($row['recip_status'] == 1){
                                        ?>
                                        <div class="transplantRecipient__status" style="background-color: green;"></div>
                                        <?php 
                                        }
                                        else if($row['recip_status'] == 0){
                                        ?>
                                            <div class="transplantRecipient__status" style="background-color: yellow;"></div>
                                        <?php 
                                        }   
                                            else if($row['recip_status'] == 1){
                                        ?>
                                        <div class="transplantRecipient__status" style="background-color: red;"></div>
                                        <?php 
                                        } 
                                        ?>
                                        </h3>
                                        <!---FUNCTIONS----->
                                        <div class="transplantRecipient-function-container">
                                            <img class="transplantRecipient-edit"
                                                src="../Images/DonorApplicant/icon-editApplicant.svg"
                                                alt="edit applicant icon">
                                            <img class="transplantRecipient-delete"
                                                src="../Images/DonorApplicant/icon-deleteApplicant.svg" alt="Trash can">
                                        </div>
                                    </div>
                                </label>



                            </div>

                            <?php   
                            }
                            ?>


                        </div>

                    </div>


                    <!---------------------TRANSPLANT DONOR------------------------>

                    <div class="transplantDonor_container">
                        <!---1--->
                        <div class="transplantRecipient__TITLE">
                            <h1>DONOR</h1>
                        </div>
                        <div class="transplant_Container">
                            <?php   
                            while($rows = mysqli_fetch_assoc($result_donor)){
                            ?>
                                <div class="transplantDonor1 transplantDonor">
                                <label class="transplantDonor__profile" for="transplantDonor1">
                                    <input type="radio" name="transplantDonor" id="transplantDonor1" value="1"
                                        class="option hide-radio">


                                    <!---PERSONAL INFORMATION-->
                                    <div class="transplantDonor__personal">
                                        <!----ID/DATE------>
                                        <div class="transplantDonor__order">
                                            <h1 class="transplantDonor__order__ID"> <?php echo $rows['id'];?></h1>
                                        </div>
                                        <div>
                                            <img class="transplantDonor__personal__Image"
                                                src="../Images/AdminDashboard/profile-default.svg"
                                                alt="default profile">
                                        </div>
                                        <div>
                                                <h3 class="transplantDonor__personal__name">
                                                    <?php echo $rows['don_lastName'] . $rows['don_firstName'] . ",";?>
                                                </h3>
                                                <h3 class="transplantDonor__personal__name">
                                                    <?php echo $rows['don_midName']; ?>
                                                </h3>
                                            <h3 class="transplantDonor__personal__age">Age: <span
                                                    class="personal__age__value"><?php echo $rows['don_age'] ?></span></h3>
                                            <h3 class="transplantDonor__personal__sex">Sex: <span
                                                    class="personal__sex_value"><?php echo $rows['don_sex']?></span></h3>
                                        </div>

                                        <!---BLOOD TYPE--->
                                        <h3 class="transplantDonor__bloodtype"><?php echo $rows['don_bloodType'] ?></h3>
                                        <!---ORGAN IMAGE----->
                                        <?php 
                                        if($rows['don_giftOrgan'] == "Kidney"){
                                            ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/kidneys.png" alt="kidney">
                                            <?php
                                        }
                                        else if($rows['don_giftOrgan'] == "Liver"){
                                            ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/liver.png" alt="liver">
                                            <?php
                                        }
                                        else if($rows['don_giftOrgan'] == "Lungs"){
                                            ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/lungs.png" alt="lungs">
                                            <?php
                                        }
                                        else if($rows['don_giftOrgan'] == "Heart"){
                                            ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/heart.png" alt="heart">
                                            <?php
                                        }
                                        else if($rows['don_giftOrgan'] == "Pancreas"){
                                            ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/pancreas.png" alt="pancreas">
                                            <?php
                                        }
                                        else if($rows['don_giftOrgan'] == "Intestines"){
                                            ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/intestines.png" alt="intestine">
                                            <?php
                                        }
                                        else if($rows['don_giftOrgan'] == "Hands and Face"){
                                            ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/handsandface.png" alt="hands and face">
                                            <?php
                                        }
                                        else if($rows['don_giftOrgan'] == "Corneas"){
                                            ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/cornea.png" alt="corneas">
                                            <?php
                                        }
                                        else{
                                        ?>
                                            <img class="transplantDonor__Organ" src="../Images/Organ-Assets/icon-noOrgan.png" alt="None">
                                        <?php
                                        }
                                        ?>


                                        <!-----------STATUS------------->

                                        <!---FUNCTIONS----->
                                        <div class="transplantDonor-function-container">
                                            <img class="transplantDonor-edit"
                                                src="../Images/DonorApplicant/icon-editApplicant.svg"
                                                alt="edit applicant icon">
                                            <img class="transplantDonor-delete"
                                                src="../Images/DonorApplicant/icon-deleteApplicant.svg" alt="Trash can">
                                        </div>
                                    </div>
                                </label>
                                </div>
                            <?php
                            }
                            ?>


                        </div>




                    </div>
                </div>
                <div class="match-function-container">
                    <div class="match-function">
                        <img src="../Images/AdminDashboard/icon-match.svg" alt="Two people icon">
                        <h2>Match</h2>
                    </div>
                </div>

    </nav>
    <script src="../app/transplantRegistry.js"></script>
</body>

</html>