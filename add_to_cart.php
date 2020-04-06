<?php
    session_start();
    
if ($_SESSION['loggedin'] !== true) {
    header('location: LoginForm.php');
} else {
    
    include 'config.php';
    $pId = $_REQUEST["pId"];
    $userId = $_SESSION['customerId'];
    $res = "";
    
    $str = "insert into cart (productId, customerId, Date) values ($pId,$userId,CURDATE())";
    
    if(mysqli_query($conn, $str)){
        $res = TRUE;
        echo "<script>alert(if.$str);</script>";
    }
    else{
        $res = FALSE;
        echo "<script>alert('Item already in cart');</script>";
    }
    
    // Checking a cart alrady exist or not
    /*
    $str = "select cart_id,date from cart where username = '$user'";
    $res = mysqli_query($conn, $str);
    $record = mysqli_fetch_array($res);
    $date = "" . date("Y-m-d");
    if ("" . $record['date'] == $date) {
        $cart_id = $record['cart_id'];
        $_SESSION['cart'] = $cart_id;
        $id = $_GET['id'];
        // Inserting products in cart (sub_cart)
        $str = "insert into sub_cart values ($cart_id,$id)";
        $res = mysqli_query($conn, $str);
    } else {
        // Creating cart for user
        $str = "insert into cart (username, Date) values ('$user',CURDATE())";
        $res = mysqli_query($conn, $str);
        // Getting Cart information
        $str = "select cart_id from cart where username = '$user' and date = CURDATE()";
        $res = mysqli_query($conn, $str);
        $record = mysqli_fetch_array($res);
        $cart_id = $record['cart_id'];
        $_SESSION['cart'] = $cart_id;
        $id = $_GET['id'];
        // Inserting products in cart (sub_cart)
        $str = "insert into sub_cart values ($cart_id,$id)";
        $res = mysqli_query($conn, $str);
    }
     */
    header('location: cart.php');
}
?>