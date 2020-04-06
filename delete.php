<?php
    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["admin"]){
    $custId = $_SESSION["customerId"];
//    echo '<script>alert("In Delete PHP file");</script>';
    }else{
        echo '<script>alert("you first login for this option");</script>';
        exit;
    }

    require 'config.php';

    $id = $_REQUEST["id"];
//    $tooltip = $_REQUEST["tooltip"];
    
        $sql = "DELETE FROM products where productId = ". $id;
        
        if(mysqli_query($conn, $sql))
        {
            $res = "true";
        }
        else
        {
            $res = "false";
//            echo"<script>alert('false data')</script>";
        }
    
    echo $res;