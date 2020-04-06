<!DOCTYPE html>
<html>
<body>
	<?php 
	session_start();
	include('config.php'); 
	$cart_id = $_SESSION['customerId'];
//	$str = "select pro_id from sub_cart where cart_id = $cart_id";
//	$res = mysqli_query($conn, $str);
	$str = "delete from cart where customerId = $cart_id";
        if(mysqli_query($conn, $str)){
            echo "<script type='text/javascript'>
            alert('Thank you for shopping with us..:)');
            window.location.href='index.php';
            </script>";
        }else{
            echo "<script type='text/javascript'>
	alert('Unable to perform operation!!!!!)');
        window.location.href='index.php';
	</script>";
        }
        
//	while($row = mysqli_fetch_assoc($res)) {
//		$pro_id = $row["pro_id"];
//		$sql1 = "delete from sub_cart where cart_id = $cart_id and pro_id = $pro_id";
//		mysqli_query($conn, $sql1);
//		$sql = "insert into orders values ($cart_id, $pro_id)";
//		mysqli_query($conn, $sql);
//	}
	
	?>
    
</body>