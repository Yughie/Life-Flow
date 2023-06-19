<?php
    include ('../admin-php/connection.php');
    
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    $id = $_GET['ids'];

    var_dump($id); // Check if the ID value is retrieved correctly

    // Prepare the update statement using a parameterized query
    $statement = mysqli_prepare($conn, "UPDATE donor_info_tbl SET isNewApplicant = 0 WHERE id = ?");
    mysqli_stmt_bind_param($statement, "s", $id);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($statement);

    if ($result) {
        // Display a success message using JavaScript
        echo '<script>alert("Accepted successfully!");</script>';
    } else {
        // Display an error message using JavaScript
        echo '<script>alert("Deletion failed!");</script>';
    }

    // Close the prepared statement
    mysqli_stmt_close($statement);

    // Redirect to a different page
    header('Location: ../adminDonorApplicant.php');
    exit();
?>