<?php 
    require_once ('admin-php/connection.php');
    require 'admin-php/functions.php'; 

    $query = "SELECT * FROM donor_info_tbl WHERE isNewApplicant = 1";
    $result = mysqli_query($conn, $query);



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Donor Applicant</title>
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
            <div class="adminLinks current">
                <a class="adminLinks__DonorApplication" href="./adminDonorApplicant.php">
                    <img src="../Images/AdminDashboard/Icon-donorApplicant-current.svg" alt="Donor Applicant Icon">
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
            <div class="adminLinks flex">
                <a class="adminLinks__Transplant" href="./adminTransplantRegistry.php">
                    <img src="../Images/AdminDashboard/Icon-transplant-standby.svg" alt="Blood Transfusion Icon">
                    <h2>Transplant Registry</h2>
                </a>
            </div>
            <div class="adminLinks flex">
                <a class="adminLinks__LogOut" href="../Landing-Page/">
                    <img src="../Images/AdminDashboard/Icon-LogOut-standby.svg" alt="Log Out Icon">
                    <h2>Log Out</h2>
                </a>
            </div>
        </div>

        <!---------------ADMIN DASHBOARD CONTENT--------------------->

        <div class="adminDashboardContent">
            <h1 class="dashboard-title">DONOR APPLICANT</h1>
            <div class="content-fixed-container">



                <!-------------GENERAL FUNCTION---------------------->
                <div class="applicant-function_container">
                    <div class="applicant_add_container">
                        <!-----
                        <svg class="applicant-add-function-icon width=" 65" height="65" viewBox="0 0 65 65"
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

                        <h2 class="applicant-add-function-text">Add &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                            Organ Donor</h2>

                            ---------->
                    </div>

                    <div class="applicant-select-function_container">
                        <div class="applicant-search-function">
                            <input class="applicant-search-input" type="text" name="" id="" placeholder="Search">
                        </div>
                        <div class="applicant-filter-function">
                            <svg class="applicant-filter-function-icon" width="30" height="30" viewBox="0 0 30 30"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.7344 30C11.9832 29.9995 11.2628 29.6848 10.7317 29.1251C10.2005 28.5654 9.90194 27.8064 9.90161 27.0149V15.6134L0.73663 4.99172C0.367506 4.56393 0.124269 4.03238 0.0364825 3.46169C-0.0513038 2.89099 0.0201402 2.30571 0.242131 1.77699C0.464123 1.24827 0.827102 0.798866 1.28695 0.483404C1.74681 0.167942 2.28373 3.81238e-06 2.83247 0H27.1675C27.7163 -6.46233e-07 28.2532 0.167926 28.713 0.483373C29.1729 0.798819 29.5358 1.2482 29.7578 1.7769C29.9798 2.30561 30.0513 2.89087 29.9635 3.46155C29.8758 4.03224 29.6326 4.56378 29.2635 4.99157L20.0984 15.6134V23.8318C20.0989 24.3232 19.984 24.8071 19.7639 25.2404C19.5438 25.6736 19.2253 26.0428 18.8369 26.3149L14.3052 29.4979C13.8402 29.8252 13.2936 29.9999 12.7344 30ZM4.11302 3.58106L12.5639 13.3752C13.0385 13.9241 13.3012 14.6401 13.3005 15.3826V25.8996L16.6995 23.5124V15.3826C16.6989 14.6399 16.9617 13.9238 17.4365 13.3748L25.887 3.58106H4.11302Z" />
                            </svg>
                            <h3>Filter</h3>
                        </div>
                        <div class="applicant-sort-function">
                            <svg class="applicant-sort-function-icon" width="45" height="25" viewBox="0 0 45 25"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M37.2414 12.0536C37.2414 12.6929 36.9961 13.3061 36.5596 13.7582C36.1231 14.2103 35.5311 14.4643 34.9138 14.4643H10.0862C9.46889 14.4643 8.87686 14.2103 8.44035 13.7582C8.00385 13.3061 7.75862 12.6929 7.75862 12.0536C7.75862 11.4142 8.00385 10.801 8.44035 10.3489C8.87686 9.89684 9.46889 9.64286 10.0862 9.64286H34.9138C35.5311 9.64287 36.1231 9.89686 36.5596 10.349C36.9961 10.801 37.2414 11.4142 37.2414 12.0536ZM42.6724 0H2.32759C1.71027 0 1.11824 0.253985 0.681734 0.706082C0.245227 1.15818 0 1.77135 0 2.41071C0 3.05008 0.245227 3.66325 0.681734 4.11535C1.11824 4.56744 1.71027 4.82143 2.32759 4.82143H42.6724C43.2897 4.82143 43.8818 4.56744 44.3183 4.11535C44.7548 3.66325 45 3.05008 45 2.41071C45 1.77135 44.7548 1.15818 44.3183 0.706082C43.8818 0.253985 43.2897 0 42.6724 0ZM27.1552 19.2857H17.8448C17.2275 19.2857 16.6355 19.5397 16.199 19.9918C15.7625 20.4439 15.5172 21.0571 15.5172 21.6964C15.5172 22.3358 15.7625 22.949 16.199 23.4011C16.6355 23.8532 17.2275 24.1071 17.8448 24.1071H27.1552C27.7725 24.1071 28.3645 23.8532 28.801 23.4011C29.2375 22.949 29.4828 22.3358 29.4828 21.6964C29.4828 21.0571 29.2375 20.4439 28.801 19.9918C28.3645 19.5397 27.7725 19.2857 27.1552 19.2857Z" />
                            </svg>
                            <h3>Sort</h3>
                        </div>
                    </div>
                </div>


                <!--------------DONOR APPLICATION----------------->
                <div class="DonorApplicant">
                    <div class="DonorApplicant__contentTitle">
                        <h2 class="DonorApplicant__contentTitle__ID">ID</h2>
                        <h2 class="DonorApplicant__contentTitle__Profile">Profile</h2>
                        <h2 class="DonorApplicant__contentTitle__Contact">Contact</h2>
                        <h2 class="DonorApplicant__contentTitle__BloodType">Blood Type</h2>
                        <h2 class="DonorApplicant__contentTitle__Organ">Organ</h2>
                        <div class="DonorApplicant__contentTitle__empty"></div>
                    </div>
                    <div class="applicant_container">
                    

                    
                        <!--
                        <div class="applicant1 applicant">
                            <div class="applicant__order">
                                <h3 class="applicant__order__applicationdate">09-12-2001</h3>
                                <h1 class="applicant__order__applicantID">1</h1>
                            </div>


                            <!---PERSONAL INFORMATION-
                            <div class="applicant__personal">
                                <div>
                                    <img class="applicant__personal__Image"
                                        src="../Images/AdminDashboard/profile-default.svg" alt="default profile">
                                </div>
                                <div>
                                    <h3 class="applicant__personal__name">Yughie Perez</h3>
                                    <h3 class="applicant__personal__age">Age: <span
                                            class="personal__age__value">21</span></h3>
                                    <h3 class="applicant__personal__sex">Sex: <span
                                            class="personal__sex_value">Male</span></h3>
                                </div>
                            </div>
                            <!---CONTACT INFO----
                            <div class="applicant__contact">
                                <h3 class="applicant__contact__applicantemail">yughiep@gmail.com</h3>
                                <h3 class="applicant__contact__applicantnumber">092381293241</h3>
                            </div>
                            <!---BLOOD TYPE--
                            <h3 class="applicant__bloodtype">O+</h3>
                            <!---ORGAN IMAGE----
                            <img class="applicant__Organ" src="../Images/Organ-Assets/organ-liver.svg"
                                alt="liver image">
                            <!---FUNCTIONS----
                            <div class="applicant-function-container">
                                <img class="applicant-edit" src="../Images/DonorApplicant/icon-editApplicant.svg"
                                    alt="">
                                <img class="applicant-delete" src="../Images/DonorApplicant/icon-deleteApplicant.svg"
                                    alt="">
                                <img class="applicant-accept" src="../Images/AdminDashboard/icon-accept.svg"
                                    alt="accept applicant">
                                <img class="applicant-reject" src="../Images/AdminDashboard/icon-reject.svg"
                                    alt="rejectapplicant">
                            </div>
                        </div>
                        -->













                        
                        <?php   
                            while($row = mysqli_fetch_assoc($result)){
                            ?>

                                    <div class="applicant1 applicant">
                                        <div class="applicant__order">
                                            <h3 class="applicant__order__applicationdate">
                                                <?php 
                                                echo $dateOnly = date("Y-m-d", strtotime($row['created_at']));
                                                ?>
                                                <h3 class="applicant__order__applicationdate">
                                                <?php
                                                echo $dateOnly = date("H-i-s", strtotime($row['created_at']));
                                               
                                               
                                                 ?>
                                                </h3>
                                                
                                            </h3>
                                            <h1 class="applicant__order__applicantID">
                                                <?php echo $row['id'];?>
                                            </h1>
                                        </div>
                                        <!---PERSONAL INFORMATION-->
                                        <div class="applicant__personal">
                                            <div>
                                            

                                             <!----------IMAGE PROFILE----->


                                            <?php
                                                if ($row['don_userProfile'] !== null) {
                                                    $base64Image = base64_encode($row['don_userProfile']);
                                                    $imageSrc = 'data:image/jpeg;base64,' . $base64Image;

                                            ?>
                                                    <img class="applicant__personal__Image"
                                                    src="<?php echo $imageSrc ?>"
                                                    alt="default profile">
                                            <?php
                                                } else {
                                            ?>
                                                    <img class="applicant__personal__Image" src="../Images/AdminDashboard/profile-default.svg" alt="default profile">
                                                    
                                            <?php
                                                }
                                            ?>


                                 
                                           
                                             
                                            </div>
                                            <div>
                                                <h3 class="applicant__personal__name">
                                                    <?php echo $row['don_lastName'] . $row['don_firstName'] . ",";?>
                                                </h3>
                                                <h3 class="applicant__personal__name">
                                                    <?php echo $row['don_midName']; ?>
                                                </h3>
                                                
                                                <h3 class="applicant__personal__age"> Age:<span
                                                        class="personal__age__value">
                                                        <?php echo $row['don_age'] ?>
                                                    </span></h3>
                                                <h3 class="applicant__personal__sex">Sex: <span class="personal__sex_value">
                                                        <?php echo $row['don_sex']?>
                                                    </span></h3>
                                            </div>
                                        </div>
                                        <!---CONTACT INFO----->
                                        <div class="applicant__contact">
                                            <h3 class="applicant__contact__applicantnumber">
                                                <?php echo $row['don_phoneNum'] ?>
                                            </h3>
                                        </div>
                                        <!---BLOOD TYPE--->
                                        <h3 class="applicant__bloodtype">
                                            <?php echo $row['don_bloodType'] ?>
                                        </h3>
                                        <!---ORGAN IMAGE----->
                                        <?php 
                                        if($row['don_giftOrgan'] == "Kidney"){
                                            ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/kidneys.png" alt="kidney">
                                            <?php
                                        }
                                        else if($row['don_giftOrgan'] == "Liver"){
                                            ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/liver.png" alt="liver">
                                            <?php
                                        }
                                        else if($row['don_giftOrgan'] == "Lungs"){
                                            ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/lungs.png" alt="lungs">
                                            <?php
                                        }
                                        else if($row['don_giftOrgan'] == "Heart"){
                                            ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/heart.png" alt="heart">
                                            <?php
                                        }
                                        else if($row['don_giftOrgan'] == "Pancreas"){
                                            ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/pancreas.png" alt="pancreas">
                                            <?php
                                        }
                                        else if($row['don_giftOrgan'] == "Intestines"){
                                            ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/intestines.png" alt="intestine">
                                            <?php
                                        }
                                        else if($row['don_giftOrgan'] == "Hands and Face"){
                                            ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/handsandface.png" alt="hands and face">
                                            <?php
                                        }
                                        else if($row['don_giftOrgan'] == "Corneas"){
                                            ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/cornea.png" alt="corneas">
                                            <?php
                                        }
                                        else{
                                        ?>
                                            <img class="applicant__Organ" src="../Images/Organ-Assets/icon-noOrgan.png" alt="None">
                                        <?php
                                        }
                                        ?>
                                
                                        <!---FUNCTIONS----->
                                        <div class="applicant-function-container">
                                       
                                        <img class="applicant-accept" src="../Images/AdminDashboard/icon-accept.svg"
                                            alt="accept applicant">
                                            <a href="./admin-delete/applicant-delete.php?ids=<?php echo $row['id']; ?>">
                                                <img class="applicant-reject" src="../Images/AdminDashboard/icon-reject.svg"
                                                    alt="rejectapplicant">
                                            </a>
                                    </div>
                                </div>
                                    <?php  
                              }
                            ?>
                        </div>
                    </div>

                </div>


    </nav>
</body>

</html>