<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        header('location:c_app.php');
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
        input[type=file]
        {
            width: 200px;
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
        <h1>Registration Form</h1>
        <?php
            if(isset($_REQUEST['msg']))
            {
                echo "<p style='color:red'>".$_REQUEST['msg']."</p>";
            }
        ?>
        <form action="register_process.php" method="POST" enctype="multipart/form-data">
            <table cellpadding="10">
                <tr>
                    <td>First Name: </td>
                    <td><input type="text" name="fname" placeholder="Enter First Name Here" required/></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input type="text" name="lname" placeholder="Enter Last Name Here" required/></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" placeholder="Enter Email" required/></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Password" required/></td>
                </tr>
                <tr>
                    <td>Pofile Image: </td>
                    <td><input type="file" name="image" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="register" value="Register"/></td>
                </tr>
                <tr>
                    <td id="account" colspan="2">Already have an account? Login <a href="../index.php">Here</a></td>
                </tr>
            </table>
        </form>         
    </center>
</body>
</html>