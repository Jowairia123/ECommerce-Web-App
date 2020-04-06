<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>T-Shirts Style</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <?php 
            include('header.php'); 

            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
            {

            }
            else{
                exit;
            }

            include('config.php'); 
            //	$cart_id = $_SESSION['cart'];
            $customerId = $_SESSION["customerId"];
            $str = "select name,brand,price from products p join cart s on p.productId = s.productId "
                    . "where customerId = $customerId";
            $res = mysqli_query($conn, $str);
        ?>
        <div class="container">
            <div class="row">
              <table class="table">
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Brand</th>                        
                    </tr>
                    <?php
                        $price = 0;
                        while($row = mysqli_fetch_assoc($res)) 
                        {
                            echo "<tr>";
                            echo "<td> " . $row["name"]. "</td>" . "<td> " . $row["price"]. "</td>" ."<td> $" . 
                                    $row["brand"]. "</td>";
                            echo "</tr>";
                            $price = $price + $row["price"];
                        }
                    ?>
                    <tr>
                        <td><strong>Total Price</strong></td>
                        <td><strong>$<?php echo $price ?></strong></td>
                        <td>
                            <div class="center">
                                <a href="Checkout.php" class="btn btn-info" style="top: 56%;">Checkout</a>
                            </div>
                        </td>
                    </tr>
              </table>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include('footer.php');?>
    </body>
</html>