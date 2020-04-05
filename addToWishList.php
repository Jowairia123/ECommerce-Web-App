<?php 
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $custId = $_SESSION["customerId"];
    }else{
        echo '<script>alert("you first login for this option");</script>';
        exit;
    }

    require 'config.php';

    $id = $_REQUEST["id"];
    $tooltip = $_REQUEST["tooltip"];
    
    if($tooltip == "Add to wish list")
    {
        $sql = "INSERT INTO wishlist (customerId, productId) VALUES (".$custId .",". $id.")";
        
        if(mysqli_query($conn, $sql))
        {
            $res = "true";
        }
        else
        {
            $res = "false";
//            echo"<script>alert('false data')</script>";
        }
    }
    else
    {
        $sql = "DELETE FROM wishlist where customerId =".$custId." AND productId = ".$id;
                if(mysqli_query($conn, $sql))
        {
            $res = "true";
        }
        else
        {
            $res = "false";
        }
    }
    
    echo $res;