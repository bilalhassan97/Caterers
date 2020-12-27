<?php
include 'PDO.php';
class Ingredient{
    private $in_id;  
    private $name;  
    private $unit_price;

    public function __construct($in_id, $name, $unit_price){
            $this->in_id = $in_id;
            $this->name = $name;
            $this->unit_price = $unit_price;       
    }
    public function getId(){
        return $this->in_id;
    }
    public function setId($in_id){
        $this->in_id=$in_id;
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
 
    public function display(){
        return "ID=".$this->in_id."<br>"."Name=".$this->name."<br>"."UNit Price=".$this->unit_price."<br>";
    }
    

    public function addRecord(){
        $in_id=$this->in_id;
        $name=$this->name;
        $unit_price=$this->unit_price;
        $con=new pdoConnection();     
        $sql="INSERT INTO ingredient VALUES ('$in_id','$name','$unit_price')";
        $result=$con->crudeQuery($sql);
    }

    public function deleteRecord(){
        $in_id=$this->in_id;
        $con=new pdoConnection();
        $sql ="DELETE FROM ingredient WHERE in_id='$in_id'";
        $result=$con->crudeQuery($sql);
    }
    public function viewIngredients(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM ingredient";
        $result=$con->execQuery($sql);
        return $result;
    }
}
$i=new Ingredient(1,"Masaley",100);
$i->addRecord();
$i=new Ingredient(2,"Yogurt",200);
$i->addRecord();
$i=new Ingredient(3,"Beans",150);
$i->addRecord();

#echo $i->display();
#$result= $i->viewIngredients();
?>