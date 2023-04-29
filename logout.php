<?php
    //session_start();
    include('config/constants.php');

    if(isset($_SESSION['user_id'])){
        unset($_SESSION['user_id']);
    }
    header('Location:'.SITEURL.'login.php');
    die();