<?php   
session_start();

if(!isset($_SESSION['cart_id'])) {
   
  $con = mysqli_connect("localhost","root");
mysqli_select_db($con,"caterars");


  if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
    $sql="INSERT INTO `cart`(`paid`,`total_price`,`u_id`) values('0','0','$uid')";
    $result = mysqli_query($con,$sql);
    $_SESSION['cart_id'] = mysqli_insert_id($con); 
    
  }
  else {
    $sql="select * from category";
    $sql="INSERT INTO `cart`(`paid`,`total_price`) values('0','0')";
    $result = mysqli_query($con,$sql);
    $_SESSION['cart_id'] = mysqli_insert_id($con);
  }
}



$id = $_GET['id'];    
$connString = "mysql:host=localhost;dbname=caterars";
$user="root";
$pass="";
$db = new PDO($connString,$user,$pass);
$shajja=0;//?

$sql="select * from food where fd_id=$id";
$item = $db->query($sql);
while ( $row = $item->fetch()){
          
          $name= $row['name'];
    	  $desc=$row['desc'];
        $price=$row['unit_price'];
    	  $img=$row['image'];
          $c_id=$row['cate_id'];
         
    }

    



?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>The Caterers</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- my css -->
  <link rel="stylesheet" href="style-item.css">
  <link rel="stylesheet" href="style-index.css">
    
                  

  
  <script type="text/javascript" src="jquery/js/jquery-1.9.0.min.js"></script>
   

       
  <?php  
                      $sql1="select * from ingredient i join food_ing fi on(i.in_id=fi.in_id) where fi.fd_id=$id";
                      $food_ing = $db->query($sql1);
                      $arr=array();
                    
                      $keyarray=array();
                      $i=0;
                      $k=0;
                      while ( $row =$food_ing->fetch()){
                         $pr=$row['unit_price'];
                         $na=$row['name'];
                         $keyarray[$i]=$pr;
                         $i=$i+1;
                       } 
                    
                      


?>
        


          <script>
        $(document).ready(function() {
              var price=0;
              var i=0;
              var a=0;
              var b=0;
              var arrayFromPHP = <?php echo json_encode($keyarray); ?>;
              for (var j=0;j<Number(<?php echo count($keyarray);?>);j++){
              a=($('#'+i).children('option:selected').val());
              b=arrayFromPHP[i];
              price=price+a*b;

               i+=1;}
               var total_price=price+Number(<?php echo "$price";?>);
               $('#total_price').attr('value', total_price);
          $('#cal').click(function() {
              var price=0;
              var i=0;
              var a=0;
              var b=0;
              var arrayFromPHP = <?php echo json_encode($keyarray); ?>;
              for (var j=0;j<Number(<?php echo count($keyarray);?>);j++){
              a=($('#'+i).children('option:selected').val());
              b=arrayFromPHP[i];
              price=price+a*b;

               i+=1;
              } 
              var total_price=price+Number(<?php echo "$price";?>);
             
              $('#total_price').attr('value', total_price);
          });
        });
        
        
        </script>
  
    	  
         
  

</head>

