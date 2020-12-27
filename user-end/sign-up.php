<?php
  session_start();
  if (isset($_SESSION['cart_id'])) {

    $con = mysqli_connect("localhost", "root");
    mysqli_select_db($con, "caterars");
  
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
  $email = $_POST["email"];
  $contact = $_POST["contact_no"];
  $pass = $_POST["user_pass"];

  $sql = "select * from user where f_name='$fname' and l_name='$lname'";

$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result); // check if alteady present fname and l name
if($num == 1){
    echo "duplicate data";
    header("location:sign-up.html?dup=1");
}
else{
  $sql2="insert into user(blocked,contact_no,email,f_name,l_name,password) values (false,'$contact','$email','$fname','$lname','$pass'); ";
  $result = mysqli_query($con,$sql2);
  if($result){
    $sql = "select * from user where f_name='$fname' and l_name='$lname'";
    $result = mysqli_query($con,$sql);

    
  while($arr = mysqli_fetch_array($result)){
    $u_id=$arr['u_id'];
  }
    
    $_SESSION['uid'] = $u_id;
    $_SESSION['contact'] = $contact;
    $_SESSION['email'] = $email; 
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname; 

      header("location:index.html?sign-up-first-time=1");
  }else{
      mysqli_error($con);
  }
}
