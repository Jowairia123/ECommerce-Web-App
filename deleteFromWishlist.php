<?php
    session_start();
    
   

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        $custId = $_SESSION["customerId"];
    }
    
    else
    {
        echo '<script>alert("you first login for this option");</script>';
        exit;
    }

    require 'config.php';

    $id = $_REQUEST["id"];
    $sql = "DELETE FROM wishlist where productId = ". $id;

    if(mysqli_query($conn, $sql))
    {
        $res = "true";
    }
    else
    {
        $res = "false";
    }
    
    echo $res;