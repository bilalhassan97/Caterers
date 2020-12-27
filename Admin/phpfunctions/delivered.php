<?php
include "../Classes/Order.php";

$id= $_GET['id'];
$o=new Order($id,1,"time","car chowk",3000,1,0);
$result=$o->orderDelivered();
header("Location:../order.php");

?>