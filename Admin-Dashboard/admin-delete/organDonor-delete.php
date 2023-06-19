<?php
    include ('../admin-php/connection.php');
    
    $id=$_GET['ids'];

    $delete = mysqli_query($conn, "DELETE from donor_info_tbl WHERE id='$id'");
    if ($delete) {
        // Display a success message using JavaScript
        echo '<script>alert("Deleted successfully!");</script>';
    } else {
        // Display an error message using JavaScript
        echo '<script>alert("Deletion failed!");</script>';
    }
    
    // Redirect to a different page using PHP header
    
    // Start output buffering
 

    // Redirect to a different page after a delay
    header('Location: ../adminOrganDonor.php');
    
    // Flush output buffer
   
    exit();