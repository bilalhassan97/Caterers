<?php
session_start();

$connString = "mysql:host=localhost;dbname=caterars";
$user="root";
$pass="";
$db = new PDO($connString,$user,$pass);
//end

$or_id = $_GET['or_id'];
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>User - Order Details</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- my css -->
    <link rel="stylesheet" href="style-index.css">
    <link rel="stylesheet" href="style-user-profile.css">

    

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
        <h1 class="display-4">Order No. 1 Details</h1>
        <hr>
        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <div class="table-responsive">


                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>
                                <th>#</th>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </thead>

                            <tbody>
                        <?php
                                  //  $con = mysqli_connect("localhost","root");
                                  //  mysqli_select_db($con,"caterars");
                                 //end
                                  $results_per_page=1;  
                                  $sql="select * FROM cart join `order` o on (cart.cr_id = o.cr_id) 
                                  JOIN cart_food on (cart.cr_id = cart_food.cr_id) 
                                  join food on (cart_food.fd_id = food.fd_id) where o.or_id=$or_id";
                                     
                                  $result1 = $db->query($sql);
                                  $no_of_results=$result1->rowCount();

                                  $number_of_pages= ceil( $no_of_results/$results_per_page);
 
                                    if (!isset($_GET['page'])){
                                      $page=1;
                                    }
                                    else{
                                      $page=$_GET['page'];
                                    }
                            
                                    $st_limit_no=($page-1)*$results_per_page;





                                   //sql
                                  
                                  $sql="select * FROM cart join `order` o on (cart.cr_id = o.cr_id) 
                                  JOIN cart_food on (cart.cr_id = cart_food.cr_id) 
                                  join food on (cart_food.fd_id = food.fd_id) where o.or_id=$or_id LIMIT  $st_limit_no,$results_per_page";
                                     
                                  $result1 = $db->query($sql);

                                  $count=0;

                                  while ( $row = $result1->fetch()){
                                       $count++;
                             ?>
                        

                                <tr>
                                    <td> <?php echo $count; ?></td>>
                                    <td> <?php echo $row['name']; ?></td>
                                    <td> <?php echo $row['quantity']; ?> </td>
                                    <td><strong>Rs.</strong> <?php echo $row['unit_price']; ?> </td>
                                </tr>

                                   <?php }?>
                            </tbody>
                            
                        </table>


                        <div class="container-fluid padding">
        <div class="row text-center padding">
          <div class="col-12">
            <nav aria-label="Page navigation example" >
              <ul class="pagination"  style="padding-left:40%;padding-right:40%; padding-top:1%;">
              <?php
                if ($page>1){
                echo "<li class='page-item'><a class='page-link' href='view-order-details.php?or_id=$or_id&page=".($page-1)."'>Previous</a></li>";
                }  
                for($i=1;$i<=$number_of_pages;$i++){
                echo "<li class='page-item'><a class='page-link' href='view-order-details.php?or_id=$or_id&page=".$i."'>$i</a></li>";
                }
                if ($i-1>$page){
                echo "<li class='page-item'><a class='page-link' href='view-order-details.php?or_id=$or_id&page=".($page+1)."'>Next</a></li>";
                }
               ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>


    </section> <!-- end full body section-->


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



    <!-- jQuery links-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>