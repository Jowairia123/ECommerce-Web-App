<?php
    session_start();

require 'config.php';

    $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $pswd = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $cpswd = md5(filter_input(INPUT_POST, 'cpassword', FILTER_SANITIZE_STRING));

    $sql = "INSERT INTO customer (username, password, matchpassword) VALUES ('$name', '$pswd', '$cpswd')";

    if (mysqli_query($conn, $sql)) 
    {
        echo "<script>alert('Registered successfully');</script>";
        header("location: LoginForm.php");
    } 
    
    else 
    {
        header("location: userRegistrationForm.php?invalid=1");
    }

mysqli_close($conn);