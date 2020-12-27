<?php
include "../Classes/Food.php";

$q=new Food(0,2,"adasd",122,"asdas","asdasd");

$target_dir = "../food_images/";
$ca=$_POST['cate_id'];
$name=$_POST['name'];
$unit=$_POST['unit_price'];
$des=$_POST['description'];

$ingredients=array();

foreach($_POST['check_list'] as $selected){
      echo $selected;
      array_push($ingredients,$selected);
}

$filename = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
$filename=$filename.'.jpg';
move_uploaded_file($_FILES['picture']['tmp_name'],$target_dir.$filename);

$f=new Food(0,$ca,$name,$unit,$des,$filename);
$id=$f->addRecord();

$q->addFoodIngredients($ingredients,$id);
header("Location:../food.php");     

?>