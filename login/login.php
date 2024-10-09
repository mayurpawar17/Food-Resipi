<?php
//  This Script will handle login
session_start();

if (isset($_SESSION['username'])) {
    header("location: index.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";


// if request method is post 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Plaese Enter Username OR Password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }
    if (empty($err)) {
        $sql = "SELECT id , username, password FROM users WHERE  username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is correct..Allow user to login

                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;


                        // redirect user to welcome page
                        header("location: ../index.php");

                    }
                }
            }
        }
    }
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-style: 'Nunito Sans' .sans-serif;
            --big-font:3rem;
            --h2-font:2.25rem;
            --p-font:0.9rem;
        }

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #131315;
        }

        #login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: #1e1c2a;
            border-radius: 10px;
        }
        #login-box h1,h2{
            margin: 0 0 30px;
            padding: 0;
            color:#a020f0;
            text-align: center;
            text-decoration: none;
        }



        #login-box hr{
         border-top: 2px dashed white;
        }

        #login-box #user-box input{
            position: relative;
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline:none;
            background: transparent;   
        }
        #submit{
            padding: 5px 20px;
            color: black;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .4s;
            border: 0;
            outline: none;
            margin: auto;
            border-radius: 10px;
            font-weight: 500;
        }
        #submit:hover{
            background-color: #a020f0;
        }

        #button-form{
            display: flex;
            flex-direction: row;
            margin-top: 20px;
        }
        #register{
            padding: 5px 20px;
            padding-left: -10px;
            font-size: 16px;
            text-decoration: none;
            color: #a020f0;
            width:50%;
            text-align: center;
            text-transform: uppercase;
            overflow: hidden;
            transition: .4s;
            border: 0;
            outline: none;
            border-radius: 10px;
            font-weight: 500;
            
        }
        #register:hover{
            background-color: #a020f0;
            color: #fff;
        }
        #register a{
            margin: auto;
            color: black;
            text-decoration: none;
        }

    </style>

</head>

<body>
    <div class="container mt-5" id="login-box">
        <div class="row">
            <div class="col-md-6 login"  id="login-box">
                
                <h1>Login</h1><hr>
                <h2>Food Resipi</h2>
                <form action="" method="POST">
                    <div class="form-group" id="user-box">
                        <!-- <label>UserName</label> -->
                        <input type="text" name="username" class="form-control" placeholder="Enter Your UserName" required>
                    </div>
                    <div class="form-group" id="user-box">
                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
                    </div>
                    <div id="button-form">
                        <button type="submit" class="btn btn-primary" id="submit">Login</button>
                        <!-- <label style="color: #fff;">Create Account</label> -->
                        <button type="submit" class="btn btn-primary" id="register"><a class="text-white"
                                href="register.php">Register</a></button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>