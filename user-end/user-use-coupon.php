<?php
session_start();
if (isset($_SESSION['uid']) &&  isset($_GET['code']) && isset($_SESSION['cart_id'])) {
    $con = mysqli_connect("localhost", "root");
    mysqli_select_db($con, "caterars");
    
    $code=$_GET['code'];
    $cr_id=$_SESSION['cart_id'];
    $uid = $_SESSION['uid'];

    $sql="SELECT * FROM `coupon` WHERE `name`='$code' AND `u_id`='$uid'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result); 
    echo $num;
    if($num == 0){
        header("location:cart.php?cannot_use_coupon=1");
        die();    
    }
    while ($arr = mysqli_fetch_array($result)) {    
        $price=$arr['value'];
        $c_id=$arr['c_id'];
    }

    
    $sql = "DELETE FROM `coupon` WHERE `c_id`='$c_id'";
    $result = mysqli_query($con, $sql);

    
    $sql="SELECT * FROM `cart` WHERE `cr_id`='$cr_id'";
    $result = mysqli_query($con, $sql);
    while ($arr = mysqli_fetch_array($result)) {    
        $total_price=$arr['total_price'];
    }

    if($result){
        header("location:cart.php");
    }

    $new_total_price = $total_price - $price;
    $sql="UPDATE `cart` SET `total_price`='$new_total_price' WHERE `cr_id`='$cr_id'";
    $result = mysqli_query($con, $sql);

    header("location:cart.php");
}
else {
    header("location:cart.php?cannot_use_coupon=1");
}

?>