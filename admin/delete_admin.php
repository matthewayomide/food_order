<?php

    // Include constant.php file here
    include('../config/constants.php');

    // 1. get the ID of Admin to be deleted
  echo  $id = $_GET['id'];

    //2.  Create SQL Query to delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id =$id";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // check whether the query is executed succefully
    if($res == True){
        // Query Executed Successfully  and Admin Deleted
        // echo "Admin Deleted";
        // Create SESSION variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        // Redirect to Manage Admin Page
        header('Location:'.SITEURL.'admin/manage_admin.php');
    }
    else{
        // Failed to Delete Admin
        // echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('Location:'.SITEURL.'admin/manage_admin.php');
    }

    //3. Redirect to Manage Admin page with message(success/error)
?>