<body>


  <section id="full-body">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-light bg-ligth sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img style="height:50px;width:50px" src="img/brand-icon.svg" alt="logo" /></a>
        <!-- have to specify height width of svg-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <button class="btn btn-outline-light text-dark link-button">
                <a class="nav-link" href="index.php"> Home </a>
              </button>
            </li>
            <li class="nav-item">
              <button class="btn btn-outline-light text-dark link-button">
                <a class="nav-link" href="about-us.php"> About Us </a>
              </button>
            </li>
            <li class="nav-item">
              <button class="btn btn-outline-light text-dark link-button">
                <a class="nav-link" href="feedback.php"> FeedBack </a>
              </button>
            </li>
            <?php

            if (isset($_SESSION['fname'])) { 
              echo "<li class='nav-item'>
                      <button class='btn btn-outline-light text-dark link-button'>
                          <a class='nav-link' href='user-profile.php?u_id=".$_SESSION['uid']."'>". $_SESSION['fname']." ".$_SESSION['lname'] ."</a>
                      </button>
                    </li>";

            }
    
            else {  
              echo "<li class='nav-item'>
                      <button class='btn btn-outline-light text-dark link-button'>
                          <a class='nav-link' href='login.html'> Login/Signup </a>
                      </button>
                    </li>";
            }


            ?>
            <li class="nav-item">
              <a herf="cart.html">
                <form action="cart.php">
                  <button type="submit" id="cart-button" class="btn btn-outline-light text-dark link-button">
                    <img src="img/cart.png" alt="cart">
                    <span id="badge">3</span>
                  </button>
                </form>

              </a>
            </li>
            <li class="nav-item">
              <form action="search.php">
                <input type="text" placeholder="Search.." name="search" style="height:45px;width:auto;">
                <button type="submit" class="btn btn-outline-light text-dark link-button">
                  <i class="fa fa-search fa-2x" alt="search-icon"></i>
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav><!-- end navigation bar-->



    <hr>


    <!-- food section -->
    <section id="food-item">
      <div class="container-fluid padding">
        <div class="row text-center padding">
          <div class="col-md-5">
            <div class="img-hover-zoom">
              <?php 
              echo "<img src='food_images/".$img."' style='box-shadow: 8px 8px 10px grey; border-radius: 12px; height:230px; width:auto;'>";
              ?>
            </div>
          </div>
          <div class="col-md-4">
          <?php    
            echo "<h2>".$name."</h2>";
            echo "<p>".$desc."</p>";
           ?>
            <hr>
            <div>
              <?php    
                      $sql1="select * from ingredient i join food_ing fi on(i.in_id=fi.in_id) where fi.fd_id=$id";
                      $food_ing = $db->query($sql1);
                      $i=0;
                      while ( $row =$food_ing->fetch()){
                      
                          echo "<label>Select ".$row['name']." Quantity(in KG): </label>";
                          echo "<select id=".$i.">";
                          echo "<option value='5'>5</option>";
                          echo "<option value='6'>6</option>";
                          echo "<option value='7'>7</option>";
                          echo "<option value='8'>8</option>";
                          echo "<option value='9'>9</option>";
                          echo "<option value='10'>10</option>";
                          echo "<option value='11'>11</option>";
                          echo "<option value='12'>12</option>";
                          echo "</select>";
                          $i=$i+1;
                      }

              ?>
            
              <br>
              <button   id="cal">Calculate Price</button>

                    </div>
            <form action="add_to_cart.php" method="GET">
            <input type="hidden" name="item_id" value='<?php echo $id ?>' >
            <div style="text-align: initial; padding-left: 5em;">
              <label>Price Rs.</label>
              <input type="number" name="Caculated-Price"  id="total_price" readonly style="width: 7.4em; margin-left:0.5em;">
            </div>
              <br>
              <input type="submit" value="Add to cart">
            </form>
          </div>
        </div>
      </div>





     
  <hr>
  <!--Footer-->
  <footer>
    <div class="container-fluid padding">
      <div class="row text-center padding">

        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="container-fluid padding">

            <div class="row text-center">

              <div class="col-12 padding">

                <strong>Address</strong>
                <br>
                <br>1234 Street Name
                <br>City, AA 99999
                <br>
                <br>
              </div>



              <div class="col-12 padding">

                <strong>Contacts</strong>
                <br>
                <br>Email: support@mobirise.com
                <br>Phone: +1 (0) 000 0000 001
                <br>Fax: +1 (0) 000 0000 002
                <br>
                <br>
                <br>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 padding">
          <div class="container-fluid">
            <div class="row padding">
              <div class="col-12 padding">
                <strong>Links</strong>
                <br>
                <br>
                <a><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                <a><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                <a><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                <br>
                <br>
              </div>

              <div class="col-12 padding">
                <strong>
                  Feedback
                </strong>
                <br>
                <br>Please send us your ideas, bug reports, suggestions! By clicking on Feedback <br> Any feedback would
                be appreciated.
                <br>
                <a name="" id="" class="btn btn-outline-secondary" href="feedback.php" role="button">Feedback</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 padding">
          <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3321.205905458122!2d73.15440461469016!3d33.65182628071681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfea4aee5bdf8f%3A0xe6b55e05d462beb1!2sCOMSATS+University+Islamabad!5e0!3m2!1sen!2s!4v1559723581605!5m2!1sen!2s" style="height:300px;width:400px;margin:20px;" frameborder="0" allowfullscreen>
            </iframe>
            <!--style="height:300px;width:400px;margin:20px;-->
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-12 copyright">
          <p class="display-7">
            © Copyright 2019 The Cateres- All Rights Reserved
          </p>
        </div>
      </div>
    </div>
  </footer>


      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>