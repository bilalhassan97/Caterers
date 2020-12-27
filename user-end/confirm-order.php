<?php



  session_start();

if(!isset($_SESSION['uid'])){
  header("location:index.php?payment-unsucessfull=1");
}



  $cr_id=$_GET['cr_id'];
  if ($cr_id == 0) {
      header("location:index.php?payment-unsucessfull=1");
  }
  $address=$_GET['address'];
  $name = $_GET['fullname'];

  $con = mysqli_connect("localhost", "root");
  mysqli_select_db($con, "caterars");
  if (isset($_SESSION['uid'])) {
      $u_id=$_SESSION['uid'];
      $sql= "SELECT * FROM `cart` WHERE `cr_id` = $cr_id ";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
          $total_price = $row['total_price'];
      }
      if (empty($total_price)) {
        header("location:index.php?payment-unsucessfull=1");
      }
      // $sql="INSERT INTO `order`(`address`,`cr_id`,`name`,`total_price`,`u_id`)
      //       VALUES ('$address','$cr_id','$name','$total_price','$u_id')";


$sql="INSERT INTO `order`(`address`,`cr_id`,`total_price`,`u_id`)
            VALUES ('$address','$cr_id','$total_price','$u_id')";

      $result = mysqli_query($con, $sql);
      echo mysqli_error($con);
  } else {
    $sql= "SELECT * FROM `cart` WHERE `cr_id` = $cr_id ";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $total_price = $row['total_price'];
    }
    if (empty($total_price)) {
      header("location:index.php?payment-unsucessfull=1");
    }
    // $sql="INSERT INTO `order`(`address`,`cr_id`,`name`,`total_price`)
    //       VALUES ('$address','$cr_id','$name','$total_price')";


$sql="INSERT INTO `order`(`address`,`cr_id`,`total_price`)
          VALUES ('$address','$cr_id','$total_price')";

    $result = mysqli_query($con, $sql);
  }
  
  header("location:index.php?order-success=1");
?>