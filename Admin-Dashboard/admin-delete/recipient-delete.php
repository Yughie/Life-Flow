<?php
    include ('../admin-php/connection.php');
    
    $id=$_GET['ids'];

    $delete = mysqli_query($conn, "DELETE from recipient_info_tbl WHERE recipID='$id'");
    if ($delete) {
        // Display a success message using JavaScript
        echo '<script>alert("Deleted successfully!");</script>';
    } else {
        // Display an error message using JavaScript
        echo '<script>alert("Deletion failed!");</script>';
    }
    

    // Redirect to a different page after a delay
    header('Location: ../adminRecipient.php');
    
 
   
    exit();