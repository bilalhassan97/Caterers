<?php
include 'PDO.php';
class Cart{
    private $cr_id;  
    private $u_id;  
    private $time;  
    private $paid;
    private $total_price;

    public function __construct($cr_id, $u_id,$time,$paid,$total_price){
            $this->cr_id = $cr_id;
            $this->u_id = $u_id;
            $this->time = $time;
            $this->paid = $paid;
            $this->total_price = $total_price;
    }
    public function getId(){
        return $this->cr_id;
    }
    public function setId($cr_id){
        $this->cr_id=$cr_id;
    }
    public function getUId(){
        return $this->u_id;
    }
    public function setUId($u_id){
        $this->u_id=$u_id;
    } 
    public function getTime(){
        return $this->time;
    }
    public function setTime($time){
        $this->time=$time;
    } 
    public function getPaid(){
        return $this->paid;
    }
    public function setPaid($paid){
        $this->paid=$paid;
    } 
    public function setTotalPrice($total_price){
        $this->total_price=$total_price;
    } 
    public function display(){
        return "ID=".$this->cr_id."<br>"."User ID=".$this->u_id."<br>"."Time=".$this->time."<br>"."Paid=".$this->paid."<br>"."Total Price=".$this->total_price."<br>";
    }
    

    public function addRecord(){
        $cr_id=$this->cr_id;
        $u_id=$this->u_id;
        $time=$this->time;
        $paid=$this->paid;
        $total_price=$this->total_price;
        $con=new pdoConnection();     
        $sql="INSERT INTO cart VALUES ('$cr_id','$u_id','$time','$paid','$total_price')";
        $result=$con->crudeQuery($sql);
    }

    public function deleteRecord(){
        $cr_id=$this->cr_id;
        $con=new pdoConnection();
        $sql ="Delete From cart WHERE cr_id='$cr_id'";
        $result=$con->crudeQuery($sql);
    }

}
$u=new Cart(1,1,"time",1000,10000);
$u->addRecord();
$u=new Cart(2,2,"time",1200,40000);
$u->addRecord();
$u=new Cart(3,3,"time",1400,1600);
$u->addRecord();
$u=new Cart(4,4,"time",4300,6000);

#echo $u->display();
#$u->addRecord();
#u1->addRecord();
##$u2->addRecord();
#$u3->addRecord();



?>