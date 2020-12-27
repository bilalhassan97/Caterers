<?php
session_start();
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con, "caterars");


if (!isset($_SESSION['cart_id'])) {


  if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $sql = "INSERT INTO `cart`(`paid`,`total_price`,`u_id`) values('0','0','$uid')";
    $result = mysqli_query($con, $sql);
    $_SESSION['cart_id'] = mysqli_insert_id($con);
  } else {
    $sql = "select * from category";
    $sql = "INSERT INTO `cart`(`paid`,`total_price`) values('0','0')";
    $result = mysqli_query($con, $sql);
    $_SESSION['cart_id'] = mysqli_insert_id($con);
  }
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- my css -->
  <link rel="stylesheet" href="style-index.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
          sURLVariables = sPageURL.split('&'),
          sParameterName,
          i;

        for (i = 0; i < sURLVariables.length; i++) {
          sParameterName = sURLVariables[i].split('=');

          if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
          }
        }
      };
      if (getUrlParameter("sign-up-first-time")=='1') {
        alert("Welecom, you are Sccessfully Signed up");
      } else if (getUrlParameter("nothing-in-cart")=='1') {
        alert("The Cart is empty");
      } else if (getUrlParameter("payment-unsucessfull")=='1') {
        alert("Something Went Wrong When Confirming the order");
      } else if (getUrlParameter("order-success")=='1') {
        alert("Order Successfully Placed");
      }
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
                          <a class='nav-link' href='user-profile.php?u_id=" . $_SESSION['uid'] . "'>" . $_SESSION['fname'] . " " . $_SESSION['lname'] . "</a>
                      </button>
                    </li>";
            } else {
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




    <!-- image slider -->
    <div id="slides" class="carousel slide" data-ride="carousel">

      <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
      </ul>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/background-header.jpg" alt="Background">
          <!-- <div class="carousel-caption">
            <h1 class="display-2">Food For All</h1>
          </div> -->
        </div>
        <div class="carousel-item">
          <img src="img/background-header.jpg" alt="Background">
        </div>
        <div class="carousel-item">
          <img src="img/background-header.jpg" alt="Background">
        </div>
      </div>
    </div><!-- end image slider-->

    <hr>

    <!-- food section -->
    <section id="food">
      <div class="container-fluid padding">
        <div class="row text-center padding">
          <div class="col-12">
            <h1 class="Display-4">Food Menue</h1>
          </div>
        </div>
      </div>
      <hr>


      <div class="container-fluid padding">
        <div class="row text-center padding">
          <?php
          //connection
          $con = mysqli_connect("localhost", "root");
          mysqli_select_db($con, "caterars");
          //end

          //sql
          $sql = "select * from category";
          $result = mysqli_query($con, $sql);
          while ($arr = mysqli_fetch_array($result)) {

            ?>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
              <div class="card mb-2">
                <img class="card-img-top" src="food_images/<?php echo $arr['image']; ?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title font-weight-bold"><?php echo $arr['name']; ?></h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                  <a href="category.php?cate_id=<?php echo $arr['cate_id'] ?>" class="btn btn-secondary btn-md btn-rounded">View Category</a>
                </div>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
    </section><!-- end food section-->

    <hr>


    <!-- info Section-->
    <hr>

    <section id="info">
      <div class="container-fluid">
        <div class="row text-center">
          <div class="col-12">
            <h1 class="Display-4">Info</h1>
          </div>
        </div>
      </div>
      <hr>
      <div id="offer-1" class="container padding">
        <div class="row padding">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img class="offer-img-size" src="img/background-header.jpg" alt="image">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <p class="text-justify">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat velit quisquam ipsum nulla consequatur
              neque corporis quas maiores officiis dolorum quo ipsa, necessitatibus, aliquam natus sed cupiditate omnis
              deleniti laborum, minima repellat sit impedit. Doloremque modi consequatur velit ipsam a expedita maiores
              nemo asperiores incidunt adipisci eum corrupti deleniti aliquam quos ex ipsum voluptatibus aspernatur
              eaque, nam omnis. Eos nobis fugit, expedita repellat architecto similique minima cum quaerat reprehenderit
              iste laudantium veritatis odit voluptas facilis quis assumenda exercitationem dolores aspernatur nulla
              eveniet? Facilis cupiditate temporibus labore! Dolor, dolore officiis id, dignissimos iure exercitationem
              inventore porro facere quisquam, nostrum eos deserunt!
            </p>
          </div>
        </div>
      </div>
      <hr>
      <div id="offer-2" class="container padding">
        <div class="row padding">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img class="offer-img-size" src="img/background-header.jpg" alt="image">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <p class="text-justify">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat velit quisquam ipsum nulla consequatur
              neque corporis quas maiores officiis dolorum quo ipsa, necessitatibus, aliquam natus sed cupiditate omnis
              deleniti laborum, minima repellat sit impedit. Doloremque modi consequatur velit ipsam a expedita maiores
              nemo asperiores incidunt adipisci eum corrupti deleniti aliquam quos ex ipsum voluptatibus aspernatur
              eaque, nam omnis. Eos nobis fugit, expedita repellat architecto similique minima cum quaerat reprehenderit
              iste laudantium veritatis odit voluptas facilis quis assumenda exercitationem dolores aspernatur nulla
              eveniet? Facilis cupiditate temporibus labore! Dolor, dolore officiis id, dignissimos iure exercitationem
              inventore porro facere quisquam, nostrum eos deserunt!
            </p>
          </div>
        </div>
      </div>
    </section> <!-- end info section-->

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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>