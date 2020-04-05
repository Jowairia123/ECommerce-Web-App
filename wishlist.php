<?php 
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        $custId = $_SESSION["customerId"];
    }
    else
    {
        echo '<script>alert("you first login for this option")</script>';
        header("location: LoginForm.php");
        exit;
    }
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
    
    <style>
        <?php require 'css/style.css'; ?>
        
        .pics 
        {
            margin: 15px 0 95px;
            padding-left:85px;
        }
        
        .pics div 
        {
            background: white;
            padding: 10px 15px;
            text-align: center;
            margin: 20px 45px 25px 0;
            font-weight: bold;
            font-size: 1.4em;
            font-family: calibri;
        }
        
    </style>
    <?php 
        //echo '<script> function wishlist(){ document.getElementsByclassName("glyphicon-heart"). } </script>'; ?>
    <body>
        <!-- header -->    
        <?php require 'header.php'; ?>

        <div class = "container c">
            <h1>Wish List</h1> 
            <div class="row">          
    <!-- 1st column -->               
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-4 pics">
                    <?php 
                        require 'config.php';
                        
                        $s = "SELECT wishlist.productId,products.Image,products.Name FROM products
                              INNER JOIN wishlist ON wishlist.productId = products.productId where wishlist.customerId = ".$custId.";";
                        
                        $r = mysqli_query($conn, $s);
                        $count = 1;
                        while($rec = mysqli_fetch_array($r))
                        {
                            echo '<img alt = "pic" src = "data:image/jpg;base64,'.base64_encode($rec['Image']).'" />';                            
                    ?>                                                                                                                                                                  
                        <div>
                            <?php
                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])
                                {
                            ?>
                                <span id ="delete" value="<?php echo $rec['productId'] ?>" data-toggle="tooltip" 
                                    data-placement="left" title='delete product' class='glyphicon glyphicon-trash'>
                                </span> 

                            <?php
                                }
                            ?>
                                <a href="thirdPage.php?id=<?php echo $rec['productId'] ?>"><?php echo $rec['Name'] ?></a>
                        </div>                        
                    <?php
                            $count++;
                            if($count == 5)
                            {
                                break;
                            }
                        }
                    ?>                                                               
                </div>
    <!-- 2nd column -->                
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-4 pics">
                    <?php
                        $c = 1;
                        while($rec = mysqli_fetch_array($r))
                        {
                            echo '<img alt = "pic" src = "data:image/jpg;base64,'.base64_encode($rec['Image']).'" />';
                    ?>
                        <div>
                            <?php
                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])
                                {
                            ?>
                                <span id ="delete" value="<?php echo $rec['productId'] ?>" data-toggle="tooltip" 
                                    data-placement="left" title='delete product' class='glyphicon glyphicon-trash'>                                                                                                    
                                </span> 

                            <?php
                                }
                            ?>
                                <a href="thirdPage.php?id=<?php echo $rec['productId'] ?>"><?php echo $rec['Name'] ?></a>
                        </div>
                    <?php
                            $c++;
                            if($c == 5)
                            {
                                break;
                            }
                        }
                    ?>                    
                </div>
    <!-- 3rd column -->
                <div class="col-xs-4 col-sm-2 col-md-3 col-lg-4 pics">
                    <?php
                        $cou = 1;
                        while($rec = mysqli_fetch_array($r))
                        {
                            echo '<img alt = "pic" src = "data:image/jpg;base64,'.base64_encode($rec['Image']).'" />';
                    ?>
                        <div>
                            <?php
                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])
                                {
                            ?>
                                <span id ="delete" value="<?php echo $rec['productId'] ?>" data-toggle="tooltip" 
                                    data-placement="left" title='delete product' class='glyphicon glyphicon-trash'>                                                                                                    
                                </span> 

                            <?php
                                }
                            ?>                        
                                <a href="thirdPage.php?id=<?php echo $rec['productId'] ?>"><?php echo $rec['Name'] ?></a>
                        </div>
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
    
        <script> 
            
            $(document).ready(function()
            {
                $("span").click(function()
                {                    
                    // $(".tooltip-inner").hide();   
                    if($(this).attr("data-original-title") === "delete product")
                    {
                        deleteProduct($(this).attr("value"));
                    }
                });
                
                $("[data-toggle='tooltip']").tooltip();
            });
            
            function deleteProduct(id) 
            {
                if (id !== "") 
                {
                    var xmlhttp = new XMLHttpRequest();
                    
                    xmlhttp.onreadystatechange = function() 
                    {
                        if (this.readyState === 4 && this.status === 200)
                            if(this.responseText === "true")
                            {
                                location.reload();
                            }
                            
                            else
                            {
                                alert("Operation unable to perform. Please Login/Try Again Later!!!"+this.responseText);
                            }                        
                    };

                    xmlhttp.open("POST", "deleteFromWishlist.php?id="+id, true);
                    xmlhttp.send();
                }
            }
            
//          var toggleState = false;     
//          $(".tooltip-inner").toggle();
//          $(this).attr('title', toggleState ? 'Add to wish list!' : 'Remove from wish list!');
//          toggleState = !toggleState;
                               
//          $('[data-toggle="tooltip"]').mouseenter(function(){
//          var word = "REMOVE";
//          $(this).attr('title', word);
//          });  
                        
        </script>
        
    <!-- footer -->
        <?php require 'footer.php'; ?>
        <script>
//            const element = document.querySelector(".glyphicon-heart-empty");
//            if(element.classList.contains("glyphicon-heart-empty"))
//                alert("hi");
//                $("#wish").unbind("click");
//                    $(document).ready(function(){
//                        $("span").click(function(){
//                            $(this).toggleClass("glyphicon glyphicon-heart");
//                        });
//                    });
        </script>
                   
                
    </body>
</html>
