<?php
include_once 'Classes/User.php';

$u=new User(0,"asd","asds","asdasd","asdas","324234",0);

$info=$u->DashboardInformation();
$no_of_users=$info[0];
$no_of_feedbacks=$info[1];
$no_of_orders=$info[2];
$total_sale=$info[3];
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Caterars</title>
      
      <link rel="stylesheet" href="cssfiles/bootstrap.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="cssfiles/fontastic.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="cssfiles/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="cssfiles/custom.css">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
      <link rel="stylesheet" href="custom.css">
</head>

<body>
      <div>
            <nav class="navbar navbar-expand-md navbar-custom">
                  <ul style="padding-left:50px;" class="navbar-nav">
                        <li class="nav-item">
                              <h3 style="color:white;">Admin</h3>
                        </li>
                  </ul>
                  <ul style="padding-left:30px;" class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                  </ul>
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="user.php">User</a>
                        </li>
                  </ul>
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="order.php">Order</a>
                        </li>
                  </ul>
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="food.php">Food</a>
                        </li>
                  </ul>
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link" href="feedback.php">Feedback</a>
                        </li>
                  </ul>
            </nav>
      </div>
      <!-- Counts Section -->
  <section style="padding-left:300px;" class="dashboard-counts section-padding">
    <div class="container-fluid">
      <div class="row">
        <!-- Count item widget-->
        <div class="col-xl-2 col-md-4 col-6">
          <div class="wrapper count-title d-flex">
            <div class="name"><strong class="text-uppercase">Customer Count</strong><span>Number of Users
                Registered</span>
              <div class="count-number"><?php echo $no_of_users?></div>
            </div>
          </div>
        </div>
        <!-- Count item widget-->
        <div class="col-xl-2 col-md-4 col-6">
          <div class="wrapper count-title d-flex">
            <div class="name"><strong class="text-uppercase"> Order Count</strong><span>Number of Orders Made</span>
              <div class="count-number"><?php echo $no_of_orders?></div>
            </div>
          </div>
        </div>
        <!-- Count item widget-->
        <div class="col-xl-2 col-md-4 col-6">
          <div class="wrapper count-title d-flex">
            <div class="name"><strong class="text-uppercase">Feedback Count</strong><span>Number of Feedback
                Given</span>
              <div class="count-number"><?php echo $no_of_feedbacks?></div>
            </div>
          </div>
        </div>
        <!-- Count item widget-->
        <div class="col-xl-2 col-md-4 col-6">
          <div class="wrapper count-title d-flex">
            <div class="name"><strong class="text-uppercase">Sale</strong><span>Total Sale in Rs/-</span>
              <div class="count-number"><?php echo $total_sale?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a href='../user-end/index.php'><button style="margin-left:1050px;"type="button" class="btn btn-success">Logout</button></a>

</body>

</html>