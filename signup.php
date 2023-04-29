<?php

    include("config/constants.php");
    include("functions.php");

    if(isset($_POST['submit'])){
        //echo 'Selected';
        // Get data from form
        $user_name = mysqli_real_escape_string($conn, $_POST['username']);
        $enc_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $enc_password);

        // Check if username & password is empty
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

            // Saving userid to the database
            $user_id = random_num(20);

            // Sql Query to save the data in database
            $sql = "INSERT INTO tbl_users SET
                user_id = '$user_id',
                user_name = '$user_name',
                password = '$password'
            ";

            // Execute Query
            $res = mysqli_query($conn, $sql);

            // Check if Query is successfully executed
            if($res==true){
                //echo "Signup successfully";
                $_SESSION['sign-up'] = "<div class='success'>SignUp Successful</div>";
                header("Location:".SITEURL."login.php");
                die();
            } else{
                $_SESSION['sign-up'] = "<div class='error'>Failed to SignUp</div>";
                //echo "Failed to signup";
                header('LOcation:'.SITEURL.'signup.php');
                die();
            }
        } else{
            echo "<script>
                window.location.href = 'signup.php';
                alert('Signup failed. Username cannot be numeric')
            </script>";
        }

                
    } else{
        //echo 'Not seleceted';
    }

?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-sclae=1.0">
        <title>SignUp</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        
        <script>
            function validatePassword(){
                const passwordInput = document.getElementById('password');
                const passwordValidation = /^(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*(),.?":{}|<>]{8,}$/;

                if (!passwordValidation.test(passwordInput.value)){
                    alert('Password must have at least one special character, number, lowercase letter, and uppercase letter.');
                    return false;
                }

                return true;
            }
        </script>
    </head>

    <body class="main">
        <div class="form">
            <form action="" name="form" method="POST" onsubmit="return isvalid() && validatePassword()">
                <?php
                    if(isset($_SESSION['sign-up'])){
                        echo $_SESSION['sign-up'];
                        unset($_SESSION['sign-up']);
                    }
                ?><br>
                <label>Username: </label><br>
                <input type="text" name="username" id="" placeholder="Enter username"><br><br>
                <label>Password: </label><br>
                <input type="password" name="password" id="" placeholder="Enter password">
                <br><br>
                <input type="submit" value="SignUp" class="btn" name="submit">
                <br><br>
                Already have an account? <a href="login.php" class="sgnup">Login</a>
            </form>
        </div>

        <script>
            function isvalid(){
                var user_name = document.form.username.value;
                var password = document.form.password.value;
                if(user_name.length == '' && password.length==''){
                    alert('Username and Password field is empty!!!');
                    return false
                } else{
                    if(user_name.length == ''){
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


