<?php
    session_start();
    require_once("../Require/connection.php");
    date_default_timezone_set("asia/karachi");
    if(!isset($_SESSION['user']))
    {
        header('location:../index.php?msg=Please Login First');
    }
    $user = $_SESSION['user'];
    $time = time();

    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'send_message')
    {
        /*         echo "<pre>";
            print_r($_POST);
            echo "</pre>"; */
      $insert_query = "INSERT INTO `chat_message`(`chat_message`.`message`, `chat_message`.`user_id`, `chat_message`.`message_time`)
                        VALUES('".$_REQUEST['message']."', ".$user['user_id'].", '".$time."')";
        
        $result = mysqli_query($connect, $insert_query);

            /*     if($result)
            {
                echo "msg sent";
            }
            else
            {
                echo "msg not sent";
            } */
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action'] == 'show_message')
    {
        $query = "SELECT * FROM `user`,`chat_message` WHERE `user`.`user_id` = `chat_message`.`user_id` ORDER BY `chat_message`.`message_time`";
        // $query = "SELECT * FROM `chat_message`";
        $result = mysqli_query($connect, $query);

        if($result->num_rows > 0)
        {
            while($message = mysqli_fetch_assoc($result))
            {
                if($message['user_id'] == $user['user_id'])
                {
                    ?>
                        <div id="sender">
                            <div>
                            <span id="sender_img"><img src="<?php echo "../Images/".$message['profile_picture'];?>"></span>
                            <span id="sender_name"><?php echo $message['first_name']." ". $message['last_name']; ?>: </span>
                            <span id="sender_msg"><?php echo $message['message']; ?></span>
                            <span id="sender_time"><?php echo date("H:i A",$message['message_time']); ?></span>
                            </div>
                        </div>
                    <?php
                }                
                else
                {
                    ?>
                        <div id="receiver">
                            <div>
                            <span id="receiver_img"><img src="<?php echo "../Images/".$message['profile_picture'];?>"></span>
                            <span id="receiver_name"><?php echo $message['first_name']." ". $message['last_name']; ?>: </span>
                            <span id="receiver_msg"><?php echo $message['message']; ?></span>
                            <span id="receiver_time"><?php echo date("H:i A",$message['message_time']); ?></span>
                            </div>
                        </div>
                    <?php
                }
            }
        }
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action'] == 'all_users')
    {
            $query = "SELECT * FROM `user`";
            $result = mysqli_query($connect, $query);

        if($result->num_rows > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                if($row['is_online'] == 1 && $row['user_id'] != $user['user_id'])
                {
                    ?>
                        <div id="users">
                            <span><img src="<?php echo "../Images/".$row['profile_picture'];?>"></span>
                            <span id="name"><?php echo $row['first_name']." ". $row['last_name']; ?></span>
                            <span style="color:green">&nbsp;Online</span>
                        </div>
                    <?php
                }
                elseif($row['is_online'] == 0 && $row['user_id'] != $user['user_id'])

                {
                    ?>
                        <div id="users">
                            <span><img src="<?php echo "../Images/".$row['profile_picture'];?>"></span>
                            <span id="name"><?php echo $row['first_name']." ". $row['last_name']; ?></span>
                            <span style="color:red">&nbsp;offline</span>
                        </div>
                    <?php
                }
            }
        }
    }
?>