<?php

    function check_login($conn){
        if(isset($_SESSION['user_id'])){
            $id = $_SESSION['user_id'];
            // Query
            $sql = "SELECT * FROM tbl_users where user_id='$id' LIMIT 1";
            // Execute Query
            $res = mysqli_query($conn, $sql);
            // Check if Query is executed successfully
            if($res==true){
                // Count rows
                $count = mysqli_num_rows($res);
                if($count>0){
                    $user_data = mysqli_fetch_assoc($res);
                    return $user_data;
                }
            }
        } else{
            // Redirect to login page then stop the process
            header('Location: login.php');
            die();
        }
    }

    function random_num($length){

        $text = '';

        if($length < 5){
            $length = 5; // makes sure $length is never less than five
        }

        $len = rand(4, $length);

        for($i=0; $i<$len; $i++){
            $text .= rand(0, 9);
        }

        return $text;
    }