<?php
session_start();
if ($_SESSION['loggedin']==0){
	
}
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$user = $_POST['username'];

include '../config.php';
$str = "update customers set FirstName = '$fname', LastName = '$lname', email = '$email' where username = '$user'";
echo $str;
$res = mysqli_query($conn, $str);
header('location: index.php');

?>