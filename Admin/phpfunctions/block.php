<?php
include "../Classes/User.php";

$id= $_GET['id'];
$u=new User($id,"asd","asds","asdasd","asdas","324234",0);
$result=$u->blockUser();
header("Location:../user.php");

?>