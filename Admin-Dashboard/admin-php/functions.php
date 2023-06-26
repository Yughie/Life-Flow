<?php
require 'connection.php';


//APPLICATION COUNT
function display_applicationCount(){
    global $conn;
    $query_applicationCount = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE isNewApplicant = 1";
    $result_applicationCount = mysqli_query($conn, $query_applicationCount);
    
    // Fetch the result
    $row_applicationCount = mysqli_fetch_assoc($result_applicationCount);
    $count_applicationCount = $row_applicationCount['count'];

    if($count_applicationCount < 10){
        return "0" . $count_applicationCount;
    }else{
        return $count_applicationCount;
    }
}

function display_organCount(){
    global $conn;
    $query_totalOrgan = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE isOrganAvailable =1 AND isDeceased = 1";
    $result_totalOrgan = mysqli_query($conn, $query_totalOrgan);

    // Fetch the result
    $row_totalOrgan = mysqli_fetch_assoc($result_totalOrgan);
    $count_totalOrgan = $row_totalOrgan['count'];

    if($count_totalOrgan < 10){
        return "0" . $count_totalOrgan;
    }else{
        return $count_totalOrgan;
    }
}

function display_transplantCandidate(){
    global $conn;
    $query_forOrganTransplant = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 0 AND recip_status != 1";
    $result_forOrganTransplant = mysqli_query($conn, $query_forOrganTransplant);

    // Fetch the result
    $row_forOrganTransplant = mysqli_fetch_assoc($result_forOrganTransplant);
    $count_forOrganTransplant = $row_forOrganTransplant['count'];

    if($count_forOrganTransplant < 10){
        return "0" . $count_forOrganTransplant;
    }else{
        return $count_forOrganTransplant;
    }

}

function display_transfusionCandidate(){
    global $conn;
    $query_forBloodTransfusion = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1";
    $result_forBloodTransfusion = mysqli_query($conn, $query_forBloodTransfusion);

    // Fetch the result
    $row_forBloodTransfusion = mysqli_fetch_assoc($result_forBloodTransfusion);
    $count_forBloodTransfusion = $row_forBloodTransfusion['count'];

    if($count_forBloodTransfusion < 10){
        return "0" . $count_forBloodTransfusion;
    }else{
        return $count_forBloodTransfusion;
    }
}

function display_bloodRequestCount(){
    global $conn;
    $query_forBloodTransfusion = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1";
    $result_forBloodTransfusion = mysqli_query($conn, $query_forBloodTransfusion);

    // Fetch the result
    $row_forBloodTransfusion = mysqli_fetch_assoc($result_forBloodTransfusion);
    $count_forBloodTransfusion = $row_forBloodTransfusion['count'];

    if($count_forBloodTransfusion < 10){
        return "0" . $count_forBloodTransfusion;
    }else{
        return $count_forBloodTransfusion;
    }

}



function display_bloodCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_boolBlood = 1 AND isBloodAvailable = 1 AND isNewApplicant != 1";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}




function display_TypeONegativeCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1 AND recip_bloodType = 'O-'";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}
function display_TypeOPositiveCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1 AND recip_bloodType = 'O+'";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}
function display_TypeBNegativeCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1 AND recip_bloodType = 'B-'";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}
function display_TypeBPositiveCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1 AND recip_bloodType = 'B+'";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}
function display_TypeANegativeCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1 AND recip_bloodType = 'A-'";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}
function display_TypeAPositiveCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1 AND recip_bloodType = 'A+'";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}

function display_TypeABNegativeCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1 AND recip_bloodType = 'AB-'";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}

function display_TypeABPositiveCount(){
    global $conn;

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != 1 AND recip_bloodType = 'AB+'";
    $result = mysqli_query($conn, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if($count < 10){
        return "0" . $count;
    }else{
        return $count;
    }
}




//==========================ORGAN COUNT DECEASED====================================//

function organCount_liver(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Liver' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organCount_cornea(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Corneas' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organCount_heart(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Heart' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organCount_pancreas(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Pancreas' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organCount_kidneys(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Kidney' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organCount_lungs(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Lungs' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organCount_intestine(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Intestines' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organCount_handsandface(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Hands and Face' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isDeceased = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}



//==========================ORGAN COUNT DECEASED====================================//

function organ_liver(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Liver' AND isNewApplicant = 0 AND don_boolOrganTissue = 1  AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organ_cornea(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Corneas' AND isNewApplicant = 0 AND don_boolOrganTissue = 1  AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organ_heart(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Heart' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organ_pancreas(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Pancreas' AND isNewApplicant = 0 AND don_boolOrganTissue = 1  AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organ_kidneys(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Kidney' AND isNewApplicant = 0 AND don_boolOrganTissue = 1  AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organ_lungs(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Lungs' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organ_intestine(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Intestines' AND isNewApplicant = 0 AND don_boolOrganTissue = 1  AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function organ_handsandface(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_giftOrgan = 'Hands and Face' AND isNewApplicant = 0 AND don_boolOrganTissue = 1 AND isOrganAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}












//BLOOD DONOR COUNT
function bloodCount_Oneg(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_bloodType= 'O-'  AND isNewApplicant = 0 AND don_boolBlood = 1  AND isBloodAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function bloodCount_Opos(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_bloodType= 'O+'  AND isNewApplicant = 0 AND don_boolBlood = 1  AND isBloodAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function bloodCount_Bneg(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_bloodType= 'B-'  AND isNewApplicant = 0 AND don_boolBlood = 1  AND isBloodAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function bloodCount_Bpos(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_bloodType= 'B+'  AND isNewApplicant = 0 AND don_boolBlood = 1  AND isBloodAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function bloodCount_Aneg(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_bloodType= 'A-'  AND isNewApplicant = 0 AND don_boolBlood = 1  AND isBloodAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function bloodCount_Apos(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_bloodType= 'A+'  AND isNewApplicant = 0 AND don_boolBlood = 1  AND isBloodAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function bloodCount_ABneg(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_bloodType= 'AB-'  AND isNewApplicant = 0 AND don_boolBlood = 1  AND isBloodAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function bloodCount_ABpos(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE don_bloodType= 'AB+'  AND isNewApplicant = 0 AND don_boolBlood = 1  AND isBloodAvailable = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}




///RECIPIENT ORGAN REQUEST

function recipOrganCount_liver(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_neededOrgan = 'Liver' AND recip_status = 0 AND recip_boolBlood = 0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function recipOrganCount_Cornea(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_neededOrgan = 'Corneas' AND recip_status = 0 AND recip_boolBlood = 0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function recipOrganCount_Heart(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_neededOrgan = 'Heart' AND recip_status = 0 AND recip_boolBlood = 0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function recipOrganCount_pangcreas(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_neededOrgan = 'Pancreas' AND recip_status = 0 AND recip_boolBlood = 0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function recipOrganCount_kidneys(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_neededOrgan = 'Kidney' AND recip_status = 0 AND recip_boolBlood = 0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function recipOrganCount_lungs(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_neededOrgan = 'Lungs' AND recip_status = 0 AND recip_boolBlood = 0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function recipOrganCount_intestine(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_neededOrgan = 'Intestines' AND recip_status = 0 AND recip_boolBlood = 0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}
function recipOrganCount_handsandface(){
    global $conn;
    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_neededOrgan = 'Hands and Face' AND recip_status = 0 AND recip_boolBlood = 0";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    
    return $count;
}