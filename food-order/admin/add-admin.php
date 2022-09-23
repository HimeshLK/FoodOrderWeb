<!-- Header Calls -->
<?php include('partials/menu.php')?>
    <div class="main-content">
        <div class="wrapper">

            <h1>Add Admin</h1>

            <br><br>

            <?php 
                if (isset($_SESSION['add'])) 
                {
                    echo $_SESSION['add'];// Displaying session msg
                    unset($_SESSION['add']); //Removing Session Msg
                } 
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td> <input type="text" name="Full_name" placeholder="Enter Your Full Name"></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td> <input type="text" name="Username" placeholder="Enter a User Name"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td> <input type="password" name="Password" placeholder="Enter a Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-primary">
                        </td>
                    </tr>

                </table>

            </form>
        </div>

    </div>

<!-- Footer Calls -->
<?php include('partials/footer.php')?>

<?php 
    //process the value from the form and saving it in databse
    //Check wether the submit btn is clicked or not

    if(isset($_POST['submit']))
    {
        //btn clicked 
        //echo "Button Clicked";

        // 1. Getting data from form
        $full_name = $_POST['Full_name'];
        $user_name = $_POST['Username'];
        $password = md5($_POST['Password']); //password is encrypted using MD5

        // 2. SQL To save data to DB
        $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$user_name',
        password='$password'
        ";

        // 3. Execute quary and save data to Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. check wether the (Query is executed) data is inserted or not and display appropriate messages
        if($res==TRUE)
        {
            //data inserted
            //echo "Data Inserted";
            //Create a session variable to display message
            $_SESSION['add'] = "Admin Added Succesfully";
            //redirect page
            header("location:" .SITEURL.'admin/manage-admin.php');
        }

        else {
            //failed to insert data
            //echo "Fail To insert data";
            $_SESSION['add'] = "Failed to add Admin";
            //redirect page
            header("location:" .SITEURL.'admin/manage-admin.php');
        }
        
    }

?>
