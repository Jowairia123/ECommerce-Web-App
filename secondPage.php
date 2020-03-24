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
    <style>
        <?php require 'css/style.css'; ?>
    </style>
    <body>
        <!-- header -->    
        <?php require 'header.php'; ?>
        <div class = "container">
            <h1>Custom T-Shirts</h1> 
            <p>Choose custom t-shirts in all styles and colors at the best possible prices. 
                Find the perfect custom t-shirt for your events, meetings, schools, universities, 
                and promotional events.
            </p>
        </div>          
        <div class="container">
            <div class="row">  
    <!--Side Navbar -->
                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="list-group">                           
                        <a class="list-group-item">All Products
                        <p class="list-group-item-text"> T-Shirts</p></a>
                        <?php                             
                            require 'config.php';

                            // Create Query
                            $str = "select name from categories where id = 1";
                            $res = mysqli_query($conn, $str);
                            $row = mysqli_fetch_array($res);
                            echo "<a class='list-group-item'>".$row['name']."</a>"; 

                            $sql = "select name from products";
                            $result = mysqli_query($conn, $sql);
                            $record = mysqli_fetch_array($result);                           
                            echo "<p class='deco list-group-item'>".$record['name']."</p>";                    

                            while($record = mysqli_fetch_array($result))
                            {
                                echo "<p class='list list-group-item'>".$record['name']."</p><br>"; 
                            }
                        ?>
                    </div>
                </div> 
    <!-- 2nd column -->               
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 pics">
                    <?php
                        $s = "select Id,Image,Name from products";
                        $r = mysqli_query($conn, $s);
                        $count = 1;
                        while($rec = mysqli_fetch_array($r))
                        {
                            echo '<img alt = "pic" src = "data:image/jpg;base64,'.base64_encode($rec['Image']).'" />';
                            //echo "<div><a href='thirdPage.php'>".$rec['Name']."</a></div>";
                    ?>
                        <div><a href="thirdPage.php?id=<?php echo $rec['Id'] ?>"><?php echo $rec['Name'] ?></a></div>
                    <?php
                            $count++;
                            if($count == 6)
                            {
                                break;
                            }
                        }
                    ?>
                </div>
    <!-- 3rd column -->                
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 pics">
                    <?php
                        $c = 1;
                        while($rec = mysqli_fetch_array($r))
                        {
                            echo '<img alt = "pic" src = "data:image/jpg;base64,'.base64_encode($rec['Image']).'" />';
                    ?>
                        <div><a href="thirdPage.php?id=<?php echo $rec['Id'] ?>"><?php echo $rec['Name'] ?></a></div>
                    <?php
                            $c++;
                            if($c == 5)
                            {
                                break;
                            }
                        }
                    ?>                    
                </div>
    <!-- 4th column -->
                <div class="col-xs-4 col-sm-2 col-md-3 col-lg-3 pics">
                    <?php
                        $cou = 1;
                        while($rec = mysqli_fetch_array($r))
                        {
                            echo '<img alt = "pic" src = "data:image/jpg;base64,'.base64_encode($rec['Image']).'" />';
                            //echo "<div><a href='thirdPage.php'>".$rec['Name']."</a></div>";
                    ?>
                        <div><a href="thirdPage.php?id=<?php echo $rec['Id'] ?>"><?php echo $rec['Name'] ?></a></div>
                    <?php
                            $cou++;
                            if($cou == 5)
                            {
                                break;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class = "container-fluid b">                
                <div class="row">  
                    <div class="col-xs-4  col-sm-4 col-md-4 col-lg-4">
                        <h3><span class="badge">1</span>Pick a Product</h3>
                        <img class="img-responsive" src="img/first.png" alt="first"/>
                        <p>We have hundreds of products to choose from in our catalog. 
                            We have apparel available in sizes from infants to adults.</p>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <h3><span class="badge">2</span>Design Your Apparel</h3>
                        <img class="img-responsive" src="img/second.png" alt="second"/>
                        <p>Create a custom design using our templates or clipart. 
                            Already have a design? Upload it in our Design Studio and place it on the garment.</p>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <h3><span class="badge">3</span>Checkout</h3>
                        <img class="img-responsive" src="img/third.png" alt="third"/>
                        <p>The only thing left to do is select a delivery date for your custom apparel. 
                            Our rush deliveries guarantee you’ll get your order on time.</p>
                    </div>
                </div>

        </div>                
        <div class="container p">
            <div class="row">  
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img class="img-responsive" src="img/ball.png" alt="ball"/>
                    <p>Official Partner of the Philadelphia 76ers</p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img class="img-responsive" src="img/inc.png" alt="inc"/>
                    <p>Recognized as One of the Fastest Growing Private Companies in America</p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img class="img-responsive" src="img/newyork.png" alt="newyork"/>
                    <p>Featured in the New York Times Business Section</p>
                </div>
            </div>
        </div>
    <!-- footer -->
        <?php require 'footer.php'; ?>
    </body>
</html>
