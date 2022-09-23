   <!-- Author: Himesh Fernando;
   Theme : Food order system Admin pannel;
   Version : 1.0;
   Page : Manage Admin Page -->

<!-- Header Calls -->
<?php include('partials/menu.php')?>

    <!-- Main cintent section starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            
            <br><br><br>

            <?php 
                if (isset($_SESSION['add'])) 
                {
                    echo $_SESSION['add'];// Displaying session msg
                    unset($_SESSION['add']); //Removing Session Msg
                } 
                if (isset($_SESSION['delete'])) 
                {
                    echo $_SESSION['delete'];// Displaying session msg
                    unset($_SESSION['delete']); //Removing Session Msg
                } 
                if (isset($_SESSION['update'])) 
                {
                    echo $_SESSION['update'];// Displaying session msg
                    unset($_SESSION['update']); //Removing Session Msg
                } 
                if(isset($_SESSION['user-not-found'])) //Password Section
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
                
            ?>

            <br><br><br>
            <!-- Button to add Admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>
                
                <?php 
                    //Query to get all admin data
                    $sql = "SELECT * FROM tbl_admin";

                    //Execute query
                    $res = mysqli_query($conn, $sql);

                    //check wether the query is executed 
                    if($res==TRUE)
                    {
                        //Count rows to check that we have data in database or not
                        $count = mysqli_num_rows($res); //function to get all roes in DB

                        $sn=1; //Create a variable and asign a value 
                        if($count>0)
                        {
                            //We have data in database
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //display values in table 
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?> </td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?> " class="btn-secondry">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?> " class="btn-delete">Delete Admin</a>
                                    </td> 
                                    
                                </tr>

                                <?php 
                                
                            
                            }
                        }
                        else{
                            // we dont have data in DB

                        }
                    }
                ?>
                

            </table>
            
        </div>
    </div>
    <!-- Main cintent section ends -->

<!-- Footer Calls -->
<?php include('partials/footer.php')?>