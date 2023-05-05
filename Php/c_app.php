<?php
    session_start();
    // require_once("../Require/connection.php");
    if(!isset($_SESSION['user']))
    {
        header('location:../index.php?msg=Please Login First');
    }
    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['first_name']." ". $user['last_name']; ?></title>
    <link rel="stylesheet" href="../Style/stylesheet.css">
    <script src="../Js/ajax_process.js"></script>
</head>
<body>
    <center>
        <table id="chat_table">
            <h1>GROUP CHAT APP</h1>
            <tr>
                <td id="first_td">
                    <div id="heading">
                        <span><img src="<?php echo "../Images/".$user['profile_picture'];?>"></span>
                        <span id="name"><?php echo $user['first_name']." ". $user['last_name']; ?></span>
                        <span>&nbsp;Online</span>
                        <span><a href="logout.php">Logout</a></span>
                    </div>
                    <div id="show_message"></div>
                    <div id="send_message">
                        <input type="text" name="message" placeholder="Type Here..."id="message" required/>
                        <button onclick="sendMessage()">Send</button>
                    </div>
                </td id="second_td">
                <td>
                    <h2>All Users</h2>
                    <div id="all_users"></div>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>