<!DOCTYPE html>
<html>
    <head>
        <title>Meeting Room Reservation Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>
        <?php require 'css/formStyle.css'; ?>
    </style>
    <body>
        <h1>User Registration Form</h1>
        <form method="post" action="register.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>User name:<span> * </span>            
                        <input type="text" name="username" size="46" placeholder="Enter user name" required>                
                    </td>  
                </tr>                
                <tr>
                    <td class="c">Password:<span> * </span>
                        <input id = "code" type="password" name="password" size="46" placeholder="Enter password" 
                               maxlength="8" required>
                    </td>
                </tr>                
                <tr>
                    <td>Confirm Password:<span> * </span>
                        <input type = "password" name="cpassword" min ="6" maxlength="8" placeholder="Confirm Password" 
                               size="46" required>
                    </td>
                </tr>                                             
                
                <tr><td class="s"><dir id="error"></dir><input type="submit" name="submit" value="Submit"></td></tr>                    
            </table>            
        </form>      
    </body>
    <?php
        if(isset($_REQUEST['invalid']))
        {
            echo '<script>alert("User name already exist.")</script>';
        }
    ?>
</html>
 