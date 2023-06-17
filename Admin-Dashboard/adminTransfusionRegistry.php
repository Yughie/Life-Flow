<?php 
    require_once ('admin-php/connection.php');
    require 'admin-php/functions.php'; 

    $query = "SELECT * FROM recipient_info_tbl WHERE recip_boolBlood =1 AND recip_status != '1'";
    $result = mysqli_query($conn, $query);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Transfusion Registry</title>
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
            <div class="adminLinks current">
                <a class="adminLinks__BloodTransfusion" href="adminTransfusionRegistry.php">
                    <img src="../Images/AdminDashboard/icon-bloodTransfusion-current.svg" alt="Blood Transfusion Icon">
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
                <a class="adminLinks__LogOut" href="../Landing-Page/Landing-Page.html">
                    <img src="../Images/AdminDashboard/Icon-LogOut-standby.svg" alt="Log Out Icon">
                    <h2>Log Out</h2>
                </a>
            </div>
        </div>

        <!---------------ADMIN DASHBOARD CONTENT--------------------->

        <div class="adminDashboardContent">
            <h1 class="dashboard-title">TRANSFUSION REGISTRY</h1>
            <div class="content-fixed-container">

                <!-----------BLOOOD TYPE CONTAINER--------------------------->
                <div class="bloodType_Container">

                    <input type="radio" name="blooodtype" id="option1" value="1" class="option hide-radio">
                    <label for="option1">
                        <div class="bloodtype1 bloodtype">
                            <div class="bloodtype__name bloodtype__name1" for="onegative">O-</div>
                            <div class="bloodtype__count bloodtype__count1"><?php echo display_TypeONegativeCount(); ?></div>

                        </div>
                    </label>
                    <input type="radio" name="blooodtype" id="option2" value="2" class="option hide-radio">
                    <label for="option2">
                        <div class="bloodtype2 bloodtype">
                            <div class="bloodtype__name bloodtype__name2">O+</div>
                            <div class="bloodtype__count bloodtype__count2"><?php echo display_TypeOPositiveCount(); ?></div>
                        </div>
                    </label>
                    <input type="radio" name="blooodtype" id="option3" value="3" class="option hide-radio">
                    <label for="option3">
                        <div class="bloodtype3 bloodtype">
                            <div class="bloodtype__name bloodtype__name3">B-</div>
                            <div class="bloodtype__count bloodtype__count3"><?php echo display_TypeBNegativeCount(); ?></div>
                        </div>
                    </label>
                    <input type="radio" name="blooodtype" id="option4" value="4" class="option hide-radio">
                    <label for="option4">
                        <div class="bloodtype4 bloodtype">
                            <div class="bloodtype__name bloodtype__name4">B+</div>
                            <div class="bloodtype__count bloodtype__count4"><?php echo display_TypeBPositiveCount(); ?></div>
                        </div>
                    </label>
                    <input type="radio" name="blooodtype" id="option5" value="5" class="option hide-radio">
                    <label for="option5">
                        <div class="bloodtype5 bloodtype">
                            <div class="bloodtype__name bloodtype__name5">A-</div>
                            <div class="bloodtype__count bloodtype__count5"><?php echo display_TypeANegativeCount(); ?></div>
                        </div>
                    </label>
                    <input type="radio" name="blooodtype" id="option6" value="6" class="option hide-radio">
                    <label for="option6">
                        <div class="bloodtype6 bloodtype">
                            <div class="bloodtype__name bloodtype__name6">A+</div>
                            <div class="bloodtype__count bloodtype__count6"><?php echo display_TypeAPositiveCount(); ?></div>
                        </div>
                    </label>
                    <input type="radio" name="blooodtype" id="option7" value="7" class="option hide-radio">
                    <label for="option7">
                        <div class="bloodtype7 bloodtype">
                            <div class="bloodtype__name bloodtype__name7">AB-</div>
                            <div class="bloodtype__count bloodtype__count7"><?php echo display_TypeABNegativeCount(); ?></div>
                        </div>
                    </label>
                    <input type="radio" name="blooodtype" id="option8" value="8" class="option hide-radio">
                    <label for="option8">
                        <div class="bloodtype8 bloodtype">
                            <div class="bloodtype__name bloodtype__name8">AB+</div>
                            <div class="bloodtype__count bloodtype__count8"><?php echo display_TypeABPositiveCount(); ?></div>
                        </div>
                    </label>
                </div>
                <!-------------GENERAL FUNCTION---------------------->
                <div class="transfusion-function_container">
                    <div class="transfusion_add_container">

                    </div>

                    <div class="transfusion-select-function_container">
                        <div class="transfusion-search-function">
                            <input class="transfusion-search-input" type="text" name="" id="" placeholder="Search">
                        </div>
                        <div class="transfusion-filter-function">
                            <svg class="transfusion-filter-function-icon" width="30" height="30" viewBox="0 0 30 30"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.7344 30C11.9832 29.9995 11.2628 29.6848 10.7317 29.1251C10.2005 28.5654 9.90194 27.8064 9.90161 27.0149V15.6134L0.73663 4.99172C0.367506 4.56393 0.124269 4.03238 0.0364825 3.46169C-0.0513038 2.89099 0.0201402 2.30571 0.242131 1.77699C0.464123 1.24827 0.827102 0.798866 1.28695 0.483404C1.74681 0.167942 2.28373 3.81238e-06 2.83247 0H27.1675C27.7163 -6.46233e-07 28.2532 0.167926 28.713 0.483373C29.1729 0.798819 29.5358 1.2482 29.7578 1.7769C29.9798 2.30561 30.0513 2.89087 29.9635 3.46155C29.8758 4.03224 29.6326 4.56378 29.2635 4.99157L20.0984 15.6134V23.8318C20.0989 24.3232 19.984 24.8071 19.7639 25.2404C19.5438 25.6736 19.2253 26.0428 18.8369 26.3149L14.3052 29.4979C13.8402 29.8252 13.2936 29.9999 12.7344 30ZM4.11302 3.58106L12.5639 13.3752C13.0385 13.9241 13.3012 14.6401 13.3005 15.3826V25.8996L16.6995 23.5124V15.3826C16.6989 14.6399 16.9617 13.9238 17.4365 13.3748L25.887 3.58106H4.11302Z" />
                            </svg>
                            <h3>Filter</h3>
                        </div>
                        <div class="transfusion-sort-function">
                            <svg class="transfusion-sort-function-icon" width="45" height="25" viewBox="0 0 45 25"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M37.2414 12.0536C37.2414 12.6929 36.9961 13.3061 36.5596 13.7582C36.1231 14.2103 35.5311 14.4643 34.9138 14.4643H10.0862C9.46889 14.4643 8.87686 14.2103 8.44035 13.7582C8.00385 13.3061 7.75862 12.6929 7.75862 12.0536C7.75862 11.4142 8.00385 10.801 8.44035 10.3489C8.87686 9.89684 9.46889 9.64286 10.0862 9.64286H34.9138C35.5311 9.64287 36.1231 9.89686 36.5596 10.349C36.9961 10.801 37.2414 11.4142 37.2414 12.0536ZM42.6724 0H2.32759C1.71027 0 1.11824 0.253985 0.681734 0.706082C0.245227 1.15818 0 1.77135 0 2.41071C0 3.05008 0.245227 3.66325 0.681734 4.11535C1.11824 4.56744 1.71027 4.82143 2.32759 4.82143H42.6724C43.2897 4.82143 43.8818 4.56744 44.3183 4.11535C44.7548 3.66325 45 3.05008 45 2.41071C45 1.77135 44.7548 1.15818 44.3183 0.706082C43.8818 0.253985 43.2897 0 42.6724 0ZM27.1552 19.2857H17.8448C17.2275 19.2857 16.6355 19.5397 16.199 19.9918C15.7625 20.4439 15.5172 21.0571 15.5172 21.6964C15.5172 22.3358 15.7625 22.949 16.199 23.4011C16.6355 23.8532 17.2275 24.1071 17.8448 24.1071H27.1552C27.7725 24.1071 28.3645 23.8532 28.801 23.4011C29.2375 22.949 29.4828 22.3358 29.4828 21.6964C29.4828 21.0571 29.2375 20.4439 28.801 19.9918C28.3645 19.5397 27.7725 19.2857 27.1552 19.2857Z" />
                            </svg>
                            <h3>Sort</h3>
                        </div>
                    </div>
                </div>


                <!--------------ADMIN TRARANSFUSION TITLES---------------->
                <div class="admintransfusion">
                    <div class="admintransfusion__contentTitle">
                        <h2 class="admintransfusion__contentTitle__ID">ID</h2>
                        <h2 class="admintransfusion__contentTitle__Profile">Profile</h2>
                        <h2 class="admintransfusion__contentTitle__Contact">Contact</h2>
                        <h2 class="admintransfusion__contentTitle__BloodType">Blood Type</h2>
                        <!---
                        <h2 class="admintransfusion__contentTitle__Organ">Organ</h2>
                        
                        -->

                        <h2 class="admintransfusion__contentTitle__DateRequired">Date Required</h2>
                        <h2 class="admintransfusion__contentTitle__Status">Status</h2>
                        <div class="admintransfusion__contentTitle__empty"></div>
                    </div>
                    <div class="transfusion_container">


                        <!---
                        <div class="transfusion1 transfusion">
                            ----ID/DATE-----
                            <div class="transfusion__order">
                                <h1 class="transfusion__order__ID">1</h1>
                            </div>
                            <---PERSONAL INFORMATION-
                            <div class="transfusion__personal">
                                <div>
                                    <img class="transfusion__personal__Image"
                                        src="../Images/AdminDashboard/profile-default.svg" alt="default profile">
                                </div>
                                <div>
                                    <h3 class="transfusion__personal__name">Yughie Perez</h3>
                                    <h3 class="transfusion__personal__age">Age: <span
                                            class="personal__age__value">21</span></h3>
                                    <h3 class="transfusion__personal__sex">Sex: <span
                                            class="personal__sex_value">Male</span></h3>
                                </div>
                            </div>
                            <---CONTACT INFO----
                            <div class="transfusion__contact">
                                <h3 class="transfusion__contact__email">yughiep@gmail.com</h3>
                                <h3 class="transfusion__contact__number">092381293241</h3>
                            </div>
                            <---BLOOD TYPE---
                            <h3 class="transfusion__bloodtype">O+</h3>
                            <---ORGAN IMAGE
                                <img class="transfusion__Organ" src="../Images/Organ-Assets/organ-liver.svg" alt="liver image">
                                ----->
                            <!-------DATE REQUIRED---------
                            <h3 class="transfusion__daterequired">09-12-01</h3>

                            <-----------STATUS-------------
                            <div class="transfusion__status"></div>
                            <-----------FUNCTION-------------------
                            <div class="transfusion-function-container">
                                <svg class="transfusion__function" width="60" height="50" viewBox="0 0 60 50"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M49.5837 42.5172H35.4774C35.1953 43.1974 34.8191 43.8777 34.3019 44.4533C33.2439 45.6307 31.8568 46.2586 30.3521 46.2586C28.8474 46.2586 27.4603 45.6307 26.4023 44.4533L16.4809 33.4122C16.0342 32.9151 16.0342 32.1825 16.4809 31.6854C16.9276 31.1883 17.5859 31.1883 18.0326 31.6854L28.0246 42.805C29.3176 44.244 31.4336 44.244 32.7737 42.805C34.0668 41.366 34.0668 39.0113 32.7737 37.5199L20.3366 23.6794C18.2677 21.377 15.5875 20.2781 12.9308 20.1996H0V35.0867H6.2538C7.71145 35.0867 9.09858 35.7146 10.2036 36.892L18.8554 46.5202C20.9714 48.875 23.9337 50 26.6609 50H49.5837C51.4175 50 52.9222 48.3255 52.9222 46.2848C52.9222 44.244 51.4175 42.5172 49.5837 42.5172ZM56.4958 19.938C60.7042 15.8303 61.2214 8.66142 57.5068 3.89964C53.8156 -0.783659 47.3737 -1.35926 43.0948 2.7746L41.6371 4.18744L40.1795 2.7746C35.9711 -1.3331 29.4587 -0.783659 25.7675 3.89964C22.0529 8.58293 22.5701 15.8303 26.7785 19.938L41.402 36.6304L56.4958 19.938Z" />
                                </svg>
                            </div>

                        </div>
                         --->

                        <?php   
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <div class="transfusion1 transfusion">
                            <!----ID/DATE------>
                            <div class="transfusion__order">
                                <h1 class="transfusion__order__ID"><?php echo $row['recipID']; ?></h1>
                            </div>
                            <!---PERSONAL INFORMATION-->
                            <div class="transfusion__personal">
                                <div>
                                    <img class="transfusion__personal__Image"
                                        src="../Images/AdminDashboard/profile-default.svg" alt="default profile">
                                </div>
                                <div>
                                <h3 class="transfusion__personal__name">
                                            <?php echo $row['recip_lastName'] ." " . $row['recip_firstName'] . ",";?>
                                    </h3>
                                    <h3 class="transfusion__personal__name">
                                        <?php echo $row['recip_midName']; ?>
                                    </h3>
                                    <h3 class="transfusion__personal__age">Age: <span
                                            class="personal__age__value"><?php echo $row['recip_age']; ?></span></h3>
                                    <h3 class="transfusion__personal__sex">Sex: <span
                                            class="personal__sex_value"><?php echo $row['recip_sex']; ?></span></h3>
                                </div>
                            </div>
                            <!---CONTACT INFO----->
                            <div class="transfusion__contact">
                                
                                <h3 class="transfusion__contact__number"><?php echo $row['recip_phoneNum']; ?></h3>
                            </div>
                                <!---BLOOD TYPE--->
                            <h3 class="transfusion__bloodtype"><?php echo $row['recip_bloodType']; ?></h3>
                            <!---ORGAN IMAGE
                                <img class="transfusion__Organ" src="../Images/Organ-Assets/organ-liver.svg" alt="liver image">
                                ----->
                            <!-------DATE REQUIRED--------->
                            <h3 class="transfusion__daterequired"><?php echo $row['recip_Urgency']; ?></h3>

                            <!-----------STATUS------------->
                            <?php 
                                if($row['recip_status'] == 1){
                            ?>
                               <div class="transfusion__status" style="background-color: green;"></div>
                            <?php 
                            }
                            else if($row['recip_status'] == 0){
                            ?>
                                <div class="transfusion__status" style="background-color: yellow;"></div>
                            <?php 
                             }   
                                else if($row['recip_status'] == -1){
                            ?>
                            <div class="transfusion__status" style="background-color: red;"></div>
                            <?php 
                             } 
                            ?>
                            <!-----------FUNCTION------------------->
                            <div class="transfusion-function-container">
                                <svg class="transfusion__function" width="60" height="50" viewBox="0 0 60 50"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M49.5837 42.5172H35.4774C35.1953 43.1974 34.8191 43.8777 34.3019 44.4533C33.2439 45.6307 31.8568 46.2586 30.3521 46.2586C28.8474 46.2586 27.4603 45.6307 26.4023 44.4533L16.4809 33.4122C16.0342 32.9151 16.0342 32.1825 16.4809 31.6854C16.9276 31.1883 17.5859 31.1883 18.0326 31.6854L28.0246 42.805C29.3176 44.244 31.4336 44.244 32.7737 42.805C34.0668 41.366 34.0668 39.0113 32.7737 37.5199L20.3366 23.6794C18.2677 21.377 15.5875 20.2781 12.9308 20.1996H0V35.0867H6.2538C7.71145 35.0867 9.09858 35.7146 10.2036 36.892L18.8554 46.5202C20.9714 48.875 23.9337 50 26.6609 50H49.5837C51.4175 50 52.9222 48.3255 52.9222 46.2848C52.9222 44.244 51.4175 42.5172 49.5837 42.5172ZM56.4958 19.938C60.7042 15.8303 61.2214 8.66142 57.5068 3.89964C53.8156 -0.783659 47.3737 -1.35926 43.0948 2.7746L41.6371 4.18744L40.1795 2.7746C35.9711 -1.3331 29.4587 -0.783659 25.7675 3.89964C22.0529 8.58293 22.5701 15.8303 26.7785 19.938L41.402 36.6304L56.4958 19.938Z" />
                                </svg>
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
    <script src="../app/transfusionRegistry.js"></script>
</body>

</html>