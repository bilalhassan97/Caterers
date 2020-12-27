<?php
session_start();
if(isset($_POST['email']) && isset($_POST['name'])  && isset($_POST['message']) && isset($_SESSION['uid'])){
    $con = mysqli_connect("localhost","root");
mysqli_select_db($con,"caterars");
//end

//sql
$sql="insert into `feedback`(`desc`,`u_id`) values('".$_POST['message']."','".$_SESSION['uid']."')";
$result = mysqli_query($con,$sql);
echo mysqli_error($con);
}

header("location:index.php");
