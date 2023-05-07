<?php
    require_once("../Require/connection.php");
    // print_r($_POST);
    session_start();
    if(isset($_SESSION['user']))
    {
        header('location:c_app.php');
    }

    if(isset($_POST['register']))
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        extract($_POST);
        $profile_pic = $_FILES['image'];

        $original_name = $profile_pic['name'];
        $image_name    = date("h-i-s-A", time())."_".$original_name;
        $temp_name     = $profile_pic['tmp_name'];
        $folder        = "../Images";
        
        if(!(is_dir($folder)))
        {
            if(!(mkdir($folder)))
            {
                $msg = "Folder not created";
                header("location: register.php?msg=$msg");
                die;
            }
        }

        $image_path    = "$folder/".$image_name;
        $extension     = pathinfo($image_path, PATHINFO_EXTENSION);

        if($extension == "png" || $extension == "jpg" || $extension == "jpeg")
        {
            if(move_uploaded_file($temp_name, $image_path))
            {
                $insert_query = "INSERT INTO user(first_name, last_name, email, password, profile_picture) VALUES(?,?,?,?,?)";

                $stmt = mysqli_prepare($connect,$insert_query);
                mysqli_stmt_bind_param($stmt,"sssss", $fname, $lname, $email, $password, $image_name);
                mysqli_stmt_execute($stmt);
            }
        }
        else
        {
            $msg = "Image file extension should be png, jpg or jpeg";
            header("location: register.php?msg=$msg");
            die;
        }

        header("location: ../index.php");
    }
    
    ?>