<?php
include 'PDO.php';
class Order{
    private $or_id;  
    private $u_id;  
    private $time;
    private $address;  
    private $total_price;
    private $cr_id;
    private $delivery;

    public function __construct($or_id, $u_id, $time,$address,$total_price,$cr_id,$delivery){
            $this->or_id = $or_id;
            $this->u_id = $u_id;
            $this->time = $time;
            $this->cr_id = $cr_id;
            $this->address = $address;
            $this->total_price = $total_price;
            $this->delivery = $delivery;            
    }
    public function getId(){
        return $this->or_id;
    }
    public function setId($or_id){
        $this->or_id=$or_id;
    }
    public function getUserID(){
        return $this->u_id;
    }
    public function setUserID($u_ud){
        $this->u_id=$u_id;
    } 
    public function getTime(){
        return $this->time;
    }
    public function setTime($time){
        $this->time=$time;
    } 
    public function getAddress(){
        return $this->address;
    }
    public function setAddress($address){
        $this->address=$address;
    } 
    public function getTotalPrice(){
        return $this->total_price;
    }
    public function setTotalPrice($total_price){
        $this->total_price=$total_price;
    } 
    public function getCategoryID(){
        return $this->cr_id;
    }
    public function setCategoryID($cr_id){
        $this->cr_id=$cr_id;
    } 
    public function getDelivery(){
        return $this->delivery;
    }
    public function setDelivery($delivery){
        $this->delivery=$delivery;
    } 
    public function display(){
        return "ID=".$this->u_id."<br>"."User ID=".$this->u_id."<br>"."Time=".$this->time."<br>"."Address=".$this->address."<br>"."Total Price=".$this->total_price."<br>"."Categrory ID=".$this->cr_id."<br>"."Delivery=".$this->delivery."<br>";
    }
    
    public function addRecord(){
        $or_id=$this->or_id;
        $u_id=$this->u_id;
        $address=$this->address;
        $time=date("Y-m-d\TH:i:s");
        $total_price=$this->total_price;
        $cr_id=$this->cr_id;
        $delivery=$this->delivery;  
        $con=new pdoConnection();     
        $sql="INSERT INTO `order` VALUES ('$or_id','$u_id','$time','$address','$total_price','$cr_id','$delivery')";
        $result=$con->crudeQuery($sql);
    }

    public function OrderCompleted(){
        $or_id=$this->or_id;
        $delivery="1";
        $con=new pdoConnection();
        $sql ="UPDATE order SET delivery = '$delivery' WHERE or_id='$or_id'";
        $result=$con->crudeQuery($sql);
    }
    public function ViewOrders(){
        $con=new pdoConnection();
        $sql = "SELECT * FROM `order` join user on order.u_id=user.u_id ";
        $result=$con->execQuery($sql);
        return $result;
    }

    public function orderDelivered(){
        $or_id=$this->or_id;
        $delivered_status="1";
        $con=new pdoConnection();
        $sql ="UPDATE `order` SET delivery = '$delivered_status' WHERE or_id='$or_id'";
        $result=$con->crudeQuery($sql);
    }

}
#$u=new Order(1,1,"time","car chowk",3000,1,0);
#$u->addRecord();    
#$u=new Order(2,2,"time","dhoke kala khan",5000,2,0);
#$u->addRecord();    
#$u=new Order(3,3,"time","nust",4000,3,1);
#$u->addRecord();    



?>