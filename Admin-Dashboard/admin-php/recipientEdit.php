<?php
include ('connection.php');




if (isset($_GET['ids'])) {
    $id = $_GET['ids'];
    // Rest of the code...

    $query = mysqli_query($conn, "SELECT * FROM donor_info_tbl WHERE id='$id'");

    echo $id;



}
function recip_firstName(){
  
    return $row['recip_firstName'];
}












/* 
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

*/


?>