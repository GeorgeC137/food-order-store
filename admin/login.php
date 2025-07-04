<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login Form Starts HEre -->
            <div>

            </div>
            
            <form action="" name="form" method="POST" class="text-center" onsubmit="return isvalid()">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->

            <p class="text-center">Created By - <a href="#">George Omollo</a></p>
        </div>
        <script>
            function isvalid(){
                var username = document.form.username.value;
                var password = document.form.password.value;
                if(username.length == '' && password.length==''){
                    alert('Username and Password field is empty!!!');
                    return false
                } else{
                    if(username.length == ''){
                        alert('Username field is empty!!!');
                        return false
                    }
                    if(password.length == ''){
                        alert('Password field is empty!!!');
                        return false
                    } 
                }
            }
        </script>
    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);
        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            //2. SQL to check whether the user with username and password exists or not
            $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

            //3. Execute the Query
            $res = mysqli_query($conn, $sql);

            //4. COunt rows to check whether the user exists or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //User AVailable and Login Success
                $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
                $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

                //REdirect to HOme Page/Dashboard
                header('location:'.SITEURL.'admin/');
            }
            else
            {
                //User not Available and Login FAil
                //$_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
                //REdirect to HOme Page/Dashboard
                echo "<script>
                    window.location.href = 'login.php';
                    alert('Login failed. Invalid username or password')
                </script>";
                header('location:'.SITEURL.'admin/login.php');
            }
        }
        else
        {
            echo "<script>
                window.location.href = 'login.php';
                alert('Login failed. Username cannot be numeric')
            </script>";
        }


    }

?>