<?php
include 'PDO.php';
class Category{
    private $cate_id;  
    private $name;  
    private $image;

    public function __construct($cate_id, $name, $image){
            $this->cate_id = $cate_id;
            $this->name = $name;
            $this->image = $image;       
    }
    public function getId(){
        return $this->cate_id;
    }
    public function setId($cate_id){
        $this->cate_id=$cate_id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    } 
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image=$image;
    } 
 
    public function display(){
        return "ID=".$this->cate_id."<br>"."Name=".$this->name."<br>"."Image=".$this->image."<br>";
    }
    

    public function addRecord(){
        $cate_id=$this->cate_id;
        $name=$this->name;
        $image=$this->image;
        $con=new pdoConnection();     
        $sql="INSERT INTO category VALUES ('$cate_id','$name','$image')";
        $result=$con->crudeQuery($sql);
    }

    public function deleteRecord(){
        $cate_id=$this->cate_id;
        $con=new pdoConnection();
        $sql ="DELETE FROM category WHERE cate_id='$cate_id'";
        $result=$con->crudeQuery($sql);
    }
    public function viewCategories(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM Category";
        $result=$con->execQuery($sql);
        return $result;
    }
    public function viewIngredients(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM Ingredient";
        $result=$con->execQuery($sql);
        return $result;
    }
}
#$i=new Category(1,"Rice","rice_image.jpg");
#$i->addRecord();
#$i=new Category(2,"Beef","beef_img.jpg");
#$i->addRecord();
#$i=new Category(3,"Mutton","mutton_img.jpg");
#$i->addRecord();

#echo $i->display();



?>