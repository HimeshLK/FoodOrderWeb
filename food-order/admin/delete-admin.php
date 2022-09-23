<?php

    //include constants.php file here
    include('../config/constants.php');

    //1.Getting the ID of admin
    $id=$_GET['id'];

    //2.Create Sql Query to delete
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute query
    $res = mysqli_query($conn, $sql);

    //checking the query executed succesfully or not
    if($res==true)
    {
        //Admin Delete
        //create session variable todisplay msg
        $_SESSION['delete'] = "<div class='success'>Admin Removed Succesfully</div>";

        //redirect to manage admin page
        header("location:" .SITEURL.'admin/manage-admin.php');
    }
    else{
        //delete failed
        $_SESSION['delete'] = "<div class='error'>Failed to delete. Try Again! </div>";

        //redirect to manage admin page
        header("location:" .SITEURL.'admin/manage-admin.php');
    }

    //3.Redirect to manage admin page with a message (success/erreo)

?>