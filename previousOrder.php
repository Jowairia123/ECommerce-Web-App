<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
  <title>Profile</title>
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Main css -->
  <link href="css/naimaStyle.css" rel="stylesheet" type="text/css"/>
  
  <!-- Prevoius Links -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.js" type="text/javascript"></script>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
  <link href="css/third.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <?php
  include 'header.php';
  ?>
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Previous Orders</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <h1>Profile</h1>
        <div class="container" style="max-width:600px;padding:40px 20px;background:#ebeff2">
          <center><h3>Account Details</h3></center>
          <?php
          include 'config.php';
          $custId = $_SESSION['customerId'];
          $str = "select FirstName,LastName,Email from customer where customerId =".$custId;
          $res = mysqli_query($conn, $str);
          $row = mysqli_fetch_array($res);
          //echo $row["First Name"];
          ?>
          <br>
          <form class="form-horizontal" role="form" action="update.php" method="POST">
           <div class="form-group">
            <label for="name" class ="control-label col-sm-3">First name</label>
            <div class="col-sm-8">
              <input type="name" value="<?php echo($row["FirstName"]) ?>" class="form-control" name="fname" id="fname" placeholder="Enter name">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class ="control-label col-sm-3">Last name</label>
            <div class="col-sm-8">
              <input type="name" value="<?php echo($row["LastName"]) ?>" class="form-control" name="lname" id="lname" placeholder="Enter address">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class ="control-label col-sm-3">Email</label>
            <div class="col-sm-8">
              <input type="email"  class="form-control" name="email" id="email" 
                     placeholder="Enter email">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class ="control-label col-sm-3">Username</label>
            <div class="col-sm-8">
              <input type="address" class="form-control" name="username" id="username" placeholder="Enter user name">
            </div>
          </div>
          <div class="col-sm-offset-2 col-sm-8">
           <center><input type="submit" class="btn btn-default" value="Update"></center>
         </div>
       </form>
          <a href="logout.php" style="position:relative;right:35.5%;top:10px;"><button class="btn btn-default">Logout</button></a>
     </div>
   </div>
   <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <h1>Previous Orders</h1>
    
    <table class="table">
      <tr>
        <th>Item Name</th>
        <th>Brand</th>
        <th>Price</th>
        <th>Date</th>
      </tr>

      <?php
      include 'config.php';
      $customerId = $_SESSION['customerId'];
      $str = "select name,brand,price,date from products join orders on products.productId = orders.productId join cart on orders.Cart_id = cart.Cart_id where cart.customerId = '$customerId'";
      $res = mysqli_query($conn, $str);
      while($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td> " . $row["name"]. "</td>" . "<td> " . $row["brand"]. "</td>" ."<td> $" . $row["price"]. "</td>" ."<td>" . $row["date"]. "</td>";
        echo "</tr>";
      }
      ?>
    </table>

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script type="text/javascript">
      /* -------------------------------------------------------------
            bootstrapTabControl
            ------------------------------------------------------------- */
            function bootstrapTabControl(){
              var i, items = $('.nav-link'), pane = $('.tab-pane');
            // next
            $('.nexttab').on('click', function(){
              for(i = 0; i < items.length; i++){
                if($(items[i]).hasClass('active') == true){
                  break;
                }
              }
              if(i < items.length - 1){
                    // for tab
                    $(items[i]).removeClass('active');
                    $(items[i+1]).addClass('active');
                    // for pane
                    $(pane[i]).removeClass('show active');
                    $(pane[i+1]).addClass('show active');
                  }

                });
            // Prev
            $('.prevtab').on('click', function(){
              for(i = 0; i < items.length; i++){
                if($(items[i]).hasClass('active') == true){
                  break;
                }
              }
              if(i != 0){
                    // for tab
                    $(items[i]).removeClass('active');
                    $(items[i-1]).addClass('active');
                    // for pane
                    $(pane[i]).removeClass('show active');
                    $(pane[i-1]).addClass('show active');
                  }
                });
          }
          bootstrapTabControl();
        </script>
      </body><script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

      </script>
    </body>
    </html>