<?php

    session_start();
    require_once("../Require/connection.php");
    date_default_timezone_set("asia/karachi");

    if(!isset($_SESSION['user']))
    {
        header('location:../index.php?msg=Please Login First');
    }
    else
    {
        $user = $_SESSION['user'];
        // print_r($user);
        $time = time();
        // echo $user['is_online'];
        $query = "UPDATE user SET is_online = 0, log_time = '".$time."' WHERE user_id = ".$user['user_id'];
        $result = mysqli_query($connect, $query);
        if($result)
        {
            session_destroy();
            header('location:../index.php?msg=Logged Out');
        }

    }
?>