<?php
include "../Classes/Coupon.php";

$id= $_GET['id'];
$name=rand(100000,999999);

$c_id=12;
$c=new Coupon($c_id,$name,"","",$id,100);
$result=$c->addRecord();

header("Location:../user.php");

?>