<?php
    include ('../admin-php/connection.php');

    $id = $_GET['ids'];

   

    // Prepare the update statement using a parameterized query
    $statement = mysqli_prepare($conn, "UPDATE recipient_info_tbl SET recip_status = 1 WHERE recipID = ?");
    mysqli_stmt_bind_param($statement, "i", $id);

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
    header('Location: ../adminTransfusionRegistry.php');
    exit();
?>