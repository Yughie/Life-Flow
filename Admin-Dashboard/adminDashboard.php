<?php 
    require_once ('admin-php/connection.php');
    require 'admin-php/functions.php'; 




?>








<!------------HTML---------------->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <nav class="adminDashboard">

        <div class="adminNavigation .hide-for-mobile">

            <img class="Logo" src="../Images/LOGO.png" alt="">

            <div class="greeting">
                <h1>Hi <span>Admin</span>!</h1>
            </div>
            <div class="adminLinks current">
                <a class="adminLinks__Dashboard" href="./adminDashboard.html">
                    <img src="../Images/AdminDashboard/icon-dashboard-current.svg" alt="Dashboard Icon">
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
            <div class="adminLinks">
                <a class="adminLinks__Recipient" href="./adminRecipient.html">
                    <img src="../Images/AdminDashboard/Icon-Recipient-standby.svg" alt="Recipient Icon">
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
            <h1 class="dashboard-title">DASHBOARD</h1>
            <div class="content-fixed-container">
                <div class="adminDashboardContent__summaryContainer">
                    <div class="grid-item totalApplication">
                        <h2 class="flash-Title">Total Application</h2>
                        <h1 class="statistic-total">
                            <?php 
                                echo display_applicationCount();                          
                            ?>
                        </h1>
                    </div>
                    <div class="grid-item TotalOrganDonor">
                        <h2 class="flash-Title">Total Organ Donation</h2>
                        <h1 class="statistic-total">
                            <?php 
                                echo display_organCount();                           
                            ?>
                        </h1>
                    </div>
                    <div class="grid-item OrganTransplantCandidate">
                        <h2 class="flash-Title">Organ Transplant Candidate</h2>
                        <h1 class="statistic-total">
                            <?php 
                                echo display_transplantCandidate();                               
                            ?>
                        </h1>
                    </div>
                    <div class="grid-item BloodRequest">
                        <h2 class="flash-Title">Blood Request</h2>
                        <h1 class="statistic-total">
                            <?php 
                                echo display_bloodRequestCount();                  
                            ?>
                        </h1>
                    </div>
                    <div class="grid-item TotalBloodSupply">
                        <h2 class="flash-Title">Total Blood Supply</h2>
                        <h1 class="statistic-total">03</h1>
                    </div>
                </div>


                <!--------------LATEST DONOR APPLICATION----------------->
                <div class="LatestDonorApplication">
                    <h2 class="LatestDonorApplication__Title">Latest Donor Application</h2>
                    <div class="latestApplication_container">
                        <div class="profile1 profile">
                            <h1 class="profile__ID">1</h1>
                            <img class="profile__Image" src="../Images/AdminDashboard/profile-default.svg"
                                alt="default profile">
                            <h3 class="profile__Name">Yughie</h3>
                            <h3 class="profile__ApplicationDate">September 12, 2001</h3>
                            <img class="profile__Organ" src="../Images/Organ-Assets/organ-liver.svg" alt="liver image">
                            <div class="applicatiion-function-container">
                                <img class="applicant-accept" src="../Images/AdminDashboard/icon-accept.svg"
                                    alt="accept applicant">
                                <img class="applicant-reject" src="../Images/AdminDashboard/icon-reject.svg"
                                    alt="rejectapplicant">
                            </div>
                        </div>
                        <div class="profile2 profile"></div>
                        <div class="profile3 profile"></div>
                        <div class="profile3 profile"></div>
                    </div>

                </div>
            </div>

        </div>


    </nav>
</body>

</html>