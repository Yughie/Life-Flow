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
    $query_totalOrgan = "SELECT COUNT(*) as count FROM donor_info_tbl WHERE isOrganAvailable =1 AND isDeceased = '1'";
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
    $query_forOrganTransplant = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 0 AND recip_status != '1'";
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
    $query_forBloodTransfusion = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1'";
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
    $query_forBloodTransfusion = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1'";
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

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1' AND recip_bloodType = 'O-'";
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

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1' AND recip_bloodType = 'O+'";
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

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1' AND recip_bloodType = 'B-'";
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

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1' AND recip_bloodType = 'B+'";
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

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1' AND recip_bloodType = 'A-'";
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

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1' AND recip_bloodType = 'A+'";
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

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1' AND recip_bloodType = 'AB-'";
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

    $query = "SELECT COUNT(*) as count FROM recipient_info_tbl WHERE recip_boolBlood = 1 AND recip_status != '1' AND recip_bloodType = 'AB+'";
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