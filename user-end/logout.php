<?php
session_start();
if(isset($_SESSION['cart_id'])){
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con,"caterars");

    $sql="SELECT * FROM `cart` WHERE `cr_id`=".$_SESSION['cart_id'];
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
        $price=$row['total_price'];
    }
    if($price <= 0){
        $sql="DELETE  FROM `cart` WHERE `cr_id`=".$_SESSION['cart_id'];
        $result = mysqli_query($con,$sql);
    }

}
unset($_SESSION['cate_id']);
session_destroy();
header("location:index.php");

?>