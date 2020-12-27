<?php
    session_start();

    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con,"caterars");

    if(isset($_GET['item_id']) && isset($_GET['Caculated-Price']) && isset($_SESSION['cart_id'])) {

        $cr_id=$_SESSION['cart_id'];
        $price=$_GET['Caculated-Price'];
        $fd_id=$_GET['item_id'];
        
        $sql= "INSERT INTO `cart_food`(`cr_id`,`fd_id`,`quantity`, `price`) values ('$cr_id','$fd_id','1', '$price')";

        $result = mysqli_query($con,$sql);
         echo mysqli_error($con);

        $sql="SELECT * FROM `cart` WHERE `cr_id`='$cr_id'";
        $result = mysqli_query($con, $sql);
        
        
        while ($arr = mysqli_fetch_array($result)) {    
            $total_price=$arr['total_price'];
        }
        
        echo $total_price;
        $new_total_price = $total_price + $price;
        $sql="UPDATE `cart` SET `total_price`='$new_total_price' WHERE `cr_id`='$cr_id'";
        $result = mysqli_query($con, $sql);
    
        header("location:cart.php");
    }

    header("location:index.php");

?>