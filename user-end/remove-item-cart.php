<?php
session_start();
if (  isset($_GET['cr_f_id'])) {
    $con = mysqli_connect("localhost", "root");
    mysqli_select_db($con, "caterars");
    
    $cr_f_id=$_GET['cr_f_id'];
    $sql="SELECT * FROM `cart_food` WHERE `cr_f_id`='$cr_f_id'";
    $result = mysqli_query($con, $sql);
    while ($arr = mysqli_fetch_array($result)) {    
        $price=$arr['price'];
        $cr_id=$arr['cr_id'];
    }

    
    $sql = "DELETE FROM `cart_food` WHERE `cr_f_id`='$cr_f_id'";
    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);
    
    $sql="SELECT * FROM `cart` WHERE `cr_id`='$cr_id'";
    $result = mysqli_query($con, $sql);
    while ($arr = mysqli_fetch_array($result)) {    
        $total_price=$arr['total_price'];
    }
    

    $new_total_price = $total_price - $price;
    $sql="UPDATE `cart` SET `total_price`='$new_total_price' WHERE `cr_id`='$cr_id'";
    $result = mysqli_query($con, $sql);

    header("location:cart.php");
}
else {
    header("location:index.php");
}

?>