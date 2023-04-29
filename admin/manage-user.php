<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage User</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying Session Message
                        unset($_SESSION['add']); //REmoving Session Message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                ?>
                <br><br>
                <a href="add-user.php" class="btn-primary">Add User</a>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Time</th>
                        <th>Actions</th>

                    </tr>

                    <?php 
                        //Get all the users from database
                        $sql = "SELECT * FROM tbl_users ORDER BY id DESC"; // DIsplay the Latest User at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //User Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the user details
                                $id = $row['id'];
                                $user_id = $row['user_id'];
                                $user_name = $row['user_name'];
                                $password = $row['password'];
                                $time = $row['time'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $user_id; ?></td>
                                        <td><?php echo $user_name; ?></td>
                                        <td><?php echo $password; ?></td>
                                        <td><?php echo $time; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Update User</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-user.php?id=<?php echo $id; ?>" class="btn-danger">Delete User</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Users not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>