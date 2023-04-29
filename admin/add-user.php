<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add User</h1>

        <br><br>

        
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>User ID: </td>
                    <td>
                        <input type="number" name="user_id" placeholder="Enter User ID">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Password">
                    </td>
                </tr>

                <tr>
                    <td>Time: </td>
                    <td>
                        <input type="date" name="time" placeholder="Select time">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add User" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5
        $time = $_POST['time'];

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_users SET 
            user_id=$user_id,
            user_name='$username',
            password='$password',
            time='$time'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-user.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add User.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-user.php');
        }

    }
    
?>