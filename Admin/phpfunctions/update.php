<?php
include "../Classes/Food.php";
$fd_id=$_GET['fd_id'];
$f=new Food($fd_id,2,"Biryani",150,"It is  Biryani","image1");
$f->searchFood();
$result2=$f->viewFoodIngredients($fd_id);

$checked_ones=array();

while($row=$result2->fetch()){
      array_push($checked_ones, $row['in_id']);
}
foreach($checked_ones as $selected){
      echo $selected;
      #echo array_key_exists(1,$checked_ones);
}


$target_dir = "../food_images/";
$id=$_POST['fd_id'];
$ca=$_POST['cate_id'];
$name=$_POST['name'];
$unit=$_POST['unit_price'];
$des=$_POST['description'];

$ingredients=array();

foreach($_POST['checklist'] as $selected){
      array_push($ingredients,$selected);
}


$filename = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
if ($filename==null){
      $f=new Food($id,2,"Biryasdfsdni",1530,"Isdfdstf is  Biryani","imagsdfdse1");
      $f->searchFood();
      $filename=$f->getImage();
}else{
      $filename=$filename.'.jpg';
      move_uploaded_file($_FILES['picture']['tmp_name'],$target_dir.$filename);
}
echo $filename;

$f=new Food($id,$ca,$name,$unit,$des,$filename);
#echo $f->display();
$f->updateFood();
$f->deleteIngredients($fd_id);
$f->addFoodIngredients($ingredients,$fd_id);
header("Location:../food.php");

?>