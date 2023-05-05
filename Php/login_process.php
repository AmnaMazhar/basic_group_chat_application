<?php

    session_start();
    require_once("../Require/connection.php");
    if(isset($_POST['login']))
    {
        // print_r($_POST);
        $select_query = "SELECT * FROM user WHERE email ='".$_POST['email']."' AND password ='".$_POST['password']."'";
        $result       = mysqli_query($connect, $select_query);

        // var_dump($result);
        if($result->num_rows > 0)
        {
            $user = mysqli_fetch_assoc($result);
            // var_dump($user);

            $update_query = "UPDATE user SET is_online = 1 WHERE user_id = ".$user['user_id'];
            $result       =  mysqli_query($connect, $update_query);
            // var_dump($result);

            if($result)
            {
                $_SESSION['user'] = $user;
                // print_r($_SESSION['user']);
                header("location:c_app.php");
            }
        }
        else
        {
            header("location:../index.php?msg=Invalid Email or Password");
        }
    }
    else
    {
        header("location:../index.php?msg=Please Login First");
    }
?>