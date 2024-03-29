<?php

session_start();
require "class/db.php";

$error = false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['login']))
    {   
        $adminid = $_POST['adminid'];
        $adminpswd = $_POST['adminpswd'];
    
        if($adminid != "" && $adminpswd !="")
        {
                $resultset = $db->query("Select * from tbl_admin where adminid='$adminid' ");
                if($resultset->num_rows)
                {
                    $row = $resultset->fetch_assoc();
                    if($row['adminpswd'] == $adminpswd)
                    {
                        $_SESSION['adminid'] = $row['adminid'];
                        $_SESSION['adminpswd'] = $row['adminpswd'];
                        if(isset($_SESSION['adminid']))
                        {
                            $error=false;
                            header("location: index.php");
                        }
                    }
                    else
                    {
                        $error = true;
                        $errMsg = "Incorrect username or password!<br>Please try again.";
                    }
                }
                else
                {
                    $error = true;
                    $errMsg = "Incorrect username or password!<br>Please try again.";
                }
        }
        else if($adminid == "" || $adminpswd == "")
        {
            $error = true;
            $errMsg = "Some fields are empty. All fields required!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/main.css" rel="stylesheet">

</head>

<body class="bg-gradient-light ">
<form method="POST" action="">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-middle ">

            <div class="col-xl-5 col-lg-10 col-md-9 align-items-center">

                <div class="card o-hidden border-0 shadow-lg p-0 my-5 mt-8">
                    <div class="card-body mb-0 p-0 bg-gray-100">
                        <!--<div class="row"> -->
                            
                           <!-- <div class="col-lg-6"> -->
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Timetable Management System</h1>
                                        <br>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" name="adminid" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="adminpswd" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <br>
                                        
                                        <!-- LOGIN -->
                                        <input type='submit' name="login" value="Login" class="btn btn-primary btn-user btn-block">
                                        <p class="text-center" style = "color: red;"><br><?php if($error==true) echo $errMsg; ?></p>
                                    </input>
                                    </form>
                                    
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                           <!-- </div> -->
                       <!-- </div> -->
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</form>
</body>

</html>