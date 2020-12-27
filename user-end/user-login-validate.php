<?php
  session_start();
  

  // admin login
  $con = mysqli_connect("localhost", "root");
    mysqli_select_db($con, "caterars");
  $fname = $_POST["first_name"];
  $lname = $_POST["last_name"];
  $pass = $_POST["user_pass"];
  echo $_POST["first_name"];
  echo $_POST["last_name"];
  echo $_POST["user_pass"];

  $sql = "select * from `admin` where f_name='$fname' and l_name='$lname' and password='$pass'";

$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result); // check if alteady present fname and l name
echo $num;
if($num == 1){
  header("Location:../Admin/dashboard.php");
  die();
}

// end admin login






  if (isset($_SESSION['cart_id'])) {

  
    $sql = "SELECT * FROM `cart` WHERE `cr_id`=" . $_SESSION['cart_id'];
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
      $price = $row['total_price'];
    }
    if ($price <= 0) {
      $sql = "DELETE  FROM `cart` WHERE `cr_id`=" . $_SESSION['cart_id'];
      $result = mysqli_query($con, $sql);
    } else {
      $sql = "UPDATE `cart` SET  `paid`='1' `cr_id`=" . $_SESSION['cart_id'];
      $result = mysqli_query($con, $sql);
    }
    unset($_SESSION['cart_id']);
  }

  $con = mysqli_connect("localhost","root");
  mysqli_select_db($con,"caterars");

  $fname = $_POST["first_name"];
  $lname = $_POST["last_name"];
  $pass = $_POST["user_pass"];

  $sql = "select * from user where f_name='$fname' and l_name='$lname' and password='$pass'";

$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result); // check if alteady present fname and l name

if($num == 1){
  
  while($arr = mysqli_fetch_array($result)){
    $u_id=$arr['u_id'];
    $email = $arr['email'];
    $contact = $arr['contact_no'];
  }
    
    $_SESSION['uid'] = $u_id;
    $_SESSION['contact'] = $contact;
    $_SESSION['email'] = $email; 
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname; 

    header("location:index.php");
}
else{
    header('location:login.html?not-sign-up=1');
}

?>