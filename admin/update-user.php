<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update User</h1>

        <br><br>

        <?php 
            //1. Get the ID of Selected Admin
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_users WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "User Available";
                    $row=mysqli_fetch_assoc($res);

                    $user_id = $row['user_id'];
                    $username = $row['user_name'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/manage-user.php');
                }
            }
        
        ?>

        
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>User ID: </td>
                    <td>
                        <input type="number" name="user_id" placeholder="Enter User ID" value="<?php echo $user_id; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update User" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE tbl_users SET
        user_id = $user_id,
        user_name = '$username' 
        WHERE id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>User Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-user.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Delete User.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-user.php');
        }
    }

?>

<?php include('partials/footer.php'); ?>
