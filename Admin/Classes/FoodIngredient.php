<?php
include 'PDO.php';
class FoodIngredient{
    private $fd_in_id;  
    private $fd_id;  
    private $in_id;

    public function __construct($fd_in_id, $fd_id, $in_id){
            $this->fd_in_id = $fd_in_id;
            $this->fd_id = $fd_id;
            $this->in_id = $in_id;       
    }
    public function getId(){
        return $this->fd_in_id;
    }
    public function setId($fd_in_id){
        $this->fd_in_id=$fd_in_id;
    }
    public function getFoodID(){
        return $this->fd_id;
    }
    public function setFoodID($fd_id){
        $this->fd_id=$fd_id;
    } 
    public function getIngredientID(){
        return $this->in_id;
    }
    public function setIngredientID($in_id){
        $this->in_id=$in_id;
    } 
 
    public function display(){
        return "Food Ingredient ID=".$this->fd_in_id."<br>"."Food ID=".$this->fd_id."<br>"."Ingredient ID=".$this->in_id."<br>";
    }
    

    public function addRecord(){
        $fd_in_id=$this->fd_in_id;
        $fd_id=$this->fd_id;
        $in_id=$this->in_id;
        $con=new pdoConnection();     
        $sql="INSERT INTO food_ing VALUES ('$fd_in_id','$fd_id','$in_id')";
        $result=$con->crudeQuery($sql);
    }

}
$i=new FoodIngredient(1,1,1);
$i->addRecord();
$i=new FoodIngredient(2,2,2);
$i->addRecord();
$i=new FoodIngredient(3,2,2);
$i->addRecord();
#echo $i->display();


?>