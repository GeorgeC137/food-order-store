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

            // Sql Query to read from the data in database
            $sql = "SELECT * FROM tbl_users WHERE user_name='$user_name' LIMIT 1";

            // Execute Query
            $res = mysqli_query($conn, $sql);

            // Check if Query is executed successfully
            if($res==true){
                // Count rows
                $count = mysqli_num_rows($res);
                if($count>0){
                    $user_data = mysqli_fetch_assoc($res);

                    if($user_data['password'] === $password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        $_SESSION['login'] = "<div class='success'>Login Successful</div>";
                        header("Location:".SITEURL."index.php");
                        die();
                    } else{
                        echo "<script>
                            window.location.href = 'login.php';
                            alert('Login failed. Invalid username or password')
                        </script>";;
                    }
                } else{
                    echo "<script>
                        window.location.href = 'login.php';
                        alert('Login failed. Invalid username or password')
                    </script>";
                }
            }
        } else{
            echo "<script>
                window.location.href = 'login.php';
                alert('Login failed. Invalid username or password')
            </script>";
        }

                
    } else{
        //echo 'Not seleceted';
    }

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-sclae=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body class="main">
        <div class="form">
            <form action="" method="POST" name="form" onsubmit="return isvalid()">
                <?php
                if(isset($_SESSION['sign-up'])){
                    echo $_SESSION['sign-up'];
                    unset($_SESSION['sign-up']);
                }

                if(isset($_SESSION['login-order'])){
                    echo $_SESSION['login-order'];
                    unset($_SESSION['login-order']);
                }

                ?><br>
                <label>Username: </label><br>
                <input type="text" name="username" id="" placeholder="Enter username"><br><br>
                <label>Password: </label><br>
                <input type="password" name="password" id="" placeholder="Enter password">
                <br><br>
                <input type="submit" value="Login" class="btn" name="submit">
                <br><br>
                Don't have an accout? <a href="signup.php" class="sgnup">SignUp</a>
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

