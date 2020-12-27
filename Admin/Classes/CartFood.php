<?php
include 'PDO.php';
class CartFood{
    private $cr_fd_id;  
    private $fd_id;
    private $cr_id;
    private $quantity;
    private $price;

    public function __construct($fd_in_id, $fd_id, $cr_id, $quantity, $price){
            $this->fd_in_id = $fd_in_id;
            $this->fd_id = $fd_id;
            $this->cr_id = $cr_id;
            $this->quantity = $quantity;
            $this->price = $price;       
    }
    public function getId(){
        return $this->cr_fd_id;
    }
    public function setId($cr_fd_id){
        $this->cr_fd_id=$cr_fd_id;
    }
    public function getFoodID(){
        return $this->fd_id;
    }
    public function setFoodID($fd_id){
        $this->fd_id=$fd_id;
    } 
    public function getCartID(){
        return $this->cr_id;
    }
    public function setCartID($cr_id){
        $this->cr_id=$cr_id;
    } 
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price=$price;
    } 
    public function getQuanity(){
        return $this->quantity;
    }   
 
    public function display(){
        return "Cart Food ID=".$this->cr_fd_id."<br>"."Food ID=".$this->fd_id."<br>"."Cart ID=".$this->cr_is."<br>"."Quantity=".$this->quantity."<br>"."Price=".$this->price."<br>";
    }
    

    public function addRecord(){
        $cr_fd_id=$this->cr_fd_id;
        $fd_id=$this->fd_id;
        $cr_id=$this->cr_id;
        $quantity=$this->quantity;
        $price=$this->price;
        $con=new pdoConnection();     
        $sql="INSERT INTO cart_food VALUES ('$cr_fd_id','$fd_id','$cr_id','$quantity','$price')";
        $result=$con->crudeQuery($sql);
    }

}
$i=new CartFood(1,1,1,100,1000);
$i->addRecord();
$i=new CartFood(2,2,2,200,2000);
$i->addRecord();
$i=new CartFood(3,3,3,300,3000);
$i->addRecord();

#echo $i->display();

?>