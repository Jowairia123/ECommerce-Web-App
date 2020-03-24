<!DOCTYPE html>
<html>
    <head>
        <title>DataBase Project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/third.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>
        <?php require 'css/third.css'; ?>
    </style>
    <body>                    
    <!-- header -->    
        <?php require 'header.php'; ?>         
        <div class="container">
            <div class="row">  
    <!--Side Navbar -->
                <div class="col-sm-12 col-md-5 col-lg-3">
                    <div class="list-group"> 
                        <?php 
                            require 'config.php';
                            $no = $_GET['id'];
                                                       
                            $sql = "select name from products where id = ".$no;
                            $result = mysqli_query($conn, $sql);
                            $record = mysqli_fetch_array($result); 
                            echo '<a href = "secondPage.php" class="blue list-group-item">All Products
                                  <p class="list-group-item-text"> T-Shirts</p></a>
                                  <p class="list-group-item-text">'.$record['name'].'</p>';                                                                               
                       ?>
                    </div>
                </div> 
                       
    <!-- Item Details -->            
                <div class="col-xs-4 col-sm-12 col-md-5 col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php 
                                $s = "select * from products where id = ".$no;
                                $r = mysqli_query($conn, $s);
                                while($rec = mysqli_fetch_array($r))
                                {
                                    echo "<br><h2>".$rec['Name']."</h2><br>";
                                    echo "<p>"."Price: Rs. ".$rec['Price']."</p><br>";
                                    echo "<p>"."Category: ".$rec['CategoryName']."</p><br>";
                                    echo "<p>"."Brand: ".$rec['Brand']."</p><br>";
                                    echo "<p>"."Rating: ".$rec['Rating']."</p><br>";
                                    echo "<p>".$rec['Description']."</p><br>";                     
                                    echo '<img class = "img-responsive" alt = "shirt" src = "data:image/jpg;base64,'.base64_encode($rec['Image']).'" />';
                                }
                            ?>                           
                            <button type="button" class="btn btn-default">Add to Cart</button>
                        </div>
                    </div>                         
                </div>                  
            </div>
        </div>                         
    </body>
</html>
