<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$usernam_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   if (empty(trim($_POST["username"]))) {
      $usernam_err = "Usernmae cannot be blank";
   } else {
      $sql = "SELECT id FROM users WHERE username = ?";
      $stmt = mysqli_prepare($conn, $sql);
      if ($stmt) {
         mysqli_stmt_bind_param($stmt, "s", $param_username);

         $param_username = trim($_POST['username']);

         if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
               $usernam_err = "This username is already taken";
            } else {
               $username = trim($_POST['username']);
            }
         } else {
            echo "Something went wrong";
         }
      }
   }

   mysqli_stmt_close($stmt);


   // check for password 


   if (empty(trim($_POST['password']))) {
      $password_err = "Password cannot be blank";
   } elseif (strlen(trim($_POST['password'])) < 5) {
      $password_err = "Password cannot be less than 5 characters";
   } else {
      $password = trim($_POST['password']);
   }


   // check for confirm password 

   if (trim($_POST['confirm_password']) != trim($_POST['confirm_password'])) {
      $password_err = "Password should match";
   }


   // If There were no errors, go ahead and insert into the database


   if (empty($usernam_err) && empty($password_err) && empty($confirm_password_err)) {
      $sql = "INSERT INTO users (username, password) VALUES (? , ?)";
      $stmt = mysqli_prepare($conn, $sql);
      if ($stmt) {
         mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

         // set these parameters

         $param_username = $username;
         $param_password = password_hash($password, PASSWORD_DEFAULT);

         // try to execute the query

         if (mysqli_stmt_execute($stmt)) {
            header("location: login.php");
         } else {
            echo "Something went wrong... cannot redirect!";
         }
      }
      mysqli_stmt_close($stmt);
   }
   mysqli_close($conn);
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
            padding: 10px 20px;
            color: black;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .4s;
            border:0;
            outline: none;
            margin: auto;
            border-radius: 10px;
            font-weight: 500;
        }
        #submit:hover{
            background-color: #a020f0;
            color: black;
            
        }

        #button-form{
            display: flex;
            flex-direction: row;
            margin-top: 20px;
        }
        #register{
            font-size: 14px;
            text-decoration: none;
            color: black;
            margin: auto;
            width: 50%;
            text-align: center;
        }
        #register a{
            margin: auto;
            color: #8F7CEC;
            text-decoration: none;
        }

      </style>

</head>

<body>
   <div class="container mt-5" id="login-box">
      <div class="row">
         <div class="col-md-6 login"  id="login-box">
            <h1> Register</h1><hr>
            <h2>Food Resipi</h2>
            <form action="" method="POST">
               <div class="form-group" id="user-box">
                  <label style="color: white;">User Name</label>
                  <input type="text" name="username" class="form-control" placeholder="Enter Your UserName" required>
               </div>
               <div class="form-group" id="user-box">
                  <label style="color: white;">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
               </div>
               <div class="form-group" id="user-box">
                  <label style="color: white;">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" placeholder="Enter Your Confirm Password" required>
               </div>
               <div id="button-form">
                  <button type="submit" class="btn btn-primary" id="submit">Register</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>

</html>