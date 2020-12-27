<?php

    
session_start();

$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"caterars");


if(isset($_SESSION['uid'])){

$id = $_SESSION['uid'];
$ufname= $_POST['updated_first_name'];
$ulname= $_POST['updated_last_name'];
$uemail= $_POST['updated_email'];
$ucontact = $_POST['updated_contact'];
$upass = $_POST['updated_password'];

if(!empty($ufname)){
        $sql0 = "Update `user` set `f_name` = '$ufname' where u_id = $id";
        mysqli_query($con,$sql0);
        $_SESSION['fname'] = $ufname;
}

if(!empty($ulname)){
        $sql1 = "Update `user` set `l_name` = '$ulname' where u_id = $id";        
        mysqli_query($con,$sql1);
        $_SESSION['lname'] = $ulname; 
}
if(!empty($uemail)){
    $sql1 = "Update `user` set `email` = '$uemail' where u_id = $id";        
    mysqli_query($con,$sql1);
    $_SESSION['email'] = $uemail;
}

if(!empty($ucontact)){
    $sql1 = "Update `user` set `contact_no` = '$ucontact' where u_id = $id";        
    mysqli_query($con,$sql1);
    $_SESSION['contact'] = $ucontact;
}
if(!empty($upass)){
    $sql1 = "Update `user` set `password` = '$upass' where u_id = $id";        
    mysqli_query($con,$sql1);   
}
header("location:user-update.php?success=1");
}
    
else{
    header("location:user-update.php?success=0");
}


?>