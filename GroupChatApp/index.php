<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        header('location:Php/c_app.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Chat App</title>
    <style>
        h1
        {
            background-color: #0F52BA;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }
        table
        {
            width: 35%;
            height: 250px;
            margin-top: 10px;
            background-color: #D3D3D3;
            border-radius: 20px;
            
        }
        table td
        {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        input
        {
            width: 150px;
            height: 25px;
        }
        input[type=submit]
        {
            width: 70px;
            height: 30px;
            font-weight: bold;
        }
        #account
        {
            font-size: medium;
        }
    </style>

</head>
<body>
    <center>
        <h1>Login Form</h1>
        <?php
            if(isset($_REQUEST['msg']))
            {
                echo "<p style='color:red'>".$_REQUEST['msg']."</p>";
            }
        ?>
        <form action="Php/login_process.php" method="POST">
            <table cellpadding="10">
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" placeholder="Enter Email" required/></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Password" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="login" value="Login"/></td>
                </tr>
                <tr>
                    <td id="account" colspan="2">Don't have an account? Create <a href="Php/register.php">Here</a></td>
                </tr>
            </table>
        </form>         
    </center>
</body>
</html>