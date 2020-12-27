<?php
include 'PDO.php';
class Food{
    private $fd_id;  
    private $cate_id;  
    private $name;
    private $unit_price;  
    private $description;
    private $image;

    public function __construct($fd_id, $cate_id, $name,$unit_price,$description,$image){
            $this->fd_id = $fd_id;
            $this->cate_id = $cate_id;
            $this->name = $name;
            $this->unit_price = $unit_price;
            $this->description = $description;
            $this->image = $image;
    }
    public function getId(){
        return $this->fd_id;
    }
    public function setId($fd_id){
        $this->fd_id=$fd_id;
    }
    public function getCategoryID(){
        return $this->cate_id;
    }
    public function setCategoryID($cate_id){
        $this->cate_id=$cate_id;
    } 
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    } 
    public function getUnitPrice(){
        return $this->unit_price;
    }
    public function setUnitPrice($unit_price){
        $this->unit_price=$unit_price;
    } 
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description=$description;
    } 
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image=$image;
    } 
    public function display(){
        return "ID=".$this->fd_id."<br>"."Category ID=".$this->cate_id."<br>"."Name=".$this->name."<br>"."Unit Price=".$this->unit_price."<br>"."Description=".$this->description."<br>"."Image=".$this->image."<br>";
    }
    

    public function addRecord(){
        
        $con=new pdoConnection();     
        $sql="Select Max(fd_id) from food";
        $result=$con->execQuery($sql);
        $fd_id=$result->fetch();
        $fd_id= $fd_id[0]+1;
        echo $fd_id;
        $cate_id=$this->cate_id;
        $name=$this->name;
        $unit_price=$this->unit_price;
        $description=$this->description;
        $image=$this->image;
        $con=new pdoConnection();     
        $sql="INSERT INTO food VALUES ('$fd_id','$cate_id','$name','$unit_price','$description','$image')";
        $result=$con->crudeQuery($sql);
        return $fd_id;
    }

    public function ViewFoods(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM food";
        $result=$con->execQuery($sql);
        return $result;
    }
    public function searchFood(){
        $fd_id=$this->fd_id;
        $con=new pdoConnection();
        $sql = "SELECT * FROM food where fd_id='$fd_id'";
        $result=$con->execQuery($sql);
        $row=$result->fetch();
        $this->cate_id=$row['cate_id'];
        $this->name=$row['name'];
        $this->unit_price=$row['unit_price'];
        $this->description=$row['desc'];
        $this->image=$row['image'];
    }

    public function viewIngredients(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM Ingredient";
        $result=$con->execQuery($sql);
        return $result;
    }

    public function viewCategories(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM Category";
        $result=$con->execQuery($sql);
        return $result;
    }
    public function viewFoodIngredients($fd_id){
        $con=new pdoConnection();
        $sql = "SELECT * FROM food_ing where fd_id='$fd_id'";
        $result=$con->execQuery($sql);
        return $result;
    }
    public function updateFood(){
        $fd_id=$this->fd_id;
        $cate_id=$this->cate_id;
        $name=$this->name;
        $unit_price=$this->unit_price;
        $description=$this->description;
        $image=$this->image;
        $con=new pdoConnection();
        $sql ="UPDATE `food` SET fd_id = '$fd_id',cate_id= '$cate_id',  name= '$name',unit_price = '$unit_price', `desc` = '$description', image = '$image'  WHERE fd_id='$fd_id'";
        $result=$con->crudeQuery($sql);
    }

    public function addFoodIngredients($ingredients, $fd_id){
        foreach($ingredients as $selected){
            $in_id=$selected;
            $con=new pdoConnection();     
            $sql="Select Max(fd_in_id) from food_ing";
            $result=$con->execQuery($sql);
            $fd_in_id=$result->fetch();
            $fd_in_id=$fd_in_id[0]+1;

            $con=new pdoConnection();     
            $sql="INSERT INTO food_ing VALUES ('$fd_in_id','$fd_id','$in_id')";
            $result=$con->crudeQuery($sql);
      }
    }
    public function deleteIngredients($fd_id){
        $con=new pdoConnection();     
        
            $sql="Delete from `food_ing` where fd_id='$fd_id'";
            $result=$con->crudeQuery($sql);
        
    }
}
#$u=new Food(1,2,"Biryani",150,"It is  Biryani","image1");
#$u1=new Food(2,2  ,"Qurma",400,"It is  Qurma","image2");
#$u2=new Food(3,3,"Pulao",500,"It is  Pulao","image3");
#$u3=new Food(4,1,"Karahi",600,"It is  Karahi","image4");

#$u->addRecord();
#$u1->addRecord();
#$u2->addRecord();
#$u3->addRecord();

#echo $u->display();
#Select * from ingredient i join food_ing fi on (i.in_id=fi.in_id) where fd_id=1
?>
