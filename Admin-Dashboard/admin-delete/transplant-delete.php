<?php
    include ('../admin-php/connection.php');
    
    $id_recipient=$_GET['id'];
    $id_donor=$_GET['ids'];

    $delete_recipient = mysqli_query($conn, "DELETE from recipient_info_tbl WHERE recipID='$id_recipient'");
    $delete_recipient = mysqli_query($conn, "DELETE from donor_info_tbl WHERE id='$id_recipient'");

    if ($delete_recipient || $delete_donor) {
        // Display a success message using JavaScript
        echo '<script>alert("Deleted successfully!");</script>';
    } else {
        // Display an error message using JavaScript
        echo '<script>alert("Deletion failed!");</script>';
    }
    

    // Redirect to a different page after a delay
    header('Location: ../adminTransplantRegistry.php');
    
 

    exit();