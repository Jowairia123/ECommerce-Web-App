<?php
    session_start();
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        header("location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V14</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link href="css/util.css" rel="stylesheet" type="text/css"/>
        

        
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <form class="login100-form validate-form flex-sb flex-w" method="post" action="action.php">
                    <span class="login100-form-title p-b-32">Account Login</span>
                    
                    <div class="alert alert-danger" id='res'>
                        
                    </div>


                    <span class="txt1 p-b-11">User name</span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                        <input class="input100" type="text" name="fullname" required>
                        <span class="focus-input100"></span>                        
                    </div>

                    <span class="txt1 p-b-11">Password</span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
                        <span class="btn-show-pass"><i class="fa fa-eye"></i></span>
                        <input class="input100" type="password" name="pass" required>
                        <span class="focus-input100"></span>
                    </div>
                    
                    <a href="userRegistrationForm.php" class="txt3">Create Account</a>
                    <div class="container-login100-form-btn"><button class="login100-form-btn">Login</button></div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
             <?php
            if(isset($_REQUEST['invalid'])){
                echo '<script>alert("Enter Valid UserName and Password")</script>';
                echo '<script>
                        $(document).ready(function()
                        {                           
                            $("#res").text("Enter Valid UserName and Password");
                        });
                    </script>';
            }
        ?>
    <script src="js/main.js"></script>
</body>
</html>