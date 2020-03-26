<!DOCTYPE html>
<?php session_start() ?>
<html>
<head>
	<title>Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

</body>
</html>
<?php
if ($_SESSION['loggedin']==0){
	header('location: account/index.php#signin');
}else{
	header('location: user_detail/index.php');
}
?>
